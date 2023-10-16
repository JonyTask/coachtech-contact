@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/confirm.css')}}">
@endsection

@section('content')
    <h1>Confirm</h1>
    <div class="confirm-table">
        <form action="/thanks" method="post">
            @csrf
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
                        <input class="read-input" name="tell" type="tel" value="{{$tell}}" readonly>
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
                        <textarea class="read-input" name="detail" readonly>{{$contact['detail']}}</textarea>
                    </td>
                </tr>
            </table>
            <div class="buttons-area">
                <button class="toThanks" type="submit">送信</button>
                <a class="goBack"href="/">修正</a>
            </div>
        </form>
    </div>
@endsection