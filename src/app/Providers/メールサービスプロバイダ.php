<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use 注文\インフラ\メール\メール;
use 注文\ドメイン\モデル\メールインターフェース;

class メールサービスプロバイダ extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            メールインターフェース::class,
            メール::class
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

