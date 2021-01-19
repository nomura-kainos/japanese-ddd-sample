<?php

declare(strict_types=1);

namespace 認証\インフラ\リポジトリ;

use 共通\ID採番\ID採番インターフェース;
use 認証\インフラ\エロクアント\SNSアカウントエロクアント;
use 認証\インフラ\レスポンスデータ\SNSアカウントコレクションレスポンスデータ;
use 認証\インフラ\レスポンスデータ\ユーザIDレスポンスデータ;
use 認証\インフラ\レスポンスデータ\ユーザレスポンスデータ;
use 認証\ドメイン\モデル\ユーザID;
use 認証\ドメイン\モデル\ユーザクエリサービスインターフェース;
use 認証\インフラ\エロクアント\ユーザエロクアント;

class ユーザクエリサービス implements ユーザクエリサービスインターフェース
{
    public function __construct(
        private ID採番インターフェース $ID採番,
        private ユーザエロクアント $ユーザエロクアント,
        private SNSアカウントエロクアント $SNSアカウントエロクアント,
    ) {
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

    public function 登録済みの会員ユーザ取得(string $SNS名, string $SNSアカウントid): ?ユーザレスポンスデータ
    {
        $ユーザ = $this->ユーザエロクアント::select(
            'ユーザ.*'
        )
            ->join('SNSアカウント', 'ユーザ.id', '=', 'SNSアカウント.ユーザid')
            ->where('SNS名', $SNS名)
            ->where('SNSアカウントid', $SNSアカウントid)
            ->first();

        if ($ユーザ == null) {
            return null;
        }

        return new ユーザレスポンスデータ($ユーザ);
    }
}
