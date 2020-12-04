@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">特集詳細</div>

                <form action="{{ url("/report/edit/".$特集->id() )}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $特集->id() }}"><br>

                    ID:{{ $特集->id() }}<br>
                    タイトル：<input type="text" name="タイトル" value="{{ $特集->タイトル() }}"><br>
                    本文：{!! $特集->本文() !!}
                    <div><input type="submit" value="編集"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
