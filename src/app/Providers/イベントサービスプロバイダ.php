<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use カート\アプリ\ユースケース\カート内商品を注文済みにする;
use 注文\ドメイン\モデル\メールインターフェース;
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
            メールインターフェース::class,
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
        parent::boot();
    }
}
