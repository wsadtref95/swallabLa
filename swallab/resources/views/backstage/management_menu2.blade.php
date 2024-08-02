<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/backstage.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/root.css">
    <script src="../js/nav.js"></script>
    <title>Management Menu</title>
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
                    <a href="{{ url('/backstage/management_menu1') }}">
                        <h3>新增限時優惠</h3>
                    </a>
                    <a href="{{ url('/backstage/management_menu2') }}" class="active">
                        <h3>新增/修改菜單</h3>
                    </a>
                </div>
                <div class="editMenuCon">
                    <h5><b>我的菜單</b></h5>
                    <p id="editMenu">新增</p>
                </div>
                <div class="menuListContainer row">
                    <div class="col-2">分類</div>
                    <div class="col-2">圖片</div>
                    <div class="col-2">名稱</div>
                    <div class="col-2">價錢</div>
                    <div class="col-2">編輯</div>
                    <div id="menuList"></div>
                </div>

                <!-- 新增菜單 module -->
                <form id="editForm" enctype="multipart/form-data">
                    @csrf
                    <i id="myClose" class="fa-solid fa-xmark"></i>
                    <div class="addOptionContainer row container">
                        <div class="col">
                            <p id="photoResult">新增食品照片</p>
                            <input type="file" name="foodPhoto" id="foodPhoto" accept="image/*" required>
                        </div>
                        <div class="col row">
                            <div class="col-12">
                                <h5>
                                    <label for="foodPrice">價&emsp;&emsp;格 : &emsp;&emsp;</label>
                                </h5>
                                <input type="number" name="foodPrice" id="foodPrice" required>
                            </div>
                            <div class="col-12">
                                <h5>
                                    <label for="foodName">名&emsp;&emsp;稱 : &emsp;&emsp;</label>
                                </h5>
                                <input name="foodName" id="foodName" required>
                            </div>
                            <div class="col-12">
                                <h5>
                                    <label for="classification">餐點分類 : &emsp;&emsp;</label>
                                </h5>

                            </div>
                        </div>
                    </div>
                    <div class="discountBtn">
                        <span id="submitResult"></span>
                        <input type="submit" value="存檔" id="addMenuBtn">
                    </div>
                </form>
                
                <!-- 編輯/修改菜單 -->
                <div class="addOptionContainerBg d-none" id="modifyFormCon">
                    <form id="modifyForm" enctype="multipart/form-data" onsubmit="handleModifyFormSubmit(event)">
                        <i id="myClose2" class="fa-solid fa-xmark"></i>
                        <div class="addOptionContainer row container">
                            <div class="col">
                                <p id="myPhotoResult"></p>
                                <input type="file" name="myFoodPhoto" id="myFoodPhoto" accept="image/*">
                            </div>
                            <div class="col row">
                                <div class="col-12">
                                    <h5>
                                        <label for="myFoodPrice">價&emsp;&emsp;格 : &emsp;&emsp;</label>
                                    </h5>
                                    <input type="number" name="myFoodPrice" id="myFoodPrice">
                                </div>
                                <div class="col-12">
                                    <h5>
                                        <label for="myFoodName">名&emsp;&emsp;稱 : &emsp;&emsp;</label>
                                    </h5>
                                    <input name="myFoodName" id="myFoodName">
                                </div>
                            </div>
                        </div>
                        <div class="discountBtn">
                            <span id="mySubmitResult"></span>
                            <input type="submit" value="存檔" id="modifyMenuBtn">
                        </div>
                    </form>
                </div>
                <!-- 刪除菜單 -->
                <div class="addOptionContainerBg d-none" id="deleteFormCon">
                    <form id="deleteForm" enctype="multipart/form-data" onsubmit="handleDeleteFormSubmit(event)">
                        <i id="myClose3" class="fa-solid fa-xmark"></i>
                        <div class="addOptionContainer row">
                            <div class="col colBtn">取消</div>
                            <div class="col colBtn">刪除</div>
                        </div>
                        <div class="discountBtn">
                            <span id="deleteResult"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/management2.js"></script>
</body>
</html>
