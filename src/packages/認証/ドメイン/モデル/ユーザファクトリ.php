<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\集約ルート\集約ルートチェッカーインターフェース;

class ユーザファクトリ
{
    public function __construct(
        private 集約ルートチェッカーインターフェース $集約ルートチェッカー,
        private ユーザリポジトリインターフェース $ユーザリポ
    ) {
    }

    public function 作成する(string $メール, ?string $パスワード): ユーザ
    {
        $ユーザID = $this->ユーザリポ->登録用に次のユーザIDを取得する();

        $集約ルート = new ユーザ(
            new ユーザID($ユーザID->値()),
            $メール,
            $パスワード
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }

    public function 再構成する(ユーザID $ユーザid, string $メール, ?string $パスワード, array $複数SNSアカウント): ユーザ
    {
        $SNSコレクション = [];
        foreach ($複数SNSアカウント as $SNSアカウント) {
            $SNSコレクション[] = new SNSアカウント(
                $SNSアカウント->SNS名(),
                $SNSアカウント->id(),
            );
        }

        $集約ルート = new ユーザ(
            new ユーザID($ユーザid->値),
            $メール,
            $パスワード,
            $SNSコレクション
        );

        $this->集約ルートチェッカー::チェック($集約ルート);
        return $集約ルート;
    }
}
