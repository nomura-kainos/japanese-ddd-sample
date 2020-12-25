@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">カテゴリ一覧</div>

                <table>
                    @foreach ($複数カテゴリ->取得() as $商品カテゴリ)
                    <tr>
                        <td><a href="/category_detail/{{ $商品カテゴリ->id() }}"> {{ $商品カテゴリ->名前() }} </a></td>
                    </tr>
                    @endforeach
                </table>
                <br>
                <a href="/category/register/"> 登録 </a>
            </div>
        </div>
    </div>
</div>
@endsection
