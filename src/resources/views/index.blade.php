@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" />
@endsection

@section('content')
<h1>Contact</h1>
<div class="contact-area">
    <form action="/confirm" method="post">
        @csrf
        <div class="form-area">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            @endif
            <table cellpadding="10">
                <tr>
                    <th>お名前<span>※</span></th>
                    <td id="name">
                        <div class="name-separate">
                        <input type="text" name="family-name" placeholder="例）山田" value="{{old('family-name')}}">
                        <input type="text" name="first-name" placeholder="例）太郎" value="{{old('first-name')}}">
                        </div>
                        <div class="error-message name_error">
                            <div class="family-name_error">
                                @error('family-name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="first-name_error">
                                @error('first-name')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>性別<span>※</span></th>
                    <td id="gender">
                        <div class="radio-item">
                            <input type="radio" name="gender" value="男性" checked>
                            <label>男性</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" name="gender" value="女性">
                            <label>女性</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" name="gender" value="その他">
                            <label>その他</label>
                        </div></br>
                        <div class="error-message">
                            @error('gender')
                            {{$message}}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス<span>※</span></th>
                    <td id="email">
                        <input type="email" name="email" placeholder="test@example.com" value="{{old('email')}}">
                        <div class="error-message">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>電話番号<span>※</span></th>
                    <td id="tel">
                        <div id="tel-align">
                        <input  name="first-three" value="{{old('first-three')}}">
                        <span>-</span>
                        <input  name="second-three" value="{{old('second-three')}}">
                        <span>-</span>
                        <input  name="third-three" value="{{old('third-three')}}">
                        </div>
                    <div class="error-message">
                        @error('first-three')
                        {{$message}}
                        @enderror
                        @error('second-three')
                        {{$message}}
                        @enderror
                        @error('third-three')
                        {{$message}}
                        @enderror
                    </div>
                    </td>
                </tr>
                <tr>
                    <th>住所<span>※</span></th>
                    <td id="address">
                        <input type="text" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}">
                        <div class="error-message">
                            @error('address')
                            {{$message}}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>建物名<span>※</span></th>
                    <td id="building">
                        <input type="text" name="building" placeholder="例）千駄ヶ谷マンション101" value="{{old('building')}}">
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの種類<span>※</span></th>
                    <td id="category">
                        <select name="category_id" value="{{old('category_id')}}">
                            <option selected disabled>選択してください</option>
                            <option value="商品のお届けについて">1.商品のお届けについて</option>
                            <option value="商品の交換について">2.商品の交換について</option>
                            <option value="商品トラブル">3.商品トラブル</option>
                            <option value="ショップへのお問い合わせ">4.ショップへのお問い合わせ</option>
                            <option value="その他">5.その他</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th id="align-up">お問い合わせ内容<span>※</span></th>
                    <td id="detail">
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" value="{{old('detail')}}"></textarea>
                        <div class="error-message">
                            @error('detail')
                                {{$message}}
                            @enderror
                        </div>
                    </td>
                </tr>
            </table>
            <div class="submit-form">
                <button class="confirm_button" type="submit">確認画面</button>
            </div>
        </div>
    </form>
</div>
@endsection