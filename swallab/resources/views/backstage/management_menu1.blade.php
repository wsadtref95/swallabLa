<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/backstage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/root.css">
    <script scr="../js/nav.js"></script>
    <title>Management Menu</title>
</head>

<body>
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
                        <h2 href="{{ route('profile.show') }}" class="text-decoration-none">
                            <span>{{ Auth::user()->name }}</span>
                        </h2>
                    @else
                        <p href="{{ route('login') }}">
                            <button class="btn btn-sm btnLogin text-nowrap">登入/註冊</button>
                        </p>
                    @endif
                </a>
            </div>
        </div>
    </nav>
    <!-- NAV_end -->
    <div class="container">

        <div class="row">
            <div class="mySidebar col-2">
                <a href="{{ url('/backstage/new_oder') }}">
                    <p>訂單狀況</p>
                </a>
                <a href="{{ url('/backstage/set_time') }}">
                    <p>編輯營業時間</p>
                </a>
                <a href="{{ url('/backstage/management_menu1') }}" class="active">
                    <p>菜單管理</p>
                </a>
                <a href="{{ url('/backstage/set_info') }}">
                    <p>編輯餐廳資料</p>
                </a>
            </div>
            <div class="col">
                <div class="options d-flex">
                    <a href="{{ url('/backstage/management_menu1') }}" class="active">
                        <h3>新增限時優惠</h3>
                    </a>
                    <a href="{{ url('/backstage/management_menu2') }}">
                        <h3>新增/修改菜單</h3>
                    </a>
                </div>
                <!-- <form action="http://localhost/myProj/getDiscount.php" id="discountForm" method="post"> -->
                <form id="discountForm">
                    <div class="optionContainer">
                        <div class="newDiscountBtn">
                            <h5><b>1</b></h5>
                            <p id="addDiscount">新增</p>
                        </div>
                        <div class="menuContainer row">
                            <div class="col-4">
                                <h5>餐點分類 : </h5>
                                <select id="className1" name="menuList1">
                                    <option value="" disabled selected>請選擇...</option>
                                    <option value="signature">招牌餐點</option>
                                    <option value="individual">個人即享餐</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <h5>餐點名稱 : </h5>
                                <select id="mealName1" name="menuName1">
                                    <option value="" disabled selected>請選擇...</option>
                                    <option value="signature">招牌餐點</option>
                                    <option value="individual">個人即享餐</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <h5>價格 : </h5>
                                <input id="menuPrice1" type="number" name="menuPrice1">
                                <p>原始價格為 : <span id="originalPrice1"></span></p>
                            </div>
                            <div class="col-6">
                                <h5>開始時間 : </h5>
                                <input type="datetime-local" id="startTime1" name="startTime1">
                                <p id="startTimeResult1"></p>
                            </div>
                            <div class="col-6">
                                <h5>結束時間 : </h5>
                                <input type="datetime-local" id="endTime1" name="endTime1" disabled>
                                <p id="endTimeResult1"></p>
                            </div>
                        </div>
                    </div>
                    <div id="addList"></div>
                    <div class="discountBtn">
                        <span id="submitResult"></span>
                        <input type="submit" value="存檔" id="discountBtn">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.7.1.js"></script>
    <!-- <script src="../js/backstage.js"></script> -->
    <script src="../js/management1.js"></script>
</body>

</html>
