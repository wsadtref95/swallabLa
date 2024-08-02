<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>餐廳內頁</title>
    <link rel="stylesheet" href="{{ asset('css/detailxi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/headpage.css') }}">
    <style>
        #aa {
            background-image: url('{{ asset('images/other/subtle_white_feathers.webp') }}');
        }

        .filter_btn {
            margin-top: 8px; 
        }

        #rest{
            position: absolute;
            right: 30px;
        }

        #resta{
           position: relative;
            right: 60px;
        }

        #googlemap {
            height: 400px;
            width: 100%;
        }

        #sidebar {
            height: 400px;
            overflow-y: scroll;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        #sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #sidebar li {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }

        #sidebar li:hover {
            background-color: #f9f9f9;
        }

        #currentLocationButton {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        #currentLocationButton:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFfMKagsvr7L4704YiZlG_2hp8gNfaB5A&libraries=places&callback=initMap" async defer></script>
    <script>
        let map;
        let service;
        let infowindow;
        let userLocation;

        function initMap() {
            infowindow = new google.maps.InfoWindow();

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                    map = new google.maps.Map(document.getElementById('googlemap'), {
                        center: userLocation,
                        zoom: 15
                    });

                    const userMarker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: "Your Location",
                        icon: {
                            url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                        }
                    });

                    const request = {
                        location: userLocation,
                        radius: '1500',
                        type: ['restaurant']
                    };

                    service = new google.maps.places.PlacesService(map);
                    service.nearbySearch(request, (results, status) => {
                        if (status == google.maps.places.PlacesServiceStatus.OK) {
                            for (let i = 0; i < results.length; i++) {
                                createMarker(results[i]);
                                addToList(results[i]);
                            }
                        }
                    });
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function createMarker(place) {
            if (!place.geometry || !place.geometry.location) return;

            const marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location,
                title: place.name
            });

            google.maps.event.addListener(marker, 'click', () => {
                infowindow.setContent(place.name || "");
                infowindow.open(map, marker);
            });
        }

        function addToList(place) {
            const list = document.getElementById('places');
            const item = document.createElement('li');
            item.textContent = place.name;
            list.appendChild(item);

            item.addEventListener('click', () => {
                map.setCenter(place.geometry.location);
                infowindow.setContent(place.name);
                infowindow.open(map, new google.maps.Marker({
                    position: place.geometry.location,
                    map: map,
                    title: place.name
                }));
            });
        }

        function goToCurrentLocation() {
            if (userLocation) {
                map.setCenter(userLocation);
                infowindow.setContent("Your Location");
                infowindow.open(map, new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: "Your Location",
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                    }
                }));
            } else {
                alert("Unable to retrieve your location.");
            }
        }
    </script>
</head>

