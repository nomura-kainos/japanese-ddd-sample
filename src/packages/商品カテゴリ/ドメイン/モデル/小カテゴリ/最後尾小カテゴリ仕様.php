<?php

declare(strict_types=1);

namespace 商品カテゴリ\ドメイン\モデル\小カテゴリ;

use 共通\仕様\選択;
use 共通\配列コピー\ディープコピー;
use 商品カテゴリ\ドメイン\モデル\商品カテゴリID;

class 最後尾小カテゴリ仕様 implements 選択
{
    private $最後尾小カテゴリid;
    private $仕様チェックしないか？ = false;

    public function __construct(private 商品カテゴリID $大カテゴリid)
    {
    }

    public function 基準を設定する($複数カテゴリ)
    {
        $抽出対象 = $複数カテゴリ;

        $複数小カテゴリ = $this->大カテゴリidが一致する小カテゴリのみ抽出する($抽出対象);
        if (empty($複数小カテゴリ)) {
            $this->仕様チェックしないか？ = true;
            return;
        }
        $複数小カテゴリid = $this->小カテゴリidのみ抽出する($複数小カテゴリ);
        $最後尾小カテゴリid = $this->最後尾の小カテゴリidを抽出する($複数小カテゴリid);

        $this->最後尾小カテゴリid = $最後尾小カテゴリid;
    }

    private function 大カテゴリidが一致する小カテゴリのみ抽出する(array $複数小カテゴリ): array
    {
        $大カテゴリ別の小カテゴリ = array_filter($複数小カテゴリ, function ($小カテゴリ) {
            return $小カテゴリ->大カテゴリid === $this->大カテゴリid->値;
        });
        return ディープコピー::実行($大カテゴリ別の小カテゴリ);
    }

    private function 小カテゴリidのみ抽出する(array $複数小カテゴリ): array
    {
        $小カテゴリidリスト = array_column($複数小カテゴリ, '小カテゴリid');
        return ディープコピー::実行($小カテゴリidリスト);
    }

    private function 最後尾の小カテゴリidを抽出する(array $小カテゴリidリスト): int
    {
        return max($小カテゴリidリスト);
    }

    public function 満たすか？($小カテゴリ): bool
    {
        if ($this->仕様チェックしないか？) {
            return false;
        }

        $同じ大カテゴリか？ = $this->大カテゴリid->値 === $小カテゴリ->大カテゴリid;
        $最後尾の小カテゴリidか？ = $this->最後尾小カテゴリid === $小カテゴリ->小カテゴリid;

        return $同じ大カテゴリか？ and $最後尾の小カテゴリidか？;
    }
}
