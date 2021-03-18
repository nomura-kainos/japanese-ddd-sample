@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品スマホ一覧</div>

                <table>
                    @foreach ($複数商品->取得() as $商品)
                    <tr>
                        <td><a href="/item_detail/{{ $商品->id() }}"> {{ $商品->名前() }} </a></td>
                        <td>{{ $商品->レンタル料金() }}</td>
                        <td>{{ $商品->カテゴリ名() }}</td>
                    </tr>
                    @endforeach
                </table>
                <br>
                <a href="/item/register/"> 登録 </a>
            </div>
        </div>
    </div>
</div>
@endsection
