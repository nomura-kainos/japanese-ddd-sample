@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">大カテゴリ一覧</div>

                <table>
                    @foreach ($複数大カテゴリ->取得() as $大カテゴリ)
                    <tr>
                        <td><a href="/category/small/{{ $大カテゴリ->id() }}"> {{ $大カテゴリ->名前() }} </a></td>
                    </tr>
                    @endforeach
                </table>
                <br>
                <a href="/category/big/register/"> 登録 </a>
            </div>
        </div>
    </div>
</div>
@endsection
