<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル;

use stdClass;
use 商品\インフラ\レスポンスデータ\商品カテゴリレスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品カテゴリコレクションレスポンスデータ;

class 登録フォームビューモデル
{
    private array $カテゴリコレクション;

    public function __construct(
        商品カテゴリコレクションレスポンスデータ $カテゴリコレクション
    ) {
        $this->カテゴリコレクション = $this->カテゴリ表示設定($カテゴリコレクション);
    }

    private function カテゴリ表示設定(商品カテゴリコレクションレスポンスデータ $カテゴリコレクション): array
    {
        $コレクション = $カテゴリコレクション->取得()->toArray();
        $コレクション = $this->階層別の表示追加($コレクション);
        $大小カテゴリ = $this->大小カテゴリの階層をあわせる($コレクション);
        return $大小カテゴリ;
    }

    private function 階層別の表示追加(array $カテゴリコレクション): array
    {
        $コレクション = array_map(function (商品カテゴリレスポンスデータ $レスポンス) {
            $カテゴリ = new stdClass();
            $カテゴリ->大カテゴリid = $レスポンス->大カテゴリid();
            $カテゴリ->大カテゴリ名 = '■' . $レスポンス->大カテゴリ名();
            $カテゴリ->小カテゴリid = $レスポンス->小カテゴリid();
            $カテゴリ->小カテゴリ名 = '－　' . $レスポンス->小カテゴリ名();
            return $カテゴリ;
        },
            $カテゴリコレクション);

        return $コレクション ;
    }

    private function 大小カテゴリの階層をあわせる(array $カテゴリコレクション): array
    {
        $大小カテゴリ = [];
        $大カテゴリ名 = null;

        foreach ($カテゴリコレクション as $小カテゴリ) {
            if ($大カテゴリ名 !== $小カテゴリ->大カテゴリ名) {
                $大小カテゴリ[] = $this->大カテゴリの追加($小カテゴリ);
                $大カテゴリ名 = $小カテゴリ->大カテゴリ名;
            }
            $大小カテゴリ[] = $this->小カテゴリの追加($小カテゴリ);
        }

        return $大小カテゴリ ;
    }

    private function 大カテゴリの追加($小カテゴリ): stdClass
    {
        $カテゴリ = new stdClass();
        $カテゴリ->大カテゴリ = true;
        $カテゴリ->名前 = $小カテゴリ->大カテゴリ名;
        return $カテゴリ;
    }

    private function 小カテゴリの追加($小カテゴリ): stdClass
    {
        $カテゴリ = new stdClass();
        $カテゴリ->大カテゴリ = false;
        $カテゴリ->名前 = $小カテゴリ->小カテゴリ名;
        $カテゴリ->大カテゴリid = $小カテゴリ->大カテゴリid;
        $カテゴリ->小カテゴリid = $小カテゴリ->小カテゴリid;
        return $カテゴリ;
    }

    public function カテゴリコレクション(): array
    {
        return $this->カテゴリコレクション;
    }
}
