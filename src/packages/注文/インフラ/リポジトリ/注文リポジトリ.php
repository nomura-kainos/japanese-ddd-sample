<?php

declare(strict_types=1);

namespace 注文\インフラ\リポジトリ;

use Illuminate\Support\Facades\DB;
use 共通\ID採番\ID採番インターフェース;
use 共通\集約ルート\集約ルートチェッカーインターフェース;
use 注文\インフラ\エロクアント\注文明細エロクアント;
use 注文\インフラ\レスポンスデータ\注文IDレスポンスデータ;
use 注文\ドメイン\モデル\注文;
use 注文\インフラ\エロクアント\注文エロクアント;
use 注文\ドメイン\モデル\注文リポジトリインターフェース;

class 注文リポジトリ implements 注文リポジトリインターフェース
{
    public function __construct(
        private 集約ルートチェッカーインターフェース $集約ルートチェッカー,
        private ID採番インターフェース $ID採番,
        private 注文エロクアント $注文エロクアント,
        private 注文明細エロクアント $注文明細エロクアント
    ) {
    }

    public function 登録用に次の注文IDを取得する(): 注文IDレスポンスデータ
    {
        $新規採番id = $this->ID採番->連番を発行する($this->注文エロクアント->getTable());
        return new 注文IDレスポンスデータ($新規採番id);
    }

    public function 保存(注文 $追加注文)
    {
        $this->集約ルートチェッカー::チェック($追加注文);

        $注文 = new 注文エロクアント();
        $注文->fill(
            [
                'id' => $追加注文->id(),
                'ユーザid' => $追加注文->ユーザid(),
            ]
        );

        $注文->save();

        $テーブル名 = $this->注文明細エロクアント->getTable();
        DB::table($テーブル名)->insert($追加注文->注文明細());
    }
}
