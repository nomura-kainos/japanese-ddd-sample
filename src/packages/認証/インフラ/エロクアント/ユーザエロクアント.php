<?php

namespace 認証\インフラ\エロクアント;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ユーザエロクアント extends Authenticatable
{
    // テーブル名を指定する
    protected $table = 'ユーザ';

    // フィールドの属性キャストを指定(未指定の場合stringになる)
    protected $casts = [
        'id' => 'int',
        '名前' => 'string',
        'メール' => 'string',
        'パスワード' => 'string',
    ];

    // 代入可能なフィールドを指定する
    protected $fillable = [
        '名前', 'メール', 'パスワード',
    ];

    function SNSアカウントエロクアント()
    {
        // SNSアカウントエロクアントと紐付ける 1対多の関係
        return $this->hasMany(SNSアカウントエロクアント::class, 'ユーザid');
    }
}
