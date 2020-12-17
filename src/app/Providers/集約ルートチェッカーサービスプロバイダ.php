<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use 共通\集約ルート\集約ルートチェッカー;
use 共通\集約ルート\集約ルートチェッカーインターフェース;

class 集約ルートチェッカーサービスプロバイダ extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            集約ルートチェッカーインターフェース::class,
            集約ルートチェッカー::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}

