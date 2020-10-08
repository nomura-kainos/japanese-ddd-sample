<?php

declare(strict_types=1);

namespace 商品カテゴリ\アプリ\ユースケース;

use Illuminate\Http\Request;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリファクトリ;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリリポジトリインターフェース;

class 登録
{
    private $商品カテゴリリポ;
    private $商品カテゴリファクトリ;

    public function __construct(商品カテゴリリポジトリインターフェース $商品カテゴリリポ, 商品カテゴリファクトリ $商品カテゴリファクトリ)
    {
        $this->商品カテゴリリポ = $商品カテゴリリポ;
        $this->商品カテゴリファクトリ = $商品カテゴリファクトリ;
    }

    public function 実行(Request $リクエスト)
    {
        $商品カテゴリ = $this->商品カテゴリファクトリ->作成する(
            $リクエスト->名前
        );

        $this->商品カテゴリリポ->保存($商品カテゴリ);
    }
}
