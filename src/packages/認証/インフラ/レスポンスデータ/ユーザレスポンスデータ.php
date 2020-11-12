<?php

declare(strict_types=1);

namespace 認証\インフラ\レスポンスデータ;

use 認証\インフラ\エロクアント\ユーザエロクアント;

class ユーザレスポンスデータ
{
    private int $id;
    private string $名前;
    private string $メール;
    private string $パスワード;

    public function __construct(ユーザエロクアント $ユーザ)
    {
        $this->id = $ユーザ->id;
        $this->名前 = $ユーザ->名前;
        $this->メール = $ユーザ->email;
        $this->パスワード = $ユーザ->password;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function メール(): string
    {
        return $this->メール;
    }

    public function パスワード(): string
    {
        return $this->パスワード;
    }
}
