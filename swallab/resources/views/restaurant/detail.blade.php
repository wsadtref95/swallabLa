@extends('layouts.app')

@push('styles')
    {{-- @include('layouts.map') --}}
@endpush


@push('scripts')
    {{-- @include('layouts.map') --}}
    <script>
        const assetBaseUrl = "{{ asset('storage/photos') }}";
        const assetBaseUrlShowCart = "{{ asset('storage/photos') }}";
        // 把 Blade 變數轉換為 JSON 格式
        // var restaurants = @json($restaurants);


        // // 使用 filter 篩選出 class 等於 19 的餐點
        // var filteredRestaurants = restaurants.filter(function(restaurant) {
        //     return restaurant.class == 19;
        // });


        // // 使用 map 提取出需要的屬性
        // var meals = filteredRestaurants.map(function(restaurant) {
        //     return {
        //         meals_name: restaurant.meals_name,
        //         photo: restaurant.photo,
        //         price: restaurant.price
        //     };
        // });


        // // 在控制台中顯示篩選結果
        // console.log(meals);


        // // 或者你可以遍歷並顯示每個餐點
        // meals.forEach(function(meal) {
        //     console.log('Name:', meal.meals_name);
        //     console.log('Photo:', meal.photo);
        //     console.log('Price:', meal.price);
        // });







        function showCart() {
            const body = document.body;
            if (!body.classList.contains('modal-open')) {
                const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
                body.style.paddingRight = `${scrollbarWidth}px`;
            }

            const modal = new bootstrap.Modal(document.getElementById('cartModal'));
            modal.show();
        }

        function closeCartModal() {
            const body = document.body;
            body.style.paddingRight = '';

            const modal = bootstrap.Modal.getInstance(document.getElementById('cartModal'));
            modal.hide();
        }

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


        function addToCart(id, mealName, price, photo) {


            const imageUrl = `http://localhost/swallabLa/swallab/storage/app/public/photos/${photo}`;


            console.log(imageUrl);


        }
    </script>
    <script src="{{ asset('/js/cart.js') }}"></script>
@endpush


@section('title', '餐廳內頁')


