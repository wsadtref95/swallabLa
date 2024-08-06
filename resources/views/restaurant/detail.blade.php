@extends('layouts.app')

@push('styles')
    @include('layouts.map')
@endpush

@push('scripts')
    @include('layouts.map')
    <script>
       
        const assetBaseUrl = "{{ asset('storage/photos') }}";
        const assetBaseUrlShowCart = "{{ asset('storage/photos') }}";
    </script>
    <script src="{{ asset('/js/cart.js') }}"></script>
@endpush

@section('title', '餐廳內頁')

@section('content')
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
            <div class="icon-shopping icon-circle" onclick="showCart()">
                <i class="fa-solid fa-cart-shopping"></i>
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
                    <div class="mb-2 mt-3">
                        <a href="https://www.google.com.tw/"><img src="{{ asset('images/other/hot_2.png') }}"
                                style="width: 150px;" alt=""></a>
                        <li>招牌餐點</li>
                    </div>
                    <div class="">
                        <a href="https://www.google.com.tw/"><img src="{{ asset('images/other/limited_time_offer.png') }}"
                                style="width: 100px;" alt=""></a>
                        <li>限時優惠</li>
                    </div>
                    <div class="mt-2">
                        <a href="https://www.google.com.tw/"><img src="{{ asset('images/other/vegetable_6.jpeg') }}"
                                style="width: 100px;" alt=""></a>
                        <li>青菜</li>
                    </div>
                    <div class="mt-2">
                        <a href="https://www.google.com.tw/"><img src="{{ asset('images/other/dumpling.png') }}"
                                style="width: 100px; border: none; background-color: transparent;" alt=""></a>
                        <li>餃類</li>
                    </div>
                    <div class="mt-2">
                        <a href="https://www.google.com.tw/"><img src="{{ asset('images/other/porkball_1.jpg') }}"
                                style="width: 100px;" alt=""></a>
                        <li>丸子</li>
                    </div>
                    <div class="mt-2 mb-5">
                        <a href="https://www.google.com.tw/"><img src="{{ asset('images/other/rice.png') }}"
                                style="width: 80px;" alt=""></a>
                        <li>主食</li>
                    </div>
                </div>
                <!-- 餐點 -->
                <div class="col-9 mb-5 ml-5">
                    <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">招牌餐點</div>
                    <div class="row">
                        @foreach ($menus as $menu)
                            <div class="col-4 mb-4">
                                <img class="ml-3 myimg" src="{{ asset('storage/photos/' . $menu->food_photo) }}"
                                    alt="{{ $menu->food_name }}">
                                <div class="name">{{ $menu->food_name }}</div>
                                <div class="price">${{ $menu->food_price }}</div>
                                <button class="score ml-5"
                                    onclick="addToCart({{ $menu->id }}, '{{ $menu->food_name }}', {{ $menu->food_price }}, '{{ $menu->food_photo }}')">加入購物車</button>
                            </div>
                        @endforeach
                    </div>
                    <!-- 其他動態菜單類型 -->
                    <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">限時優惠</div>
                    <div class="row">
                        <!-- 動態生成限時優惠菜單項目 -->
                    </div>
                    <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">餃類</div>
                    <div class="row">
                        <!-- 動態生成餃類菜單項目 -->
                    </div>
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
            <button class="score" style="margin-left: auto; margin-top: 10px;" onclick="showMore('hidden-Comment')">顯示更多</button>
        </div>

        <!-- 購物車modal -->
        <div class="modal fade" id="addCartModal" tabindex="-1" aria-labelledby="addCartLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCartLabel">加入購物車</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="cart-item">
                            <img id="cart-item-image" src="" class="product-img" style="width: 100px; height: auto;">
                            <div class="product-details">
                                <div id="cart-item-name" class="items mt-3"></div>
                                <div class="d-flex mt-4 ml-4">
                                    <span>$</span>
                                    <span id="cart-item-price" class="prices"></span>
                                </div>
                            </div>
                            <div class="product-actions">
                                <div class="ml-5 mt-3">
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-button" onclick="decrement('cart-item-quantity', 'cart-item-price', 'cart-item-total')">-</button>
                                    <span id="cart-item-quantity" class="number-span fs-20">1</span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-button" onclick="increment('cart-item-quantity', 'cart-item-price', 'cart-item-total')">+</button>
                                    <div id="cart-item-total" class="mt-3 ml-1">$0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="confirmAddToCart()">確定</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 購物車總覽modal -->
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartLabel">購物車</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="cart-contents"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-between w-100">
                            <div id="cart-total" class="fw-bold"></div>
                            <a href="{{ url('/login/profile/order') }}">前往購物車</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
