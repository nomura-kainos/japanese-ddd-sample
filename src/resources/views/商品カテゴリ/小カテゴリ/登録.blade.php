@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">小カテゴリ登録</div>

                <form action="{{ url("/category/small/register")}}" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="大カテゴリid" value="{{ $大カテゴリid }}">
                    名前：<input type="text" name="名前"><br>
                    <div><input type="submit" value="登録"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
