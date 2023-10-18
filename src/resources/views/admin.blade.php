@extends('layouts.auth')


@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
@endsection

@section('header')
    @if(Auth::check())
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endif
@endsection

@section('content')
<h1>Admin</h1>
<div class="container">
    <form action="/admin/search" method="get">
    @csrf
        <div class="search-form">
            <div class="name-email">
                <input name="name_email_search" type="text" class="name_email_search" placeholder="名前やメールアドレスを入力してください">
                <input type="submit" value="🔍" class="search-button">
            </div>
            <div class="gender">
                <select name="gender_search" class="gender_search">
                    <option disabled>性別</option>
                    <option value="0">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>
            <div class="category_id">
                <select name="category_search" class="category_search">
                    <option disabled selected>選択してください</option>
                    <option value="1">商品のお届けについて</option>
                    <option value="2">商品の交換について</option>
                    <option value="3">商品トラブル</option>
                    <option value="4">ショップへのお問い合わせ</option>
                    <option value="5">その他</option>
                </select>
            </div>
            <div class="date">
                <input type="date" name="date_search" class="date_search">
            </div>
        </div>
    </form>
    <div class="contacts-table">
        <div class="above-table">
            <div class="export">
                エクスポート
            </div>
            <div class="pagination-link">
                {{$contacts->links()}}
            </div>
        </div>
        <table cellspacing="0">
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            @foreach($contacts as $contact)
                <tr>
                    <td class="fullname_get">{{$contact['fullname']}}</td>
                    <td class="gender_get">{{$contact['gender']}}</td>
                    <td class="email_get">{{$contact['email']}}</td>
                    <td class="category_get">{{$contact->category->getCategory()}}</td>
                    <td>
                        <div class="show-detail">
                            詳細
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="reset">
            <a href="/admin">リセット</a>
        </div>
    </div>
</div>
@endsection