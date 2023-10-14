@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/confirm.css')}}">
@endsection

@section('content')
    <h1>Confirm</h1>
    <div class="confirm-table">
        <table>
            <tr>
                <th>お名前</th>
                <td>
                    <input name="fullname" type="text" value="{{$contact['family-name'].$contact['first-name']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <input name="gender" readonly>
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <input name="email" type="email" value="{{$contact['email]}}" readonly>
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    <input name="tel" type="tel" value="{{$contact['first-three']}}.{{$contact['second-three']}}.{{$contact['third-three']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    <input name="address" type="text" value="{{$contact['address']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>
                    <input name="building" type="text" value="{{$contact['building']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>
                    <input name="category_id" type="text" value="" readonly>
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    <input name="detail" type="text" value="{{$contact['detail']}}" readonly>
                </td>
            </tr>
        </table>
    </div>
@endsection