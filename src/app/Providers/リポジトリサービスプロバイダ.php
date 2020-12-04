<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use カート\アプリ\ユースケース\一覧表示クエリサービスインターフェース as カート一覧表示クエリサービスインターフェース;
use カート\インフラ\リポジトリ\カートリポジトリ;
use カート\インフラ\リポジトリ\一覧表示クエリサービス as カート一覧表示クエリサービス;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use 商品\アプリ\ユースケース\一覧表示クエリサービスインターフェース as 商品一覧表示クエリサービスインターフェース;
use 商品\アプリ\ユースケース\詳細表示クエリサービスインターフェース;
use 商品\インフラ\リポジトリ\一覧表示クエリサービス as 商品一覧表示クエリサービス;
use 商品\インフラ\リポジトリ\商品リポジトリ;
use 商品\インフラ\リポジトリ\詳細表示クエリサービス;
use 商品\ドメイン\モデル\商品リポジトリインターフェース;
use 商品カテゴリ\インフラ\リポジトリ\商品カテゴリリポジトリ;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリリポジトリインターフェース;
use 注文\インフラ\リポジトリ\注文リポジトリ;
use 注文\ドメイン\モデル\注文リポジトリインターフェース;
use 特集\インフラ\リポジトリ\特集リポジトリ;
use 特集\ドメイン\モデル\特集リポジトリインターフェース;
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
            商品一覧表示クエリサービスインターフェース::class,
            商品一覧表示クエリサービス::class
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

        $this->app->bind(
            カート一覧表示クエリサービスインターフェース::class,
            カート一覧表示クエリサービス::class
        );

        $this->app->bind(
            注文リポジトリインターフェース::class,
            注文リポジトリ::class
        );

        $this->app->bind(
            特集リポジトリインターフェース::class,
            特集リポジトリ::class
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

