<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use Illuminate\Support\Facades\Auth;
use 認証\ドメイン\モデル\会員ユーザ紐付けドメインサービス;
use 認証\ドメイン\モデル\ドライバインターフェース;

class 会員ユーザ紐付け
{
    private $ドライバ;
    private $会員ユーザ紐付けドメインサービス;

    public function __construct(
        ドライバインターフェース $ドライバ,
        会員ユーザ紐付けドメインサービス $会員ユーザ紐付けドメインサービス
    ) {
        $this->ドライバ = $ドライバ;
        $this->会員ユーザ紐付けドメインサービス = $会員ユーザ紐付けドメインサービス;
    }

    public function 実行($SNS名)
    {
        $SNSユーザ = $this->ドライバ->ユーザ情報取得($SNS名);

        $登録済みユーザ = $this->会員ユーザ紐付けドメインサービス->実行($SNSユーザ, $SNS名);

        Auth::login($登録済みユーザ, true);
    }
}
