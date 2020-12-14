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

class カートリポジトリ implements カートリポジトリインターフェース
{
    private $カートエロクアント;
    private $カート内商品エロクアント;

    public function __construct(
        カートエロクアント $カートエロクアント,
        カート内商品エロクアント $カート内商品エロクアント
    ) {
        $this->カートエロクアント = $カートエロクアント;
        $this->カート内商品エロクアント = $カート内商品エロクアント;
    }

    public function 登録用に次のカートIDを取得する(): カートIDレスポンスデータ
    {
        $テーブル名 = $this->カートエロクアント->getTable();
        $シーケンス名 = $テーブル名 . 'シーケンス';

        //idカラムに現在の値 + 1を挿入
        DB::table($シーケンス名)->update(['id' => DB::raw('LAST_INSERT_ID(id + 1)')]);

        $新規採番id = DB::table($シーケンス名)->selectRaw('LAST_INSERT_ID() as id')->first()->id;

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

    public function 保存(カート $追加カート)
    {
        $カート = $this->カートエロクアント::where('ユーザid', $追加カート->ユーザid())->first();

        if ($カート === null or $this->商品がすべて注文済みか(new ユーザID($追加カート->ユーザid()))) {
            // 新規登録する
            $カート = new カートエロクアント();
            $カート->fill(
                [
                    'id' => $追加カート->id(),
                    'ユーザid' => $追加カート->ユーザid(),
                ]
            );

            $カート->save();
        }
    }

    public function カート内商品を保存(カート内商品 $追加商品)
    {
        $this->カート内商品エロクアント::updateOrCreate(
            [
                'カートid' => $追加商品->カートid(),
                '商品id' => $追加商品->商品id(),
            ],
            ['数量' => $追加商品->数量()]
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