<body id="aa">
    <!-- NAV_begin : sticky-top -->
    <nav class="navbar navbar-expand sticky-top shadow">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand ms-5 col-1" href="{{ route('headpage') }}">
                <img src="{{ asset('images/root/logo.jpg') }}" alt="" class="logo d-inline-block align-text-top">
            </a>
            <!-- 伸縮 -->
            <div class="collapse navbar-collapse col-10" id="navbarSupportedContent">
                <div class="nav ms-0 me-3 row">
                    <div class="nav-item col-6">
                        <a id="rest" class="nav-link d-block nav_mainbtn " href="{{ url('/restaurant/detail') }}">找餐廳</a>
                    </div>
                    <div class="nav-item col-6">
                        <a id="resta" class="nav-link d-block nav_mainbtn" href="{{ url('/foodNotes/foodNotes') }}">看食記</a>
                    </div>
                </div>
                <!-- Input 都在這 -->
                <form class="ms-2 me-1 w-100" role="search" name="search">
                    <div class="d-flex" style="width: 100%;">
                        <div id="theicon" class="mt-2 me-0 align-items-center justify-content-center">
                        </div>

                        <!-- 搜尋框 + 情境按鈕(pill 會改成底線) -->
                        <div class="d-block position-relative m-0 p-0 col">
                            <div style="display: flex;" class="row">
                                <div class="col-6">
                                    <input type="text" id="myInput" onclick="myFunction()" placeholder="點擊我"
                                        class="form-control m-0">
                                    <div id="myDropdown" class="dropdown-content"
                                        style="display: none; position: absolute;">
                                        <a href="#cate_no" onclick="fillInput('null')" class="position-relative">不挑分類</a>
                                        <a href="#cate_hotpot" onclick="fillInput('火鍋')" class="position-relative">火鍋</a>
                                        <a href="#cate_bbq" onclick="fillInput('燒肉')" class="position-relative">燒肉</a>
                                        <a href="#cate_izakaya" onclick="fillInput('居酒屋')" class="position-relative">居酒屋</a>
                                        <a href="#cate_ramen" onclick="fillInput('拉麵')" class="position-relative">拉麵</a>
                                        <a href="#cate_dessert" onclick="fillInput('甜點')" class="position-relative">甜點</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input type="text" id="myInput2" onclick="myFunction2()" placeholder="點擊我"
                                        class="form-control m-0 ">
                                    <div id="myDropdown2" class="dropdown-content"
                                        style="display: none; position: absolute;">
                                        <a href="#loc_no" onclick="fillInput2('null')" class="position-relative">不挑地區</a>
                                        <a href="#loc_Taichung" onclick="fillInput2('台中市')" class="position-relative">台中市</a>
                                        <a href="#loc_1" onclick="fillInput2('選項2')" class="position-relative">選項2</a>
                                        <a href="#loc_2" onclick="fillInput2('選項3')" class="position-relative">選項3</a>
                                    </div>
                                </div>
                            </div>

                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 10%;">
                                <img class="icon" src="{{ asset('images/nav_icon/dating.png') }}" alt="">約會
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 30%;">
                                <img class="icon" src="{{ asset('images/nav_icon/group.png') }}" alt="">聚餐
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 50%;">
                                <img class="icon" src="{{ asset('images/nav_icon/confetti.png') }}" alt="">慶生
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 70%;">
                                <img class="icon" src="{{ asset('images/nav_icon/handshake.png') }}" alt="">商務
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 90%;">
                                <img class="icon" src="{{ asset('images/nav_icon/disabled-people.png') }}" alt="">無障礙
                            </button>
                        </div>
                        <input type="image" src="{{ asset('images/nav_icon/loupe.png') }}" class="icon mt-2 ms-0"
                            onclick="document.search.submit()">
                    </div>
                </form>
                <!-- 登入及註冊按鈕 -->
                <div class="ms-3 me-5 col-1">
                    @if (Auth::check())
                        <a href="{{ route('profile.show') }}" class="text-decoration-none">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            <button class="btn btn-sm btnLogin text-nowrap">登入/註冊</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- NAV_end -->

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
            <div class="icon-shopping icon-circle">
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
                    <button class="score" data-toggle="modal" data-target="#scoreModal">點我評分</button>
                </div>
            </div>
            <div class="col-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.5897766425455!2d120.64794117534831!3d24.15104057839904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693d965f29ddcd%3A0x3352553556c97bc8!2z54Sh6ICB6Y2LKOWFrOebiuW6lyk!5e0!3m2!1szh-TW!2stw!4v1721538300299!5m2!1szh-TW!2stw" width="600" height="300" style="border:0; margin-top: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <a href="https://www.google.com.tw/"><img
                                src="{{ asset('images/other/limited_time_offer.png') }}" style="width: 100px;"
                                alt=""></a>
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
                                <button class="score ml-5">加入購物車</button>
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
        <!-- 購物車model -->
        <div class="modal fade" id="cartModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartLabel">無老鍋-公益店</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>x</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex">
                        <div class="row">
                            <div>
                                <img src="{{ asset('images/qhjpage/person/1.avif') }}" class="product-img">
                            </div>
                            <div class="product-details ml-3">
                                <div class="items mt-3">個人即享鍋</div>
                                <div class="d-flex mt-4 ml-4">
                                    <span>$</span>
                                    <span class="prices" id="price-1">310</span>
                                </div>
                            </div>
                            <div class="product-actions">
                                <div class="ml-5 mt-3">
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-button"
                                        onclick="decrement('number-span-1', 'price-1', 'total-price-1')">-</button>
                                    <span class="number-span fs-20" id="number-span-1">0</span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-button"
                                        onclick="increment('number-span-1', 'price-1', 'total-price-1')">+</button>
                                    <div id="total-price-1" class="mt-3 ml-1">$0</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center ml-5">
                                <button class="btn btn-link trash" onclick="removeProduct('product-row-1')"><i
                                        class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">儲存</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top -->
    <img src="{{ asset('images/other/top.png') }}" class="top" id="top">
    <footer>
        <div class="container-md">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('images/root/LOGO.jpg') }}" style="border-radius: 50%; width:15%"
                        class="m-2">
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/detail.js') }}"></script>

</body>

</html>
