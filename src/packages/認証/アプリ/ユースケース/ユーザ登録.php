<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use 認証\インフラ\エロクアント\ユーザエロクアント;

class ユーザ登録
{
    use RegistersUsers;

    protected $redirectTo = '/item';

    protected function create(array $data)
    {
        return ユーザエロクアント::create([
            '名前' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function 実行(Request $リクエスト)
    {
        return $this->register($リクエスト);
    }
}
