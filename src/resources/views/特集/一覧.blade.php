@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row justify-content-center'>
        <div class='col-md-8'>
            <div class='card'>
                <div class='card-header'>特集一覧</div>

                <table>
                    @foreach ($複数特集->取得() as $特集)
                    <tr>
                        <td><a href='/report_detail/{{ $特集->id() }}'> {{ $特集->タイトル() }} </a></td>
                    </tr>
                    @endforeach
                </table>
                <br>
                <a href='/report/register/'> 登録 </a>
            </div>
        </div>
    </div>
</div>
@endsection
