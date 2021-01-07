<?php

declare(strict_types=1);

namespace 共通\イベント履歴;

use ReflectionClass;

class イベント履歴リポジトリ
{
    private $クラス名;

    public function __construct(private int $ジョブid, object $クラス)
    {
        $this->クラス名 = $this->クラス名の取得($クラス);
    }

    private function クラス名の取得(object $クラス): string
    {
        return (new ReflectionClass($クラス))->getShortName();
    }

    public function 登録する(string $処理ステータス)
    {
        $イベント履歴 = new イベント履歴エロクアント();
        $イベント履歴->fill(
            [
                'イベントid' => $this->ジョブid,
                'イベント名' => $this->クラス名,
                '処理ステータス' => $処理ステータス,
            ]
        );
        $イベント履歴->save();
    }
}
