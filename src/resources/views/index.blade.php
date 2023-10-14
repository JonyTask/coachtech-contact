@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" />
@endsection

@section('content')
<h1>Contact</h1>
<div class="contact-area">
    <form>
        <div class="form-area">
            <table>
                <tr>
                    <th>お名前<span>※</span></th>
                    <td id="name">
                        <input type="text" name="family-name">
                        <input type="text" name="first-name">
                    </td>
                </tr>
                <tr>
                    <th>性別<span>※</span></th>
                    <td id="gender">
                        <div class="radio-item">
                            <input type="radio" name="gender" value="1">
                            <label>男性</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" name="gender" value="2">
                            <label>女性</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" name="gender" value="3">
                            <label>その他</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス<span>※</span></th>
                    <td id="email">
                        <input type="email" name="email">
                    </td>
                </tr>
                <tr>
                    <th>電話番号<span>※</span></th>
                    <td id="tel">
                        <input type="number" name="first-three">
                        <input type="number" name="second-three">
                        <input type="number" name="third-three">
                    </td>
                </tr>
                <tr>
                    <th>住所<span>※</span></th>
                    <td id="address">
                        <input type="text" name="address">
                    </td>
                </tr>
                <tr>
                    <th>建物名<span>※</span></th>
                    <td id="building">
                        <input type="text" name="building">
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの種類<span>※</span></th>
                    <td id="category">
                        <select name="category_id">
                            <option>選択してください</option>
                            <option value="1">1.商品のお届けについて</option>
                            <option value="2">2.商品の交換について</option>
                            <option value="3">3.商品トラブル</option>
                            <option value="4">4.ショップへのお問い合わせ</option>
                            <option value="5">5.その他</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせ内容<span>※</span></th>
                    <td id="detail">
                        <textarea name="detail"></textarea>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
@endsection