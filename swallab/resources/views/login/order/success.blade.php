@extends('layouts.app')

@section('title', '訂單提交成功')

@section('content')
    <div class="container mt-5">
        <h2>您的訂單已成功提交！</h2>
        <p>感謝您的購買，請耐心等待取餐時間。</p>
        <a href="{{ url('/login/profile/order') }}" class="btn btn-primary">查看我的訂單</a>
    </div>
@endsection
