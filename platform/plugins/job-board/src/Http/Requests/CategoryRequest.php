<?php

namespace Botble\JobBoard\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CategoryRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'slug' => 'nullable|string',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
