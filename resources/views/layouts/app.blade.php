<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '餐廳網站')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.map"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orderxi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailxi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/headpage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backstage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/foodNotes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demoHotpot.css') }}">
    <style>
        #aa {
            background-image: url('{{ asset('images/other/subtle_white_feathers.webp') }}');
        }

        .filter_btn {
            margin-top: 8px;
        }

        #rest {
            position: absolute;
            right: 30px;
        }

        #resta {
            position: relative;
            right: 60px;
        }
    </style>
    @stack('styles')
</head>

<body id="aa">
    <!-- NAV_begin : sticky-top -->
    <nav class="navbar navbar-expand sticky-top shadow">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand ms-5 col-1" href="{{ route('headpage') }}">
                <img src="{{ asset('images/root/logo.jpg') }}" alt=""
                    class="logo d-inline-block align-text-top">
            </a>
            <!-- 伸縮 -->
            <div class="collapse navbar-collapse col-10" id="navbarSupportedContent">
                <div class="nav ms-0 me-3 row">
                    <div class="nav-item col-6">
                        <a id="rest" class="nav-link d-block nav_mainbtn"
                            href="{{ url('/restaurant/detail') }}">找餐廳</a>
                    </div>
                    <div class="nav-item col-6">
                        <a id="resta" class="nav-link d-block nav_mainbtn"
                            href="{{ url('http://localhost/swallab/Swallab/foodNotes/foodNotes.html') }}">看食記</a>
                    </div>
                </div>
                <!-- Input 都在這 -->
                <form class="ms-2 me-1 w-100" role="search" name="search">
                    <div class="d-flex" style="width: 100%;">
                        <div id="theicon" class="mt-2 me-0 align-items-center justify-content-center"></div>
                        <!-- 搜尋框 + 情境按鈕(pill 會改成底線) -->
                        <div class="d-block position-relative m-0 p-0 col">
                            <div style="display: flex;" class="row">
                                <div class="col-6">
                                    <input type="text" id="myInput" onclick="myFunction()" placeholder="點擊我"
                                        class="form-control m-0">
                                    <div id="myDropdown" class="dropdown-content"
                                        style="display: none; position: absolute;">
                                        <a href="#cate_no" onclick="fillInput('null')"
                                            class="position-relative">不挑分類</a>
                                        <a href="#cate_hotpot" onclick="fillInput('火鍋')"
                                            class="position-relative">火鍋</a>
                                        <a href="#cate_bbq" onclick="fillInput('燒肉')" class="position-relative">燒肉</a>
                                        <a href="#cate_izakaya" onclick="fillInput('居酒屋')"
                                            class="position-relative">居酒屋</a>
                                        <a href="#cate_ramen" onclick="fillInput('拉麵')" class="position-relative">拉麵</a>
                                        <a href="#cate_dessert" onclick="fillInput('甜點')"
                                            class="position-relative">甜點</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input type="text" id="myInput2" onclick="myFunction2()" placeholder="點擊我"
                                        class="form-control m-0">
                                    <div id="myDropdown2" class="dropdown-content"
                                        style="display: none; position: absolute;">
                                        <a href="#loc_no" onclick="fillInput2('null')"
                                            class="position-relative">不挑地區</a>
                                        <a href="#loc_Taichung" onclick="fillInput2('台中市')"
                                            class="position-relative">台中市</a>
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
                                <img class="icon" src="{{ asset('images/nav_icon/confetti.png') }}"
                                    alt="">慶生
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 70%;">
                                <img class="icon" src="{{ asset('images/nav_icon/handshake.png') }}"
                                    alt="">商務
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 90%;">
                                <img class="icon" src="{{ asset('images/nav_icon/disabled-people.png') }}"
                                    alt="">無障礙
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


    <!-- Main_begin -->
    <main>
        @yield('content')
    </main>
    <!-- Main_end -->
    {{-- footer --}}

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

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
