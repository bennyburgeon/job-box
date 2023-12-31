<?php

namespace Botble\Setting\Supports;

use Botble\Base\Models\BaseModel;
use Botble\Setting\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Throwable;
use UnexpectedValueException;

class DatabaseSettingStore extends SettingStore
{
    public function forget($key): SettingStore
    {
        parent::forget($key);

        $segments = explode('.', $key);
        array_pop($segments);

        while ($segments) {
            $segment = implode('.', $segments);

            if ($this->get($segment)) {
                break;
            }

            $this->forget($segment);
            array_pop($segments);
        }

        return $this;
    }

    public function newQuery(): Builder
    {
        return Setting::query();
    }

    protected function write(array $data): void
    {
        $keys = $this->newQuery()->pluck('key');

        $insertData = Arr::dot($data);
        $updateData = [];
        $deleteKeys = [];

        foreach ($keys as $key) {
            if (isset($insertData[$key])) {
                $updateData[$key] = $insertData[$key];
            } else {
                $deleteKeys[] = $key;
            }
            unset($insertData[$key]);
        }

        foreach ($updateData as $key => $value) {
            $this->newQuery()->where('key', $key)
                ->update(['value' => $value]);
        }

        if ($insertData) {
            $this->newQuery()->insert($this->prepareInsertData($insertData));
        }

        if ($deleteKeys) {
            $this->newQuery()->whereIn('key', $deleteKeys)->delete();
        }
    }

    protected function prepareInsertData(array $data): array
    {
        $dbData = [];

        foreach ($data as $key => $value) {
            $data = compact('key', 'value');
            if (BaseModel::determineIfUsingUuidsForId()) {
                $data['id'] = BaseModel::newUniqueId();
            }

            $dbData[] = $data;
        }

        return apply_filters(SETTINGS_PREPARE_INSERT_DATA, $dbData);
    }

    protected function read(): array
    {
        try {
            if (App::runningInConsole()) {
                return $this->parseReadData($this->newQuery()->get());
            }

            return Cache::remember($this->cacheKey, $this->settingTime, function () {
                return $this->parseReadData($this->newQuery()->get());
            });
        } catch (Throwable) {
            return [];
        }
    }

    public function parseReadData(Collection|array $data): array
    {
        $results = [];

        foreach ($data as $row) {
            if (is_array($row)) {
                $key = $row['key'];
                $value = $row['value'];
            } elseif (is_object($row)) {
                $key = $row->key;
                $value = $row->value;
            } else {
                $msg = 'Expected array or object, got ' . gettype($row);

                throw new UnexpectedValueException($msg);
            }

            Arr::set($results, $key, $value);
        }

        return $results;
    }

    public function delete(array $keys = [], array $except = [])
    {
        if (! $keys && ! $except) {
            return false;
        }

        $query = $this->newQuery();

        if ($keys) {
            $query = $query->whereIn('key', $keys);
        }

        if ($except) {
            $query = $query->whereNotIn('key', $keys);
        }

        $deleted = $query->delete();

        $this->clearCache();

        return $deleted;
    }
}
