<?php

declare(strict_types=1);

namespace 認証\インフラ\リポジトリ;

use Illuminate\Support\Facades\Hash;
use 共通\集約ルート\集約ルートチェッカーインターフェース;
use 認証\インフラ\エロクアント\SNSアカウントエロクアント;
use 認証\ドメイン\モデル\ユーザ;
use 認証\ドメイン\モデル\ユーザリポジトリインターフェース;
use 認証\インフラ\エロクアント\ユーザエロクアント;

class ユーザリポジトリ implements ユーザリポジトリインターフェース
{
    public function __construct(
        private 集約ルートチェッカーインターフェース $集約ルートチェッカー,
        private ユーザエロクアント $ユーザエロクアント,
        private SNSアカウントエロクアント $SNSアカウントエロクアント,
    ) {
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
