<?php

declare(strict_types=1);

namespace カート\インフラ\リポジトリ;

use Illuminate\Support\Collection;
use カート\インフラ\エロクアント\カート内商品エロクアント;
use カート\インフラ\レスポンスデータ\カートIDレスポンスデータ;
use カート\インフラ\レスポンスデータ\カートレスポンスデータ;
use カート\インフラ\レスポンスデータ\カート内商品コレクションレスポンスデータ;
use カート\インフラ\エロクアント\カートエロクアント;
use カート\ドメイン\モデル\カートID;
use カート\ドメイン\モデル\カートクエリサービスインターフェース;
use 共通\ID採番\ID採番インターフェース;
use 共通\仕様\選択;
use 共通\仕様\選択リポジトリインターフェース;

class カートクエリサービス implements カートクエリサービスインターフェース
{
    public function __construct(
        private ID採番インターフェース $ID採番,
        private 選択リポジトリインターフェース $選択リポ,
        private カートエロクアント $カートエロクアント,
        private カート内商品エロクアント $カート内商品エロクアント,
    ) {
    }

    public function 登録用に次のカートIDを取得する(): カートIDレスポンスデータ
    {
        $新規採番id = $this->ID採番->連番を発行する($this->カートエロクアント->getTable());
        return new カートIDレスポンスデータ($新規採番id);
    }

    public function 仕様で取得(選択 $仕様): ?カートレスポンスデータ
    {
        $単カートid = $this->選択リポ->満たすレコードを1件取得($this->カートエロクアント->getTable(), $仕様)?->id;
        if ($単カートid === null) {
            return null;
        }
        $商品コレクション = $this->カート内商品を全件取得(new カートID($単カートid));

        return new カートレスポンスデータ($単カートid, $商品コレクション->取得());
    }

    public function カート内商品を全件取得(カートID $カートid): カート内商品コレクションレスポンスデータ
    {
        $カート内複数商品 = $this->カート内商品エロクアント::where('カートid', $カートid->値)
            ->get();

        if ($カート内複数商品->isEmpty()) {
            return new カート内商品コレクションレスポンスデータ(new Collection());
        }
        return new カート内商品コレクションレスポンスデータ($カート内複数商品);
    }
}
