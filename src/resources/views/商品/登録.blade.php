@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品登録</div>

                <form action="{{ url("/item/register")}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    名前：<input type="text" name="名前"><br>
                    レンタル料金：<input type="text" name="レンタル料金"><br>
                    カテゴリ:<select name="カテゴリ">
                        <option value = "" selected>選択なし</option>
                        @foreach($複数カテゴリ as $カテゴリ)
                            @if($カテゴリ->大カテゴリか？ == true)
                                <option value = "">{{ $カテゴリ->名前 }}</option>
                            @else
                                <option value = '{"大カテゴリid":{{ $カテゴリ->大カテゴリid }},"小カテゴリid":{{ $カテゴリ->小カテゴリid }}}'>{{ $カテゴリ->名前 }}</option>
                            @endif
                        @endforeach
                    </select><br>
                    商品画像（複数可）：<input type="file" name="複数商品画像[]" accept="image/png, image/jpeg" multiple><br>
                    <div><input type="submit" value="登録"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
