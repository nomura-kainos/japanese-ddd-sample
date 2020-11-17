<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use カート\インフラ\リポジトリ\カートリポジトリ;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use 商品\アプリ\ユースケース\一覧表示クエリサービスインターフェース;
use 商品\アプリ\ユースケース\詳細表示クエリサービスインターフェース;
use 商品\インフラ\リポジトリ\一覧表示クエリサービス;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\インフラ\リポジトリ\詳細表示クエリサービス;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;
use 商品カテゴリ\インフラ\リポジトリ\商品カテゴリリポジトリ;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリリポジトリインターフェース;
use 認証\インフラ\リポジトリ\ユーザリポジトリ;
use 認証\ドメイン\モデル\ユーザリポジトリインターフェース;

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

        $this->app->bind(
            一覧表示クエリサービスインターフェース::class,
            一覧表示クエリサービス::class
        );

        $this->app->bind(
            詳細表示クエリサービスインターフェース::class,
            詳細表示クエリサービス::class
        );

        $this->app->bind(
            商品カテゴリリポジトリインターフェース::class,
            商品カテゴリリポジトリ::class
        );

        $this->app->bind(
            ユーザリポジトリインターフェース::class,
            ユーザリポジトリ::class
        );

        $this->app->bind(
            カートリポジトリインターフェース::class,
            カートリポジトリ::class
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

