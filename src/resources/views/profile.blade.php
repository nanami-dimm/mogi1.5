@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css')}}">
@endsection('css')

@section('link')
<div class="toppage-header">
    <div class="toppage-header-search">
        <form class="search-form" action="/search" method="get">
            @csrf
            <input class="search-form__keyword-input" type="text" name="keyword" placeholder="何をお探しですか？">
        </form>
    </div>
    <div class="toppage-header-nav">

        <form action="/logout" method="post">
        @csrf
            <input class="header_link" type="submit" value="ログアウト">
        </form>

        <a class="mypage__link" href="/?tab=mypage">マイページ</a>
        
        <a class="sell__link" href="/sell">出品</a>
    </div>
</div>
@endsection('link')

@section('content')
    <div class="user-info">
        <div class="user-profile">
           
            <div class="user-image">
                <img src="{{ asset($users->profile_image) }}"  class="img-content">
            </div>
            <div class="user-name">
                <p>{{ $users->name }}</p>
            </div>
            <div class="profile_edit">
                <a class="edit-form__btn btn" href="mypage/profile">プロフィールを編集</a>
            </div>
        </div>
        <div class="toppage-list">
            <div class="toppage-list-sell">
                <a class="sell-item" href="">出品した商品</a>
            </div>
            <div class="toppage-list-buy">
                <a class="buy-item" href="">購入した商品</a>
            </div>
        </div>
       ->nullable()
        <div class="product-data">
            @foreach ($exhibitions as $exhibition)
        <div class="product-sell-content">
            <a href="/item/{{ $exhibition->id}}" class="product-link"></a>
            <img src="{{ asset($exhibition ->product_image) }}" alt="商品画像" class="product-image" width="200" height="190">
            <div class="product-detail">
                <p>{{ $exhibition ->product_name}}</p>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    @endsection('content')