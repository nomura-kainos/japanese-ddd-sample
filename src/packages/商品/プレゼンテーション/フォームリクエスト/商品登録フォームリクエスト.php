<?php

declare(strict_types=1);

namespace 商品\プレゼンテーション\フォームリクエスト;

use Illuminate\Foundation\Http\FormRequest;

class 商品登録フォームリクエスト extends FormRequest
{
    public function rules()
    {
        return [
            '名前' => ['required', 'string'],
            'レンタル料金' => ['required', 'string'],
            '複数商品画像.*' => ['required', 'file', 'image', 'mimes:png,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            '名前.required' => '名前は必須です。',
            'レンタル料金.required' => 'レンタル料金は必須です。',
        ];
    }
}
