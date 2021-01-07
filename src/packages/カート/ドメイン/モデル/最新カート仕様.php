<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\仕様\選択;

class 最新カート仕様 implements 選択
{
    private $最新日時;
    private $処理を終了するか？ = false;

    public function __construct(
        private ユーザID $ユーザid
    ) {
    }

    public function 基準を設定する($複数カート)
    {
        $抽出対象 = $複数カート;

        $複数カート = $this->ユーザidが一致するカートのみ抽出する($抽出対象);
        if (empty($複数カート)) {
            $this->処理を終了するか？ = true;
            return;
        }
        $複数作成日時 = $this->作成日時のみ抽出する($複数カート);
        $最新の作成日時 = $this->最新の作成日時を抽出する($複数作成日時);

        $this->最新日時 = $最新の作成日時;
    }

    private function ユーザidが一致するカートのみ抽出する(array $複数カート): array
    {
        return array_filter($複数カート, function ($カート) {
            return $カート['ユーザid'] === $this->ユーザid->値;
        });
    }

    private function 作成日時のみ抽出する(array $複数カート): array
    {
        return array_column($複数カート, 'created_at');
    }

    private function 最新の作成日時を抽出する(array $複数作成日時): string
    {
        return max($複数作成日時);
    }

    public function 満たすか？($カート): bool
    {
        if ($this->処理を終了するか？) {
            return false;
        }

        if ($this->ユーザid->値 != $カート->ユーザid) {
            return false;
        }

        if ($this->最新日時 != $カート->created_at) {
            return false;
        }

        return true;
    }
}
