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
        meals.forEach(function (meal) {
            console.log('Name:', meal.meals_name);
            console.log('Photo:', meal.photo);
            console.log('Price:', meal.price);
        });


        function filterItems(classId) {
            // 先隱藏所有餐點
            var allItems = document.querySelectorAll('.restaurant-item');
            allItems.forEach(function (item) {
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
        function allfood(){
            let allfood =document.getElementById("allfood")
            let titleName=document.getElementById("titleName")
            titleName.innerText = ''
            titleName.innerText= allfood.innerText
        }


        //限時優惠
        function limit() {
                let limit = document.getElementById("limit")
                let titleName = document.getElementById("titleName")
                titleName.innerText = ''
                titleName.innerText = limit.innerText
        }


        //青菜
        function veg() {
            let veg = document.getElementById("veg")
            let titleName = document.getElementById("titleName")
            titleName.innerText = ''
            titleName.innerText = veg.innerText
        }


        //餃類
        function dum() {
            let dum = document.getElementById("dum")
            let titleName = document.getElementById("titleName")
            titleName.innerText = ''
            titleName.innerText = dum.innerText
        }


        //丸子類
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
    .cart{
        top:-10px;
        right:-10px;
        }
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
        <div class="icon-shopping icon-circle" onclick="showCart()" data-bs-toggle="modal" data-bs-target="#cartModal">
            <i class="fa-solid fa-cart-shopping" style="position:relative"></i>
        </div>
        <div class="icon-heart">
            <i class="fa-regular fa-heart" id="hearticon"></i>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="hotpot">
                <div style="font-size: 30px; font-weight: bold;">無老鍋 - 公益店</div>
                <div class="ml-5" style="font-size: 25px; font-weight: bold;">
                    4.8分 <span style="font-size: 20px">(33)</span>
                </div>
                <div class="ml-5 mt-2">均消200-400</div>
                <span class="mt-2">地址：台中市南屯區公益路二段74號</span>
                <button class="score" data-toggle="modal" data-target="#addCartModal">加入購物車</button>
            </div>
        </div>
        <div class="col-6">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.5897766425455!2d120.64794117534831!3d24.15104057839904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693d965f29ddcd%3A0x3352553556c97bc8!2z54Sh6ICB6Y2LKOWFrOebiuW6lyk!5e0!3m2!1szh-TW!2stw!4v1721538300299!5m2!1szh-TW!2stw"
                width="600" height="300" style="border:0; margin-top: 10px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
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
                <div class="mb-2 mt-3"  onclick="allfood()">
                    <a href="#all" onclick="filterItems(0)"><img src="{{ asset('images/other/hot_2.png') }}"
                            style="width: 150px;" alt=""></a>
                    <li id="allfood" >全部餐點</li>
                </div>
                <div class="" onclick="limit()">
                    <a href="https://www.google.com.tw/"><img src="{{ asset('images/other/limited_time_offer.png') }}"
                            style="width: 100px;" alt=""></a>
                    <li id="limit">限時優惠</li>
                </div>
                <div class="mb-2 mt-3" onclick="veg()">
                    <a href="#vegetable" onclick="filterItems(19)"><img
                            src="{{ asset('images/other/vegetable_6.jpeg') }}" style="width: 100px;" alt=""></a>
                    <li id="veg">青菜</li>
                </div>


                <div class="mt-2" onclick="dum()">
                    <a href="#dumpling" onclick="filterItems(18)"><img src="{{ asset('images/other/dumpling.png') }}"
                            style="width: 100px; border: none; background-color: transparent;" alt=""></a>
                    <li id="dum">餃類</li>
                </div>
                <div class="mt-2" onclick="ball()">
                    <a href="#porkball" onclick="filterItems(15)"><img src="{{ asset('images/other/porkball_1.jpg') }}"
                            style="width: 100px;" alt=""></a>
                    <li id="ball">丸子</li>
                </div>
                <div class="mt-2 mb-5" onclick="meal()">
                    <a href="#rice" onclick="filterItems(17)"><img src="{{ asset('images/other/rice.png') }}"
                            style="width: 80px;" alt=""></a>
                    <li id="meal">主食</li>
                </div>
            </div>
            <!-- 餐點 -->
            <div class="col-9 mb-5 ml-5">
                <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;" id="titleName">全部餐點</div>
                <hr>
                <div class="row" id="food-list">
                    <!-- {{-- @foreach ($menus as $menu)
                            <div class="col-4 mb-4">
                                <img class="ml-3 myimg" src="{{ asset('storage/photos/' . $menu->food_photo) }}"
                                    alt="{{ $menu->food_name }}">
                                <div class="name">{{ $menu->food_name }}</div>
                                <div class="price">${{ $menu->food_price }}</div>
                                <button class="score ml-5"
                                    onclick="addToCart({{ $menu->id }}, '{{ $menu->food_name }}', {{ $menu->food_price }}, '{{ $menu->food_photo }}')">加入購物車</button>
                            </div>
                        @endforeach --}} -->


                    <!-- {{-- 預設顯示的餐點，這裡可以顯示所有餐點或者某個範例 --}} -->
                    @foreach ($restaurants as $restaurant)
                        <div class="col-4 mb-4 restaurant-item" data-class="{{ $restaurant->class }}">
                            <img class="ml-3 myimg"
                                src="{{ url('http://localhost/swallabLa/swallab/storage/app/public/photos/' . $restaurant->photo) }}"
                                alt="{{ $restaurant->meals_name }}">
                            <div class="name">{{ $restaurant->meals_name }}</div>
                            <div class="price">${{ $restaurant->price }}</div>
                            <button class="score ml-5" data-bs-toggle="modal" data-bs-target="#addCartModal"
                                onclick="addToCart({{ $restaurant->id }}, '{{ $restaurant->meals_name }}', {{ $restaurant->price }}, '{{ $restaurant->photo }}')">
                                加入購物車
                            </button>


                        </div>
                    @endforeach



                    {{--
                </div>
                <!-- 其他動態菜單類型 -->
                <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">限時優惠</div>
                <div class="row">
                    <!-- 動態生成限時優惠菜單項目 -->
                </div>
                <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">餃類</div>
                <div class="row">
                    <!-- 動態生成餃類菜單項目 -->
                </div> --}}
            </div>
        </div>


        <!-- 留言區 -->
        <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">大家怎麼說</div>
        <div class="row">
            <div class="col-3">
                <img class="ml-2" src="{{ asset('images/root/LOGO.jpg') }}" style="width: 150px;">
            </div>
            <div class="col-9">
                <div>
                    一進門椒麻香氣撲鼻而來，接待員親切的接待⋯雖然第一次，但餐點沒讓人失望⋯我們點了雙人套餐，酸菜白肉（微酸而不嗆）+麻辣（麻而不辣）湯底真的絕配，也適合孩子，原本還擔心吃不飽，結果～飽到吃不完。白飯粒粒分明是我愛的、鮮蝦滑蝦子多看得到、手工麵Q彈量多、油條適合麻辣湯底、鴨血豆腐品質保證，青花驕特調烏梅汁搭配碎冰真的驚艷⋯唇齒留香讓人回味
                </div>
                <div class="date">2024/5/1</div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-3">
                <img class="ml-2" src="{{ asset('images/root/LOGO.jpg') }}" style="width: 150px;">
            </div>
            <div class="col-9">
                <div>
                    好吃平日雙人套餐優惠
                    份量多 還吃不完
                    沒吃完會主動詢問要不要打包👍
                    吃麻辣鍋湯底有鴨血豆腐
                    外帶還另外給一包鴨血豆腐
                    超貼心、餐點又好吃
                    便宜！真的大推
                    第一次吃很稱讚👏
                </div>
                <div class="date" style="margin-top: 60px;">2024/6/1</div>
            </div>
        </div>
        <hr>
        <div class="row hidden" id="hidden-Comment" style="display: none;">
            <div class="col-3">
                <img class="ml-2" src="{{ asset('images/root/LOGO.jpg') }}" style="width: 150px;">
            </div>
            <div class="col-9">
                <div>
                    第二次來用餐，3種部位的牛肉品質都不錯，且份量足，吃得很開心。海鮮的部分生蠔與干貝已說明不可生食，烹煮後相當甘甜嫩滑，也很好吃，不過CP值略低。每人有收取鍋底費用，最後的打包誠意十足，可以回家後繼續享用。整體而言是值得再訪的餐廳。
                </div>
                <div class="date" style="margin-top: 60px;">2024/8/1</div>
            </div>
        </div>
        <button class="score" style="margin-left: auto; margin-top: 10px;"
            onclick="showMore('hidden-Comment')">顯示更多</button>
    </div>


    <!-- 購物車modal -->
    <div class="modal fade" id="addCartModal" tabindex="-1" aria-labelledby="addCartLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #EEE9D5;">
                <div class="modal-header" style="border-bottom:1px solid black">
                    <h5 class="modal-title" id="addCartLabel">加入購物車</h5>
                    <button type="button" style="border: none;outline: none;background-color:#EEE9D5;border-color: transparent;" onclick="closeModal()">X</button>
                </div>
                <div class="modal-body">
                    <div id="cart-item" class="d-flex">
                        <!-- 左側：圖片與餐點信息 -->
                        <div class="d-flex flex-column align-items-center">
                            <div id="cart-item-name" class="items ms-5 blockquote"></div>
                            <br>
                            <img id="cart-item-image" src="" class="product-img" style="width: 100px; height: auto;">
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
                    <button type="button" class="btn" onclick="confirmAddToCart()">確定</button>
                </div>
            </div>
        </div>
    </div>




    <!-- 購物車總覽modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div style="background-color: #EEE9D5;" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartLabel">購物車</h5>
                    <button type="button" style="border: none;outline: none;background-color:#EEE9D5;border-color: transparent;" onclick="closeCartModal()">X</button>
                </div>
                <div class="modal-body">
                    <div id="cart-contents"></div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-between w-100">
                        <div id="cart-total" class="fw-bold"></div>
                        <div style="background-color:rgb(229,166,122);padding:5px 15px;border-radius:10px">
                            <a href="{{ url('/login/profile/order') }}" style="text-decoration: none;color:white">前往購物車</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection

