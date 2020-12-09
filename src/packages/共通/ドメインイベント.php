<?php

declare(strict_types=1);

namespace 共通;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;

class ドメインイベント extends Event
{
    use SerializesModels;

    public function 実行()
    {
        Event::dispatch($this);
    }
}
