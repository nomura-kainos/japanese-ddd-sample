<?php

declare(strict_types=1);

namespace カート\インフラ\リポジトリ;

use Illuminate\Support\Facades\DB;
use カート\インフラ\エロクアント\カート内商品エロクアント;
use カート\インフラ\レスポンスデータ\カートIDレスポンスデータ;
use カート\インフラ\レスポンスデータ\カートレスポンスデータ;
use カート\インフラ\レスポンスデータ\カート内商品レスポンスデータ;
use カート\ドメイン\モデル\カート;
use カート\インフラ\エロクアント\カートエロクアント;
use カート\ドメイン\モデル\カートID;
use カート\ドメイン\モデル\カートリポジトリインターフェース;
use カート\ドメイン\モデル\カート内商品;
use カート\ドメイン\モデル\カート内商品ID;
use カート\ドメイン\モデル\ユーザID;
use 共通\ID採番\ID採番インターフェース;

class カートリポジトリ implements カートリポジトリインターフェース
{
    private $ID採番;
    private $カートエロクアント;
    private $カート内商品エロクアント;

    public function __construct(
        ID採番インターフェース $ID採番,
        カートエロクアント $カートエロクアント,
        カート内商品エロクアント $カート内商品エロクアント
    ) {
        $this->ID採番 = $ID採番;
        $this->カートエロクアント = $カートエロクアント;
        $this->カート内商品エロクアント = $カート内商品エロクアント;
    }

    public function 登録用に次のカートIDを取得する(): カートIDレスポンスデータ
    {
        $新規採番id = $this->ID採番->連番を発行する($this->カートエロクアント->getTable());
        return new カートIDレスポンスデータ($新規採番id);
    }

    public function ユーザIDで1件取得(ユーザID $ユーザid): ?カートレスポンスデータ
    {
        $カート = $this->カートエロクアント::where('ユーザid', $ユーザid->値)->first();
        if ($カート === null) {
            return null;
        }
        return new カートレスポンスデータ($カート);
    }

    public function 商品がすべて注文済みか(ユーザID $ユーザid): bool
    {
        $テーブル名 = $this->カートエロクアント->getTable();
        $未注文のカート = DB::table($テーブル名)
            ->join('カート内商品', 'カート.id', '=', 'カート内商品.カートid')
            ->where('ユーザid', $ユーザid->値)
            ->where('注文済みか', false)
            ->first();

        return $未注文のカート === null;
    }

    public function カート内商品を1件取得(カートID $id, カート内商品ID $カート内商品id): ?カート内商品レスポンスデータ
    {
        $カート内商品 = $this->カート内商品エロクアント::where('カートid', $id->値)
            ->where('商品id', $カート内商品id->値)
            ->first();

        if ($カート内商品 === null) {
            return null;
        }
        return new カート内商品レスポンスデータ($カート内商品);
    }

    public function 保存(カート $カート)
    {
        $this->カートエロクアント::updateOrCreate(
            [
                'id' => $カート->id(),
                'ユーザid' => $カート->ユーザid(),
            ],
            ['updated_at' => false] // 更新日時の変更
        );
    }

    public function カート内商品を保存(カート内商品 $商品)
    {
        $this->カート内商品エロクアント::updateOrCreate(
            [
                'カートid' => $商品->カートid(),
                '商品id' => $商品->商品id(),
            ],
            ['数量' => $商品->数量()],

        );
    }

    public function カート内商品を削除(カートID $カートid, カート内商品ID $商品id)
    {
        $this->カート内商品エロクアント::where([
            ['カートid', $カートid->値],
            ['商品id', $商品id->値],
        ])->delete();
    }

    public function 注文済みにする(ユーザID $ユーザid)
    {
        $カート = $this->カートエロクアント::where('ユーザid', $ユーザid->値)->orderBy('created_at', 'DESC')->first();
        if ($カート === null) {
            return;
        }

        $this->カート内商品エロクアント::where([
            ['カートid', $カート->id],
        ])->update([
            '注文済みか' => true,
        ]);
    }
}
