<?php

declare(strict_types=1);

namespace 認証\インフラ\リポジトリ;

use 認証\インフラ\エロクアント\ユーザエロクアント;
use 認証\インフラ\レスポンスデータ\ユーザレスポンスデータ;
use 認証\ドメイン\モデル\登録済みユーザクエリサービスインターフェース;

class 登録済みユーザクエリサービス implements 登録済みユーザクエリサービスインターフェース
{
    public function __construct(private ユーザエロクアント $ユーザエロクアント)
    {
    }

    public function 取得(string $SNS名, string $SNSアカウントid): ?ユーザレスポンスデータ
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
