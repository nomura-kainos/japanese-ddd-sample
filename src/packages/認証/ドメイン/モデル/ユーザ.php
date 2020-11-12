<?php

declare(strict_types=1);

namespace 認証\ドメイン\モデル;

use 共通\エンティティ;

class ユーザ extends エンティティ
{
    private ユーザID $id;
    private string $名前;
    private string $メール;
    private string $パスワード;

    public function __construct(ユーザID $id, string $名前, string $メール, string $パスワード)
    {
        parent::ユニークキーを設定する($id);
        $this->id = $id;
        $this->名前 = $名前;
        $this->メール = $メール;
        $this->パスワード = $パスワード;
    }

    public function id(): int
    {
        return $this->id->値;
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
