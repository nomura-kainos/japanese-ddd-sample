<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use 認証\インフラ\ドライバ\SNSドライバ;
use 認証\ドメイン\モデル\ドライバインターフェース;

class ドライバサービスプロバイダ extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ドライバインターフェース::class,
            SNSドライバ::class
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

