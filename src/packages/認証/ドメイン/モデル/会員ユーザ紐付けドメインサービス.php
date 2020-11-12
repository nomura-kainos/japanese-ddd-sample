<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use Laravel\Socialite\Contracts\User;

class 会員ユーザ紐付けドメインサービス
{
    private $ユーザリポ;
    private $ユーザファクトリ;

    public function __construct(
        ユーザリポジトリインターフェース $ユーザリポ,
        ユーザファクトリ $ユーザファクトリ
    ) {
        $this->ユーザリポ = $ユーザリポ;
        $this->ユーザファクトリ = $ユーザファクトリ;
    }

    public function 実行(User $SNSアカウント, string $SNS名)
    {
        $紐付け済みユーザ = $this->ユーザリポ->SNS紐付け済みユーザを1件取得($SNSアカウント->getId(), $SNS名);
        if ($紐付け済みユーザ !== null) {
            return $紐付け済みユーザ;
        }

        if (ログインユーザ::ログイン済みか()) {
            $登録済みユーザ = $this->ユーザリポ->IDで1件取得(new ユーザID(ログインユーザ::id()));
        } else {
            $ユーザ = $this->ユーザファクトリ->作成する(
                $SNSアカウント->getName(),
                $SNSアカウント->getEmail(),
                null, //SNS側にログインを委譲するため、パスワードを必要としない
            );
            $登録済みユーザ = $this->ユーザリポ->保存($ユーザ);
        }

        $SNSアカウント引数 = [
            'SNS名' => $SNS名,
            'SNSアカウントid' => $SNSアカウント->getId()
        ];

        $this->ユーザリポ->SNSアカウント紐付け(new ユーザID($登録済みユーザ->id()), $SNSアカウント引数);

        return $登録済みユーザ;
    }
}
