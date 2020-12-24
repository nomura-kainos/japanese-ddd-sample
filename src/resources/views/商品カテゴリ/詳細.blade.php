@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品カテゴリ詳細</div>

                <form action="{{ url("/category/edit/".$商品カテゴリ->id() )}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $商品カテゴリ->id() }}"><br>

                    ID:{{ $商品カテゴリ->id() }}<br>
                    名前：<input type="text" name="名前" value="{{ $商品カテゴリ->名前() }}"><br>
                    <div><input type="submit" value="編集"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
