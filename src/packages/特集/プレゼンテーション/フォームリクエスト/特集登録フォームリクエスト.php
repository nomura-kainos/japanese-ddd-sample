<?php

declare(strict_types=1);

namespace 特集\プレゼンテーション\フォームリクエスト;

use Illuminate\Foundation\Http\FormRequest;

class 特集登録フォームリクエスト extends FormRequest
{
    public function rules()
    {
        return [
            'タイトル' => ['required', 'string'],
            '本文' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'タイトル.required' => '名前は必須です。',
            '本文.required' => 'レンタル料金は必須です。',
        ];
    }
}
