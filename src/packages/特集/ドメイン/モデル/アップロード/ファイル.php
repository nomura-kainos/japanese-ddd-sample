<?php

declare(strict_types=1);

namespace 特集\ドメイン\モデル\アップロード;

use Illuminate\Http\UploadedFile;

class ファイル
{
    private string $ファイルパス;

    public function __construct(private UploadedFile $ファイル)
    {
    }

    public function ファイルを保存する()
    {
        $ファイルパス = $this->ファイル->store('アップロード/特集', 'public');
        $this->ファイルパス = $ファイルパス;
    }

    public function パスを取得する(): string
    {
        return $this->ファイルパス;
    }

    public function 保存に成功したか？(): bool
    {
        return $this->ファイル->isValid();
    }

    public function 保存前のファイル名を取得する(): string
    {
        return $this->ファイル->getClientOriginalName();
    }
}
