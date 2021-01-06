<?php

declare(strict_types=1);

namespace カート\インフラ\リポジトリ;

use Illuminate\Support\Collection;
use カート\インフラ\エロクアント\カート内商品エロクアント;
use カート\インフラ\レスポンスデータ\カートIDレスポンスデータ;
use カート\インフラ\レスポンスデータ\カートレスポンスデータ;
use カート\インフラ\レスポンスデータ\カート内商品コレクションレスポンスデータ;
use カート\インフラ\レスポンスデータ\カート内商品レスポンスデータ;
use カート\ドメイン\モデル\カート;
use カート\インフラ\エロクアント\カートエロクアント;
use カート\ドメイン\モデル\カートID;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use カート\ドメイン\モデル\カート内商品ID;
use 共通\ID採番\ID採番インターフェース;
use 共通\仕様\選択;
use 共通\集約ルート\集約ルートチェッカーインターフェース;

class カートリポジトリ implements カートリポジトリインターフェース
{
    private 集約ルートチェッカーインターフェース $集約ルートチェッカー;
    private $ID採番;
    private $カートエロクアント;
    private $カート内商品エロクアント;

    public function __construct(
        集約ルートチェッカーインターフェース $集約ルートチェッカー,
        ID採番インターフェース $ID採番,
        カートエロクアント $カートエロクアント,
        カート内商品エロクアント $カート内商品エロクアント
    ) {
        $this->集約ルートチェッカー = $集約ルートチェッカー;
        $this->ID採番 = $ID採番;
        $this->カートエロクアント = $カートエロクアント;
        $this->カート内商品エロクアント = $カート内商品エロクアント;
    }

    public function 登録用に次のカートIDを取得する(): カートIDレスポンスデータ
    {
        $新規採番id = $this->ID採番->連番を発行する($this->カートエロクアント->getTable());
        return new カートIDレスポンスデータ($新規採番id);
    }

    public function 仕様で取得(選択 $仕様): ?カートレスポンスデータ
    {
        $複数カート = $this->カートエロクアント::all();
        if ($複数カート->isEmpty()) {
            return null;
        }

        $仕様->基準を設定する($複数カート->toArray());

        $カート = $複数カート->filter(function (カートエロクアント $カート) use ($仕様) {
            return $仕様->満たすか($カート);
        });

        if ($カート->isEmpty()) {
            return null;
        }

        return new カートレスポンスデータ($カート->first());
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

    public function カート内商品を1件取得(カートID $カートid, カート内商品ID $カート内商品id): ?カート内商品レスポンスデータ
    {
        $カート内商品 = $this->カート内商品エロクアント::where('カートid', $カートid->値)
            ->where('商品id', $カート内商品id->値)
            ->first();

        if ($カート内商品 === null) {
            return null;
        }
        return new カート内商品レスポンスデータ($カート内商品);
    }

    public function 保存(カート $カート)
    {
        $this->集約ルートチェッカー::チェック($カート);

        $this->カートエロクアント::updateOrCreate(
            [
                'id' => $カート->id(),
                'ユーザid' => $カート->ユーザid(),
            ],
            ['updated_at' => false] // 更新日時の変更
        );

        $this->カート内商品エロクアント::updateOrCreate(
            [
                'カートid' => $カート->id(),
                '商品id' => $カート->商品()->商品id(),
            ],
            ['数量' => $カート->商品()->数量()]
        );
    }

    public function カート内商品を削除(カートID $カートid, カート内商品ID $商品id)
    {
        $this->カート内商品エロクアント::where([
            ['カートid', $カートid->値],
            ['商品id', $商品id->値],
        ])->delete();
    }

    public function 注文済みにする(カートID $カートid)
    {
        $this->カート内商品エロクアント::where([
            ['カートid', $カートid->値],
        ])->update([
            '注文済みか' => true,
        ]);
    }
}
