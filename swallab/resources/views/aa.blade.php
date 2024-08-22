@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/detailxi.css') }}">
@push('styles')
    @include('layouts.map')
@endpush


@push('scripts')
    @include('layouts.map')
    <script>
        const assetBaseUrl = "{{ asset('storage/photos') }}";
        const assetBaseUrlShowCart = "{{ asset('storage/photos') }}";

        
@endpush


@section('title', '餐廳內頁')


@section('content')
    <style>

    </style>
    <div class="container">
        <div class="row header-content">
            <div class="col-md-8 header-img">
                <div class="myimg">
                    <div id="googlemap"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div id="sidebar">
                    <button id="currentLocationButton" onclick="goToCurrentLocation()">顯示我的位置</button>
                    <h3>附近餐廳</h3>
                    <ul id="places"></ul>
                </div>
            </div>
    
   


    @endsection
