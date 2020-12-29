@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品詳細</div>

                @foreach($複数画像 as $画像)
                    <div style="width: 18rem; float:left; margin: 16px;">
                        <img src="{{ Storage::url($画像->ファイルパス()) }}" style="width:100%;"/>
                    </div>
                @endforeach

                <form action="{{ url("/item/edit/".$商品->id() )}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $商品->id() }}"><br>

                    ID:{{ $商品->id() }}<br>
                    名前：<input type="text" name="名前" value="{{ $商品->名前() }}"><br>
                    レンタル料金：<input type="text" name="レンタル料金" value="{{ $商品->レンタル料金() }}"><br>
                    カテゴリ:<select name="カテゴリ">
                        <option value = "" selected>選択なし</option>
                        @foreach($複数カテゴリ as $カテゴリ)
                            @if($カテゴリ->大カテゴリ == true)
                                <option value = "">{{ $カテゴリ->名前 }}</option>
                            @elseif(!empty($商品->大カテゴリid()) && !empty($商品->小カテゴリid()) && $商品->大カテゴリid() == $カテゴリ->大カテゴリid && $商品->小カテゴリid() == $カテゴリ->小カテゴリid)
                                <option value = '{"大カテゴリid":{{ $カテゴリ->大カテゴリid }},"小カテゴリid":{{ $カテゴリ->小カテゴリid }}}' selected>{{ $カテゴリ->名前 }}</option>
                            @else
                                <option value = '{"大カテゴリid":{{ $カテゴリ->大カテゴリid }},"小カテゴリid":{{ $カテゴリ->小カテゴリid }}}'>{{ $カテゴリ->名前 }}</option>
                            @endif
                        @endforeach
                    </select><br>
                    <div><input type="submit" value="編集"></div>
                </form>

                @if(!auth()->guest())
                    <form action="{{ url("/cart/add") }}" method="POST">
                        {{ csrf_field() }}
                        <input
                                type="hidden"
                                name="商品id"
                                value="{{ $商品->id() }}"/>
                        <select name="数量">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button
                                type="submit"
                                class="btn btn-primary">カートに入れる
                        </button>
                    </form>
                @endguest

            </div>
        </div>
    </div>
</div>
@endsection
