<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="{{ asset('css/backstage.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/root.css">
    <script scr="../js/nav.js"></script>
    <title>New Oder</title>
    <style>
        #aa {
            background-image: url('{{ asset('images/other/subtle_white_feathers.webp') }}');

        }
    </style>
</head>

<body id="aa">
    
        <!-- NAV_begin : sticky-top -->
        <nav class="navbar navbar-expand sticky-top shadow">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand ms-5 col-1" href="../headpage/headpage.html">
                    <img src="../images/root/logo.jpg" alt="" class="logo d-inline-block align-text-top">
                </a>

                <div class="ms-3 me-5 col-1">
                    <a href="#" class="">
                        @if (Auth::check())
                            <h5 href="{{ route('profile.show') }}" class="text-decoration-none">
                                <span>{{ Auth::user()->name }}</span>
                            </h5>
                        @else
                            <a href="{{ route('login') }}">
                                <button class="btn btn-sm btnLogin text-nowrap">登入/註冊</button>
                            </a>
                        @endif
                    </a>
                </div>
            </div>
        </nav>
        <!-- NAV_end -->
        <div class="container">

            <div class="row">
                <div class="mySidebar col-2">
                    <a href="{{ url('/backstage/new_oder') }}" class="active">
                        <p>訂單狀況</p>
                    </a>
                    <a href="{{ url('/backstage/set_time') }}">
                        <p>編輯營業時間</p>
                    </a>
                    <a href="{{ url('/backstage/management_menu1') }}">
                        <p>菜單管理</p>
                    </a>
                    <a href="{{ url('/backstage/set_info') }}">
                        <p>編輯餐廳資料</p>
                    </a>
                </div>
                <div class="col">
                    <div class="options d-flex">
                        <a href="{{ url('/backstage/new_oder') }}" class="active">
                            <h3>新訂單</h3>
                        </a>
                        <a href="{{ url('/backstage/ready_to_serve') }}">
                            <h3>準備出餐</h3>
                        </a>
                    </div>
                    <div class="orderStatus">
                        <h4>
                            新訂單 :
                            <span>1</span>
                        </h4>
                        <h4>
                            準備出餐 :
                            <span>2</span>
                        </h4>
                        <p id="stopOrder">暫停接單</p>
                        <p id="recoverOrder" class="d-none">恢復接單</p>
                    </div>
                    <div class="optionContainer">
                        <div class="item d-flex justify-content-between">
                            <h4>下訂單的使用者名稱</h4>
                            <p>電話 : 0912345678</p>
                            <p>下單時間 : 11:00</p>
                            <h4>取餐時間 : 12:30</h4>
                        </div>
                        <div class="itemContainer row">
                            <div class="col-9 row">
                                <div class="col-6">品項</div>
                                <div class="col-6">數量</div>
                                <div class="col-6">個人即享鍋</div>
                                <div class="col-6">1</div>
                                <div class="col-6">青花驕麻辣燙</div>
                                <div class="col-6">2</div>
                                <div class="col-6">白飯</div>
                                <div class="col-6">2</div>

                            </div>
                            <div class="col">
                                <div class="myButton">
                                    <p>接受訂單</p>
                                    <p>取消訂單</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../js/jquery-3.7.1.js"></script>
        <script src="../js/backstage.js"></script>
        <script src="../js/backstageOder.js"></script>
   
</body>

</html>
