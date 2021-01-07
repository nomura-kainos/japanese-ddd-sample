<?php

declare(strict_types=1);

namespace 認証\インフラ\リポジトリ;

use Illuminate\Support\Facades\Hash;
use 共通\ID採番\ID採番インターフェース;
use 共通\集約ルート\集約ルートチェッカーインターフェース;
use 認証\インフラ\エロクアント\SNSアカウントエロクアント;
use 認証\インフラ\レスポンスデータ\SNSアカウントコレクションレスポンスデータ;
use 認証\インフラ\レスポンスデータ\ユーザIDレスポンスデータ;
use 認証\インフラ\レスポンスデータ\ユーザレスポンスデータ;
use 認証\ドメイン\モデル\ユーザ;
use 認証\ドメイン\モデル\ユーザID;
use 認証\ドメイン\モデル\ユーザリポジトリインターフェース;
use 認証\インフラ\エロクアント\ユーザエロクアント;

class ユーザリポジトリ implements ユーザリポジトリインターフェース
{
    private $集約ルートチェッカー;
    private $ID採番;
    private $ユーザエロクアント;
    private $SNSアカウントエロクアント;

    public function __construct(
        集約ルートチェッカーインターフェース $集約ルートチェッカー,
        ID採番インターフェース $ID採番,
        ユーザエロクアント $ユーザエロクアント,
        SNSアカウントエロクアント $SNSアカウントエロクアント
    ) {
        $this->集約ルートチェッカー = $集約ルートチェッカー;
        $this->ID採番 = $ID採番;
        $this->ユーザエロクアント = $ユーザエロクアント;
        $this->SNSアカウントエロクアント = $SNSアカウントエロクアント;
    }

    public function 登録用に次のユーザIDを取得する(): ユーザIDレスポンスデータ
    {
        $新規採番id = $this->ID採番->連番を発行する($this->ユーザエロクアント->getTable());
        return new ユーザIDレスポンスデータ($新規採番id);
    }

    public function IDで1件取得(ユーザID $id): ?ユーザレスポンスデータ
    {
        $ユーザ = $this->ユーザエロクアント::find($id->値);
        if ($ユーザ === null) {
            return null;
        }

        $SNSアカウントコレクション = $this->SNSアカウントエロクアント::where('ユーザid', $ユーザ->id)->get();
        $SNSアカウントコレクションレスポンス = new SNSアカウントコレクションレスポンスデータ($SNSアカウントコレクション);

        return new ユーザレスポンスデータ($ユーザ, $SNSアカウントコレクションレスポンス->取得());
    }

    public function 登録済みユーザを1件取得(string $SNS名, string $SNSアカウントid): ?ユーザレスポンスデータ
    {
        $テーブル名 = $this->ユーザエロクアント->getTable();
        $ユーザ = DB::table($テーブル名)
            ->join('SNSアカウント', 'ユーザ.id', '=', 'SNSアカウント.ユーザid')
            ->where('SNS名', $SNS名)
            ->where('SNSアカウントid', $SNSアカウントid)
            ->first();

        if ($ユーザ == null) {
            return null;
        }

        return new ユーザレスポンスデータ((array)$ユーザ);
    }

    public function 保存(ユーザ $ユーザ)
    {
        $this->集約ルートチェッカー::チェック($ユーザ);
        $暗号化済パスワード = $ユーザ->パスワード() !== null ? Hash::make($ユーザ->パスワード()) : null;

        $this->ユーザエロクアント::updateOrCreate(
            [
                'id' => $ユーザ->id(),
            ],
            [
                'email' => $ユーザ->メール(),
                'password' => $暗号化済パスワード,
            ]
        );

        foreach ($ユーザ->SNSアカウントコレクション() as $SNSアカウント) {
            $this->SNSアカウントエロクアント::updateOrCreate(
                [
                    'ユーザid' => $ユーザ->id(),
                    'SNS名' => $SNSアカウント->SNS名(),
                ],
                [
                    'SNSアカウントid'   => $SNSアカウント->id(),
                ]
            );
        }
    }
}
