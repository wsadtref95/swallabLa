@extends('layouts.app')

@section('content')
    {{-- ================================================ --}}
    <style>
        .card-link {
            text-decoration: none;
            color: inherit;
        }

        .card-link .card {
            transition: transform 0.3s ease;
        }

        .card-link .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>

    <div class="container-md mt-5">
        <div class="row">
            <!-- 側邊欄 -->
            <div class="col-2 custom-ul sticky-top" style="top: 20px;">
                <div class="mb-2 mt-3" onclick="allfood()">
                    <a onclick="filterItems(0)"><img src="{{ asset('images/other/hot_2.png') }}" style="width: 150px;"
                            alt=""></a>
                    <li id="allfood">全部餐廳</li>
                </div>
                <div class="" onclick="limit()">
                    <a onclick="filterItems(1)"><img src="{{ asset('images/other/hotpot.png') }}"
                            style="width: 100px;" alt=""></a>
                    <li id="limit">火鍋</li>
                </div>
                <div class="mt-2" onclick="ball()">
                    <a onclick="filterItems(2)"><img src="{{ asset('images/other/barbecue.png') }}" style="width: 100px;"
                            alt=""></a>
                    <li id="ball">燒肉</li>
                </div>
                <div class="mb-2 mt-3" onclick="veg()">
                    <a onclick="filterItems(3)"><img src="{{ asset('images/other/ramen.png') }}" style="width: 100px;"
                            alt=""></a>
                    <li id="veg">拉麵</li>
                </div>

                <div class="mt-2" onclick="dum()">
                    <a onclick="filterItems(4)"><img src="{{ asset('images/other/izakaya.png') }}"
                            style="width: 100px; border: none; background-color: transparent;" alt=""></a>
                    <li id="dum">居酒屋</li>
                </div>
                <div class="mt-2" onclick="ball()">
                    <a onclick="filterItems(5)"><img src="{{ asset('images/other/dessert.png') }}" style="width: 100px;"
                            alt=""></a>
                    <li id="ball">甜點</li>
                </div>

            </div>

            <!-- 餐點 -->
            <div class="col-9 mb-5 ml-5">
                <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;" id="titleName">全部餐廳</div>
                <hr>
                <div class="row" id="food-list">

                    @foreach ($restaurants as $restaurant)
                        <div class="col-md-4 restaurant-item" data-class="{{ $restaurant->class }}">
                            <a href="{{ route('restaurant.detail', $restaurant->id) }}" class="card-link">
                                <div class="card mb-4" style="overflow: hidden;">
                                    {{-- 確認照片的路徑 --}}
                                    @if ($restaurant->photo)
                                        <img style="width: 260px; height:150px; object-fit: cover;"
                                            src="{{ asset('storage/' . $restaurant->photo) }}" class="card-img-top"
                                            alt="{{ $restaurant->name }}">
                                    @else
                                        <img src="{{ asset('images/other/RR.jpg') }}" class="card-img-top"
                                            alt="{{ $restaurant->name }}">
                                    @endif
                                    <div class="card-body">
                                        <h1 class="card-title">{{ $restaurant->name }}</h1>

                                        <p class="card-text"><strong>平均消費:</strong> ${{ $restaurant->average_price }}</p>
                                        <p class="card-text"><strong>類型:</strong>
                                            @php
                                                $classNames = [
                                                    1 => '火鍋',
                                                    2 => '燒肉',
                                                    3 => '拉麵',
                                                    4 => '居酒屋',
                                                    5 => '甜點',
                                                    6 => '日式餐廳',
                                                    7 => '義式餐廳',
                                                    8 => '韓式餐廳',
                                                    9 => '其他',
                                                ];
                                            @endphp
                                            {{ $classNames[$restaurant->class] }}
                                        </p>
                                        <p class="card-text"><strong>電話:</strong> {{ $restaurant->phone }}</p>
                                        <p class="card-text"><strong>地址:</strong>{{ $restaurant->address }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- TOP按鈕 -->
            <img src="./../images/other/top.png" alt="" class="top" id="top">

            <script>
                function filterItems(classId) {
                    // 先隱藏所有餐點
                    var allItems = document.querySelectorAll('.restaurant-item');
                    allItems.forEach(function(item) {
                        if (classId === 0) {
                            // 如果 classId 是 0，顯示所有餐點
                            item.style.display = 'block';
                        } else if (item.getAttribute('data-class') == classId) {
                            // 否則只顯示符合條件的餐點
                            item.style.display = 'block';
                        } else {
                            // 隱藏不符合條件的餐點
                            item.style.display = 'none';
                        }
                    });
                }
                //點擊側邊欄圖片，更換餐點標題
                //全部餐點
                function allfood() {
                    let allfood = document.getElementById("allfood")
                    let titleName = document.getElementById("titleName")
                    titleName.innerText = ''
                    titleName.innerText = allfood.innerText
                }


                //限時優惠
                function limit() {
                    let limit = document.getElementById("limit")
                    let titleName = document.getElementById("titleName")
                    titleName.innerText = ''
                    titleName.innerText = limit.innerText
                }


                function veg() {
                    let veg = document.getElementById("veg")
                    let titleName = document.getElementById("titleName")
                    titleName.innerText = ''
                    titleName.innerText = veg.innerText
                }



                function dum() {
                    let dum = document.getElementById("dum")
                    let titleName = document.getElementById("titleName")
                    titleName.innerText = ''
                    titleName.innerText = dum.innerText
                }



                function ball() {
                    let ball = document.getElementById("ball")
                    let titleName = document.getElementById("titleName")
                    titleName.innerText = ''
                    titleName.innerText = ball.innerText
                }


                //主食
                function meal() {
                    let meal = document.getElementById("meal")
                    let titleName = document.getElementById("titleName")
                    titleName.innerText = ''
                    titleName.innerText = meal.innerText
                }
            </script>
        @endsection
