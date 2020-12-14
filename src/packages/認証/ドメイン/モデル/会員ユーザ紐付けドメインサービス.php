<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

class 会員ユーザ紐付けドメインサービス
{
    private $ユーザリポ;
    private $ユーザファクトリ;
    private $ログインユーザ;

    public function __construct(
        ユーザリポジトリインターフェース $ユーザリポ,
        ユーザファクトリ $ユーザファクトリ,
        ログインユーザインターフェース $ログインユーザ
    ) {
        $this->ユーザリポ = $ユーザリポ;
        $this->ユーザファクトリ = $ユーザファクトリ;
        $this->ログインユーザ = $ログインユーザ;
    }

    public function 実行(SNSアカウント $SNSアカウント)
    {
        $紐付け済みユーザ = $this->ユーザリポ->SNS紐付け済みユーザを1件取得($SNSアカウント->SNS名(), $SNSアカウント->id());
        if ($紐付け済みユーザ !== null) {
            return $紐付け済みユーザ;
        }

        if ($this->ログインユーザ::ログイン済みか()) {
            $登録済みユーザ = $this->ユーザリポ->IDで1件取得(new ユーザID($this->ログインユーザ::id()));
        } else {
            $ユーザ = $this->ユーザファクトリ->作成する(
                $SNSアカウント->メール(),
                null, //SNS側にログインを委譲するため、パスワードを必要としない
            );
            $登録済みユーザ = $this->ユーザリポ->保存($ユーザ);
        }

        $this->ユーザリポ->SNSアカウント紐付け(new ユーザID($登録済みユーザ->id()), $SNSアカウント);

        return $登録済みユーザ;
    }
}
