<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use 商品\インフラ\アップロード\画像アップローダ as 商品画像アップローダ;
use 商品\ドメイン\モデル\アップロード\画像アップローダインターフェース as 商品画像アップローダインターフェース;

class ファイルサービスプロバイダ extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            商品画像アップローダインターフェース::class,
            商品画像アップローダ::class
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

