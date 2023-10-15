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
                    <input class="read-input" name="fullname" type="text" value="{{$fullname}}" readonly>
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <input class="read-input" name="gender" value="{{$contact['gender']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <input class="read-input" name="email" type="email" value="{{$contact['email']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    <input class="read-input" name="tel" type="tel" value="{{$tell}}" readonly>
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    <input class="read-input" name="address" type="text" value="{{$contact['address']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>
                    <input class="read-input" name="building" type="text" value="{{$contact['building']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>
                    <input class="read-input" name="category_id" type="text" value="{{$contact['category_id']}}" readonly>
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    <input class="read-input" name="detail" type="text" value="{{$contact['detail']}}" readonly>
                </td>
            </tr>
        </table>
    </div>
@endsection