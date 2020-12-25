@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">カテゴリ登録</div>

                <form action="{{ url("/category/register")}}" method="POST">
                    {{ csrf_field() }}

                    名前：<input type="text" name="名前"><br>
                    <div><input type="submit" value="登録"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
