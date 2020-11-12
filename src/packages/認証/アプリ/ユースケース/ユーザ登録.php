<?php

declare(strict_types=1);

namespace 認証\アプリ\ユースケース;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use 認証\インフラ\エロクアント\ユーザエロクアント;

class ユーザ登録
{
    public function register(Request $request)
    {
        return ユーザエロクアント::create([
            '名前' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'),),
        ]);
    }

    public function 実行(Request $リクエスト)
    {
        $登録済みユーザ = $this->register($リクエスト);

        $this->ユーザのログイン情報削除();
        Auth::login($登録済みユーザ, true);
    }

    private function ユーザのログイン情報削除() {
        Auth::logout();
    }
}
