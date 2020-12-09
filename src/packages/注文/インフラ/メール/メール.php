<?php

declare(strict_types=1);

namespace 注文\インフラ\メール;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use 注文\ドメイン\モデル\メールインターフェース;

class メール implements ShouldQueue, メールインターフェース
{
    public function handle()
    {
        $this->送信する();
    }

    public function 送信する()
    {
        // Mail::sendで送信できる.
        // 第1引数に、テンプレートファイルのパスを指定し、
        // 第2引数に、テンプレートファイルで使うデータを指定する
        Mail::send('注文.メール', [
            'メッセージ' => 'こんにちは！'

        ], function ($メッセージ) {

            // 第3引数にはコールバック関数を指定し、
            // その中で、送信先やタイトルの指定を行う.
            $メッセージ
                ->to('user1@sample.com')
                ->subject('【宅配レンタル】ご注文ありがとうございます（自動送信メール）');
        });
    }
}
