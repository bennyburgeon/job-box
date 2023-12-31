<div id="credit-histories">
    <br>
    <h4>{{ __('Credits') }}: {{ $account->credits }}</h4>

    <div class="mt20 mb20">
        <div>
            <div class="comment-log ws-nm">
                <div class="comment-log-title">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="bold-light m-xs-b hide-print">{{ trans('plugins/job-board::account.transactions') }}</label>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="#" class="btn-trigger-add-credit">{{ trans('plugins/job-board::account.add_credit') }}</a>
                        </div>
                    </div>
                </div>
                <div class="comment-log-timeline">
                    @if ($transactions->count() > 0)
                        <div class="column-left-history ps-relative" id="order-history-wrapper">
                            <div class="item-card">
                                <div class="item-card-body clearfix">
                                    @foreach ($transactions as $transaction)
                                        <div class="item comment-log-item comment-log-item-date ui-feed__timeline">
                                            <div class="ui-feed__item ui-feed__item--message">
                                                <span class="ui-feed__marker @if ($transaction->account_id) ui-feed__marker--user-action @endif"></span>
                                                <div class="ui-feed__message">
                                                    <div class="timeline__message-container">
                                                        <div class="timeline__inner-message">
                                                            <a href="#"
                                                               class="text-no-bold show-timeline-dropdown hover-underline"
                                                               data-target="#history-line-{{ $transaction->id }}">
                                                                <span>{{ trans('plugins/job-board::account.added') }} {{ $transaction->credits }} {{ __('credit(s) by admin') }} {{ $transaction->user->name }}</span>
                                                            </a>
                                                        </div>
                                                        <time class="timeline__time">
                                                            <span>{{ $transaction->created_at }}</span></time>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-dropdown" id="history-line-{{ $transaction->id }}">
                                                {{ $transaction->description }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <p>{{ trans('plugins/job-board::account.no_transactions') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
