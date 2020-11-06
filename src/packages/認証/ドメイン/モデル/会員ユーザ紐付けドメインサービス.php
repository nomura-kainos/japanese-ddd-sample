<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use Laravel\Socialite\Contracts\User;
use 認証\インフラ\エロクアント\SNSアカウントエロクアント;
use 認証\インフラ\エロクアント\ユーザエロクアント;

class 会員ユーザ紐付けドメインサービス
{
    private $SNSアカウントエロクアント;
    private $ユーザエロクアント;

    public function __construct(
        SNSアカウントエロクアント $SNSアカウントエロクアント,
        ユーザエロクアント $ユーザエロクアント
    )
    {
        $this->SNSアカウントエロクアント = $SNSアカウントエロクアント;
        $this->ユーザエロクアント = $ユーザエロクアント;
    }

    public function 実行(User $SNSユーザ, string $SNS名)
    {
        $紐付け済みSNSアカウント = $this->紐付け済みSNSアカウントの取得($SNSユーザ->getId(), $SNS名);
        if ($紐付け済みSNSアカウント) {
            return $紐付け済みSNSアカウント->ユーザエロクアント;
        }

        $登録済みユーザ = $this->登録済みユーザの取得($SNSユーザ->getEmail());
        if ($登録済みユーザ == null) {
            $登録済みユーザ = $this->新規ユーザ作成($SNSユーザ);
        }

        $SNSアカウント引数 = [
            'SNS名' => $SNS名,
            'SNSアカウントid' => $SNSユーザ->getId()
        ];
        $this->ユーザ紐付け($登録済みユーザ->id, $SNSアカウント引数);

        return $登録済みユーザ;
    }

    private function 紐付け済みSNSアカウントの取得(string $SNSアカウントid, string $SNS名): ?SNSアカウントエロクアント
    {
        return $this->SNSアカウントエロクアント::where('SNS名', $SNS名)
            ->where('SNSアカウントid', $SNSアカウントid)
            ->first();
    }

    private function 登録済みユーザの取得(string $メール): ?ユーザエロクアント
    {
        return $this->ユーザエロクアント::where('メール', $メール)->first();
    }

    private function 新規ユーザ作成(User $SNSユーザ): ユーザエロクアント
    {
        return $this->ユーザエロクアント::create([
            '名前'  => $SNSユーザ->getName(),
            'メール' => $SNSユーザ->getEmail(),
            'パスワード' => null, //SNS側にログインを委譲するため、パスワードを必要としない
        ]);
    }

    private function ユーザ紐付け(int $ユーザid, array $SNSアカウント引数)
    {
        $this->SNSアカウントエロクアント->create([
            'ユーザid' => $ユーザid,
            'SNS名' => $SNSアカウント引数['SNS名'],
            'SNSアカウントid'   => $SNSアカウント引数['SNSアカウントid'],
        ]);
    }
}
