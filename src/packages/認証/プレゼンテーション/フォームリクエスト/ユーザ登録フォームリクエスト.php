<?php

declare(strict_types=1);

namespace 認証\プレゼンテーション\フォームリクエスト;

use Illuminate\Foundation\Http\FormRequest;

class ユーザ登録フォームリクエスト extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:ユーザ'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => '既に使われているメールアドレスです',
            'password.min' => 'パスワードは8文字以上である必要があります',
            'password.confirmed' => 'パスワードの確認が一致しません',
        ];
    }
}
