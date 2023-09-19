<?php

namespace Botble\JobBoard\Tables;

use Botble\Base\Facades\BaseHelper;
use Botble\JobBoard\Models\Company;
use Botble\JobBoard\Repositories\Interfaces\ReviewInterface;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Base\Facades\Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use Botble\Table\DataTables;

class ReviewTable extends TableAbstract
{
    protected $hasActions = true;

    protected $hasFilter = true;

    public function __construct(DataTables $table, UrlGenerator $urlGenerator, ReviewInterface $repository)
    {
        parent::__construct($table, $urlGenerator);

        $this->repository = $repository;
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('reviewable_id', function ($item) {
                if (! $item->reviewable->id) {
                    return '&mdash;';
                }

                return Html::link(
                    route($item->reviewable_type === Company::class ? 'companies.edit' : 'accounts.edit', $item->reviewable_id),
                    BaseHelper::clean($item->reviewable->name)
                )->toHtml();
            })
            ->editColumn('created_by_id', function ($item) {
                if (! $item->createdBy->id) {
                    return '&mdash;';
                }

                return Html::link(
                    route($item->created_by_type === Company::class ? 'companies.edit' : 'accounts.edit', $item->created_by_id),
                    BaseHelper::clean($item->createdBy->name)
                )->toHtml();
            })
            ->editColumn('star', function ($item) {
                return view('plugins/job-board::reviews.partials.rating', ['star' => $item->star])->render();
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('status', function ($item) {
                return BaseHelper::clean($item->status->toHtml());
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->addColumn('operations', function ($item) {
                return view('plugins/job-board::reviews.partials.actions', compact('item'))->render();
            });

        return $this->toJson($data);
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = $this->repository->getModel()
            ->select([
                'id',
                'star',
                'review',
                'reviewable_id',
                'reviewable_type',
                'created_by_id',
                'created_by_type',
                'status',
                'created_at',
            ])
            ->with(['account', 'reviewable']);

        return $this->applyScopes($query);
    }

    public function columns(): array
    {
        return [
            'id' => [
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
                'class' => 'text-start',
            ],
            'reviewable_id' => [
                'title' => trans('plugins/job-board::review.account_or_company'),
                'class' => 'text-start',
            ],
            'created_by_id' => [
                'title' => trans('plugins/job-board::review.reviewed_by'),
                'class' => 'text-start',
            ],
            'star' => [
                'title' => trans('plugins/job-board::review.star'),
                'class' => 'text-center',
            ],
            'review' => [
                'title' => trans('plugins/job-board::review.review'),
                'class' => 'text-start',
            ],
            'status' => [
                'title' => trans('plugins/job-board::review.status'),
                'class' => 'text-center',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'width' => '70px',
                'class' => 'text-start',
            ],
        ];
    }

    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('reviews.deletes'), 'reviews.destroy', parent::bulkActions());
    }
}
