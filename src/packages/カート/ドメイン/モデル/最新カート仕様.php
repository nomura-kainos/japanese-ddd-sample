<?php

declare(strict_types=1);

namespace カート\ドメイン\モデル;

use 共通\仕様\選択;
use 共通\配列コピー\ディープコピー;

class 最新カート仕様 implements 選択
{
    private $最新日時;
    private $仕様チェックしないか？ = false;

    public function __construct(
        private ユーザID $ユーザid
    ) {
    }

    public function 基準を設定する($複数カート)
    {
        $抽出対象 = $複数カート;

        $複数カート = $this->ユーザidが一致するカートのみ抽出する($抽出対象);
        if (empty($複数カート)) {
            $this->仕様チェックしないか？ = true;
            return;
        }
        $複数作成日時 = $this->作成日時のみ抽出する($複数カート);
        $最新の作成日時 = $this->最新の作成日時を抽出する($複数作成日時);

        $this->最新日時 = $最新の作成日時;
    }

    private function ユーザidが一致するカートのみ抽出する(array $複数カート): array
    {
        $_複数カート = ディープコピー::実行($複数カート);

        $ユーザ別カート = array_filter($_複数カート, function ($カート) {
            return $カート->ユーザid === $this->ユーザid->値;
        });
        return ディープコピー::実行($ユーザ別カート);
    }

    private function 作成日時のみ抽出する(array $複数カート): array
    {
        $_複数カート = ディープコピー::実行($複数カート);

        $作成日時リスト = array_column($_複数カート, 'created_at');
        return ディープコピー::実行($作成日時リスト);
    }

    private function 最新の作成日時を抽出する(array $複数作成日時): string
    {
        $_複数作成日時 = ディープコピー::実行($複数作成日時);

        return max($_複数作成日時);
    }

    public function 満たすか？($カート): bool
    {
        if ($this->仕様チェックしないか？) {
            return false;
        }

        $同じユーザか？ = $this->ユーザid->値 == $カート->ユーザid;
        $最新日時か？ = $this->最新日時 == $カート->created_at;

        return $同じユーザか？ and $最新日時か？;
    }
}
