<?php

namespace App\Providers;

use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use カート\アプリ\ユースケース\カート内商品を注文済みにする;
use 共通\イベント履歴エロクアント;
use 注文\ドメイン\モデル\注文が確定された;

class イベントサービスプロバイダ extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        注文が確定された::class => [
            カート内商品を注文済みにする::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->イベントが開始されたときに、履歴が登録されるように設定する();
        $this->イベントが失敗したときに、履歴が登録されるように設定する();
        $this->イベントが成功したときに、履歴が登録されるように設定する();

        parent::boot();
    }

    private function イベントが開始されたときに、履歴が登録されるように設定する()
    {
        Queue::before(function (JobProcessing $イベント) {
            $イベント履歴 = new イベント履歴エロクアント();
            $イベント履歴->fill(
                [
                    'イベントid' => $イベント->job->getJobId(),
                    '処理ステータス' => '開始',
                ]
            );
            $イベント履歴->save();
        });
    }

    private function イベントが失敗したときに、履歴が登録されるように設定する()
    {
        Queue::failing(function (JobFailed $イベント) {
            $イベント履歴 = new イベント履歴エロクアント();
            $イベント履歴->fill(
                [
                    'イベントid' => $イベント->job->getJobId(),
                    '処理ステータス' => '失敗',
                ]
            );
            $イベント履歴->save();
        });
    }

    private function イベントが成功したときに、履歴が登録されるように設定する()
    {
        Queue::after(function (JobProcessed $イベント) {
            $イベント履歴 = new イベント履歴エロクアント();
            $イベント履歴->fill(
                [
                    'イベントid' => $イベント->job->getJobId(),
                    '処理ステータス' => '完了',
                ]
            );
            $イベント履歴->save();
        });
    }
}
