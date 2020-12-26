@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">小カテゴリ一覧</div>

                <table>
                    @foreach ($複数小カテゴリ->取得() as $小カテゴリ)
                        <tr>
                            <td>{{ $小カテゴリ->id() }}</td>
                            <td>{{ $小カテゴリ->名前() }}</td>
                        </tr>
                    @endforeach
                </table>
                <br>
                <a href="/category/small/register/{{ $大カテゴリid }}">登録</a></td>
            </div>
        </div>
    </div>
</div>
@endsection
