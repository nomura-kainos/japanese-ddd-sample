<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\ビューモデル;

use Illuminate\Support\Collection;
use stdClass;
use 共通\配列コピー\ディープコピー;
use 商品\インフラ\レスポンスデータ\商品カテゴリレスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品画像コレクションレスポンスデータ;
use 商品\インフラ\レスポンスデータ\商品カテゴリコレクションレスポンスデータ;

class 詳細ビューモデル
{
    private array $カテゴリコレクション;

    public function __construct(
        private int $id,
        private string $名前,
        private int $レンタル料金,
        private int $大カテゴリid,
        private int $小カテゴリid,
        商品カテゴリコレクションレスポンスデータ $カテゴリコレクション,
        private 商品画像コレクションレスポンスデータ $画像コレクション
    ) {
        $this->カテゴリコレクション = $this->カテゴリ表示設定($カテゴリコレクション);
    }

    private function カテゴリ表示設定(商品カテゴリコレクションレスポンスデータ $カテゴリコレクション): array
    {
        $コレクション = $カテゴリコレクション->取得();

        $コレクション = $this->階層別の表示追加($コレクション);
        $大小カテゴリ = $this->大小カテゴリの階層をあわせる($コレクション);

        $表示設定済みカテゴリ = $大小カテゴリ;
        return ディープコピー::実行($表示設定済みカテゴリ);
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

    private function 大カテゴリの追加(stdClass $小カテゴリ): stdClass
    {
        $カテゴリ = new stdClass();
        $カテゴリ->大カテゴリか？ = true;
        $カテゴリ->名前 = $小カテゴリ->大カテゴリ名;
        return $カテゴリ;
    }

    private function 小カテゴリの追加(stdClass $小カテゴリ): stdClass
    {
        $カテゴリ = new stdClass();
        $カテゴリ->大カテゴリか？ = false;
        $カテゴリ->名前 = $小カテゴリ->小カテゴリ名;
        $カテゴリ->大カテゴリid = $小カテゴリ->大カテゴリid;
        $カテゴリ->小カテゴリid = $小カテゴリ->小カテゴリid;
        return $カテゴリ;
    }

    public function id(): string
    {
        return (string)$this->id;
    }

    public function 名前(): string
    {
        return $this->名前;
    }

    public function レンタル料金(): string
    {
        return number_format($this->レンタル料金);
    }

    public function 大カテゴリid(): string
    {
        return (string)$this->大カテゴリid;
    }

    public function 小カテゴリid(): string
    {
        return (string)$this->小カテゴリid;
    }

    public function カテゴリコレクション(): array
    {
        return ディープコピー::実行($this->カテゴリコレクション);
    }

    public function 画像コレクション(): Collection
    {
        return new Collection($this->画像コレクション->取得());
    }
}
