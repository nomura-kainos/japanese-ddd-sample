<?php
declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;

class リポジトリサービスプロバイダ extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            商品リポジトリインターフェース::class,
            商品リポジトリ::class
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

