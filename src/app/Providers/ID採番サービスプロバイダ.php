<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use 共通\ID採番\DBシーケンス;
use 共通\ID採番\ID採番インターフェース;

class ID採番サービスプロバイダ extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ID採番インターフェース::class,
            DBシーケンス::class
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

