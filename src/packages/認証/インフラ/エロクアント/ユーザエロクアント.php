<?php

namespace 認証\インフラ\エロクアント;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ユーザエロクアント extends Authenticatable
{
    // パスワードリセットのメール送信ができるように設定
    use Notifiable;

    // テーブル名を指定する
    protected $table = 'ユーザ';

    // フィールドの属性キャストを指定(未指定の場合stringになる)
    protected $casts = [
        'id' => 'int',
        '名前' => 'string',
        'email' => 'string',
        'password' => 'string',
    ];

    // 代入可能なフィールドを指定する
    protected $fillable = [
        '名前', 'email', 'password',
    ];
}