@section('content')
    <style>
        .cart {
            top: -10px;
            right: -10px;

        }

        .icon-shopping {
            top: 400px;
        }

        button:focus {
            outline: none;
        }
    </style>

   
    <div class="container">
        <div class="row header-content">
            <div class="col-md-8 header-img">
                <div class="myimg">
                    <div id="googlemap"></div>
                </div>
            </div>
            <img style="height: 400px; width: 1100px ; border: none; background-color: transparent;"
                src="{{ asset('images/other/qh.jpg') }}" alt="">
            {{-- <div class="col-md-4">
                <div id="sidebar">
                    <button id="currentLocationButton" onclick="goToCurrentLocation()">顯示我的位置</button>
                    <h3>附近餐廳</h3>
                    <ul id="places"></ul>
                </div>
            </div> --}}
            <div class="icon-shopping icon-circle" onclick="showCart()" data-bs-toggle="modal" data-bs-target="#cartModal">
                <i class="fa-solid fa-cart-shopping" style="position:relative"></i>
            </div>
            <div class="icon-heart">
                <i class="fa-regular fa-heart" id="hearticon"></i>
            </div>
        </div>
    </div>
    <div class="container">

        <!-- 評分model -->
        <div class="modal fade" id="scoreModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scoreLabel">無老鍋-公益店</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>評分:</label>
                                <div>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>留言</label>
                                <input type="text" class="form-control" style="padding: 50px 0;">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">送出</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-md mt-5">
            <div class="row">
                <!-- 側邊欄 -->
                <div class="col-2 custom-ul sticky-top">
                    <div class="mb-2 mt-3" onclick="allfood()">
                        <a onclick="filterItems(0)"><img src="{{ asset('images/other/hot_2.png') }}" style="width: 150px;"
                                alt=""></a>
                        <li id="allfood">全部餐點</li>
                    </div>
                    <div class="" onclick="limit()">
                        <a href="https://www.google.com.tw/"><img src="{{ asset('images/other/limited_time_offer.png') }}"
                                style="width: 100px;" alt=""></a>
                        <li id="limit">限時優惠</li>
                    </div>
                    <div class="mb-2 mt-3" onclick="veg()">
                        <a onclick="filterItems(19)"><img src="{{ asset('images/other/vegetable_6.jpeg') }}"
                                style="width: 100px;" alt=""></a>
                        <li id="veg">青菜</li>
                    </div>


                    <div class="mt-2" onclick="dum()">
                        <a onclick="filterItems(18)"><img src="{{ asset('images/other/dumpling.png') }}"
                                style="width: 100px; border: none; background-color: transparent;" alt=""></a>
                        <li id="dum">餃類</li>
                    </div>
                    <div class="mt-2" onclick="ball()">
                        <a onclick="filterItems(15)"><img src="{{ asset('images/other/porkball_1.jpg') }}"
                                style="width: 100px;" alt=""></a>
                        <li id="ball">丸子</li>
                    </div>
                    <div class="mt-2 mb-5" onclick="meal()">
                        <a onclick="filterItems(17)"><img src="{{ asset('images/other/rice.png') }}"
                                style="width: 80px;" alt=""></a>
                        <li id="meal">主食</li>
                    </div>
                </div>
                <!-- 餐點 -->
                <div class="col-9 mb-5 ml-5">
                    <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;" id="titleName">全部餐點</div>
                    <hr>
                    <div class="row" id="food-list">

                        @foreach ($meals as $meal)
                            <div class="col-4 mb-4 restaurant-item" data-class="{{ $meal->class }}">
                                <img style="width: 225px; height:225px; object-fit: cover;" class="ml-3 myimg"
                                    src="{{ url('http://localhost/swallabLa/swallab/storage/app/public/' . $meal->photo) }}"
                                    alt="{{ $meal->meals_name }}">
                                <div class="name">{{ $meal->meals_name }}</div>
                                <div class="price">${{ $meal->price }}</div>
                                <button class="score ml-5" data-bs-toggle="modal" data-bs-target="#addCartModal"
                                    onclick="addToCart({{ $meal->id }}, '{{ $meal->meals_name }}', {{ $meal->price }}, '{{ $meal->photo }}')">
                                    加入購物車
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>




                <!-- 購物車modal -->
                <div class="modal fade" id="addCartModal" tabindex="-1" aria-labelledby="addCartLabel"
                    aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: #EEE9D5;">
                            <div class="modal-header" style="border-bottom:1px solid black">
                                <h5 class="modal-title" id="addCartLabel">加入購物車</h5>
                                <button type="button"
                                    style="border: none;outline: none;background-color:#EEE9D5;border-color: transparent;"
                                    onclick="closeModal()">X</button>
                            </div>
                            <div class="modal-body">
                                <div id="cart-item" class="d-flex">
                                    <!-- 左側：圖片與餐點信息 -->
                                    <div class="d-flex flex-column align-items-center">
                                        <div id="cart-item-name" class="items ms-5 blockquote"></div>
                                        <br>
                                        <img id="cart-item-image" src="" class="product-img"
                                            style="width: 100px; height: auto;">
                                        <div class="mt-2">
                                            <span>$</span>
                                            <span id="cart-item-price" class="prices"></span>
                                        </div>
                                    </div>
                                    <!-- 右側：數量調整與總價 -->
                                    <div class="d-flex align-items-center mt-5 mx-5">
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle"
                                            style="width: 40px; height: 40px;"
                                            onclick="decrement('cart-item-quantity', 'cart-item-price', 'cart-item-total')">-</button>
                                        <span id="cart-item-quantity" class="mx-3">1</span>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle"
                                            style="width: 40px; height: 40px;"
                                            onclick="increment('cart-item-quantity', 'cart-item-price', 'cart-item-total')">+</button>
                                        <div id="cart-item-total" class="ml-4">$0</div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="cc" type="button" class="btn"
                                    onclick="confirmAddToCart()">確定</button>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- 購物車總覽modal -->
                <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartLabel" aria-hidden="true"
                    data-bs-backdrop="static">
                    <div class="modal-dialog modal-lg">
                        <div style="background-color: #EEE9D5;" class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cartLabel">購物車</h5>
                                <button type="button"
                                    style="border: none;outline: none;background-color:#EEE9D5;border-color: transparent;"
                                    onclick="closeCartModal()">X</button>
                            </div>
                            <div class="modal-body">
                                <div id="cart-contents"></div>
                            </div>
                            <div class="modal-footer">
                                <div class="d-flex justify-content-between w-100">
                                    <div id="cart-total" class="fw-bold"></div>
                                    <div style="background-color:rgb(229,166,122);padding:5px 15px;border-radius:10px">
                                        <a href="{{ url('/login/profile/order') }}"
                                            style="text-decoration: none;color:white">前往購物車</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        @endsection
