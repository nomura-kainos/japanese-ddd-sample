<?php

namespace 認証\インフラ\エロクアント;

use Illuminate\Database\Eloquent\Model;

class SNSアカウントエロクアント extends Model
{
    // テーブル名を指定する
    protected $table = 'SNSアカウント';

    // 複合キーを指定する(複合キーを有効にするために、incrementを無効にする)
    protected $primaryKey = [ 'SNS名', 'SNSアカウントid' ];
    public $incrementing = false;

    // フィールドの属性キャストを指定(未指定の場合stringになる)
    protected $casts = [
        'SNS名' => 'string',
        'SNSアカウントid' => 'string',
        'ユーザid' => 'int',
    ];

    // 代入可能なフィールドを指定する
    protected $fillable = [
        'SNS名', 'SNSアカウントid', 'ユーザid'
    ];

    public function ユーザエロクアント()
    {
        return $this->belongsTo(ユーザエロクアント::class, 'ユーザid');
    }
}
