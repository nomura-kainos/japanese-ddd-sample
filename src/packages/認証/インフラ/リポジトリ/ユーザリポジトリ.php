<?php

declare(strict_types=1);

namespace 認証\インフラ\リポジトリ;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use 認証\インフラ\エロクアント\SNSアカウントエロクアント;
use 認証\インフラ\レスポンスデータ\ユーザIDレスポンスデータ;
use 認証\インフラ\レスポンスデータ\ユーザレスポンスデータ;
use 認証\ドメイン\モデル\SNSアカウント;
use 認証\ドメイン\モデル\ユーザ;
use 認証\ドメイン\モデル\ユーザID;
use 認証\ドメイン\モデル\ユーザリポジトリインターフェース;
use 認証\インフラ\エロクアント\ユーザエロクアント;

class ユーザリポジトリ implements ユーザリポジトリインターフェース
{
    private $ユーザエロクアント;
    private $SNSアカウントエロクアント;

    public function __construct(
        ユーザエロクアント $ユーザエロクアント,
        SNSアカウントエロクアント $SNSアカウントエロクアント
    ) {
        $this->ユーザエロクアント = $ユーザエロクアント;
        $this->SNSアカウントエロクアント = $SNSアカウントエロクアント;
    }

    public function 登録用に次のユーザIDを取得する(): ユーザIDレスポンスデータ
    {
        $テーブル名 = $this->ユーザエロクアント->getTable();
        $新規採番ID = DB::table($テーブル名)->max('id') + 1;
        return new ユーザIDレスポンスデータ($新規採番ID);
    }

    public function IDで1件取得(ユーザID $id): ?ユーザレスポンスデータ
    {
        $ユーザ = $this->ユーザエロクアント::find($id->値);
        if ($ユーザ === null) {
            return null;
        }
        return new ユーザレスポンスデータ($ユーザ);
    }

    public function SNS紐付け済みユーザを1件取得(string $SNS名, string $SNSアカウントid): ?ユーザレスポンスデータ
    {
        $テーブル名 = $this->ユーザエロクアント->getTable();
        $ユーザ = DB::table($テーブル名)
            ->join('SNSアカウント', 'ユーザ.id', '=', 'SNSアカウント.ユーザid')
            ->where('SNS名', $SNS名)
            ->where('SNSアカウントid', $SNSアカウントid)
            ->select('ユーザ.*')
            ->first();

        if ($ユーザ == null) {
            return null;
        }

        return new ユーザレスポンスデータ($ユーザ->toArray());
    }

    public function 保存(ユーザ $ユーザ): ユーザレスポンスデータ
    {
        $暗号化済パスワード = $ユーザ->パスワード() !== null ? Hash::make($ユーザ->パスワード()) : null;

        $this->ユーザエロクアント->fill(
            [
                'id' => $ユーザ->id(),
                'email' => $ユーザ->メール(),
                'password' => $暗号化済パスワード,
            ],
        );

        $this->ユーザエロクアント->save();

        return new ユーザレスポンスデータ($this->ユーザエロクアント->toArray());
    }

    public function SNSアカウント紐付け(ユーザID $id, SNSアカウント $SNSアカウント)
    {
        $this->SNSアカウントエロクアント->fill([
            'ユーザid' => $id->値,
            'SNS名' => $SNSアカウント->SNS名(),
            'SNSアカウントid'   => $SNSアカウント->id(),
        ]);
        $this->SNSアカウントエロクアント->save();
    }
}
