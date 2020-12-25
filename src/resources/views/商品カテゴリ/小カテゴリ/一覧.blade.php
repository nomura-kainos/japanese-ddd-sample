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
                            <td><a href="/category_detail/small/{{ $小カテゴリ->id() }}"> {{ $小カテゴリ->名前() }} </a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
