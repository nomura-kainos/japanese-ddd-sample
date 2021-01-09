<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use 共通\トランザクション\トランザクションインターフェース;
use 認証\ドメイン\モデル\SNSアカウント;
use 認証\ドメイン\モデル\SNSアカウント紐付け済み仕様;
use 認証\ドメイン\モデル\ユーザ;
use 認証\ドメイン\モデル\ユーザID;
use 認証\ドメイン\モデル\ユーザファクトリ;
use 認証\ドメイン\モデル\ユーザリポジトリインターフェース;
use 認証\ドメイン\モデル\ログインユーザインターフェース;
use 認証\ドメイン\モデル\ドライバインターフェース;
use 認証\ドメイン\モデル\未登録ユーザ仕様;

class 会員ユーザ紐付け
{
    public function __construct(
        private トランザクションインターフェース $トランザクション,
        private ドライバインターフェース $ドライバ,
        private ユーザリポジトリインターフェース $ユーザリポ,
        private ユーザファクトリ $ユーザファクトリ,
        private ログインユーザインターフェース $ログインユーザ,
        private SNSアカウント紐付け済み仕様 $SNSアカウント紐付け済み仕様,
        private 未登録ユーザ仕様 $未登録ユーザ仕様,
    ) {
    }

    public function 実行(string $SNS名)
    {
        $SNSアカウント = $this->接続したSNSアカウントの取得($SNS名);
        if ($this->既に紐付いているか？($SNSアカウント)) {
            $this->登録済みの会員ユーザでログインする($SNSアカウント);
            return;
        }

        $this->トランザクション->スコープ(function () use ($SNSアカウント) {

            if ($this->未登録ユーザ仕様->満たすか？($this->ログインユーザ)) {
                $ユーザ = $this->ユーザ登録($SNSアカウント);
                $this->ログインユーザ::ログインする($ユーザ->id());
            } else {
                $ユーザ = $this->既存ユーザ取得(new ユーザID($this->ログインユーザ::id()));
            }

            $ユーザ->SNSアカウントを追加する($SNSアカウント->SNS名(), $SNSアカウント->id());

            $this->ユーザリポ->保存($ユーザ);
        });
    }

    private function 接続したSNSアカウントの取得(string $SNS名): SNSアカウント
    {
        $SNSアカウント = $this->ドライバ->アカウント取得($SNS名);
        return new SNSアカウント(
            $SNS名,
            $SNSアカウント->getId(),
            $SNSアカウント->getEmail(),
        );
    }

    private function 既に紐付いているか？(SNSアカウント $SNSアカウント): bool
    {
        return $this->SNSアカウント紐付け済み仕様->満たすか？($SNSアカウント);
    }

    private function 登録済みの会員ユーザでログインする(SNSアカウント $SNSアカウント)
    {
        $ユーザid = $this->ユーザリポ->登録済みユーザを1件取得($SNSアカウント->SNS名(), $SNSアカウント->id())->id();
        $this->ログインユーザ::ログインする($ユーザid);
    }

    private function ユーザ登録(SNSアカウント $SNSアカウント): ユーザ
    {
        return $this->ユーザファクトリ->作成する(
            $SNSアカウント->メール(),
            null, //SNS側にログインを委譲するため、パスワードを必要としない
        );
    }

    private function 既存ユーザ取得(ユーザID $ユーザid)
    {
        $ユーザ = $this->ユーザリポ->IDで1件取得($ユーザid);

        return $this->ユーザファクトリ->再構成する(
            $ユーザid,
            $ユーザ->メール(),
            $ユーザ->パスワード(),
            $ユーザ->SNSアカウントコレクション()
        );
    }
}
