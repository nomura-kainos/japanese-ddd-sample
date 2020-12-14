<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use 共通\ログインユーザ\ログインユーザ;
use 共通\ログインユーザ\ログインユーザインターフェース;
use 認証\ドメイン\モデル\ログインユーザインターフェース as 認証ログインユーザインターフェース;

class ログインユーザサービスプロバイダ extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ログインユーザインターフェース::class,
            ログインユーザ::class
        );

        $this->app->bind(
            認証ログインユーザインターフェース::class,
            ログインユーザ::class
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

