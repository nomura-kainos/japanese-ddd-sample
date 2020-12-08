<?php

declare(strict_types=1);

namespace 共通;

use Illuminate\Support\Facades\Event;

class ドメインイベント extends Event
{
    public function 実行()
    {
        Event::dispatch($this);
    }
}
