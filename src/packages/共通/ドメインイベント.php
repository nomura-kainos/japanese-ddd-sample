<?php

declare(strict_types=1);

namespace 共通;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;

class ドメインイベント extends Event
{
    use SerializesModels;

    private function イベント履歴の登録()
    {
        $イベント履歴 = new イベント履歴エロクアント();
        $イベント履歴->fill(
            [
                'イベントid' => -1,//キューに入る前のidがないため、採番されない番号を設定する
                '処理ステータス' => '未処理',
            ]
        );
        $イベント履歴->save();
    }

    public function 実行()
    {
        $this->イベント履歴の登録();
        Event::dispatch($this);
    }
}
