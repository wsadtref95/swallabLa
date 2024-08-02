<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/backstage.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/root.css">
    <title>Set Information</title>
    <style>
        .active {
            background-color: #f8f9fa;
            color: #495057;
        }

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
                <a href="{{ url('/backstage/new_oder') }}" class="sidebar-link">
                    <p>訂單狀況</p>
                </a>
                <a href="{{ url('/backstage/set_time') }}" class="sidebar-link">
                    <p>編輯營業時間</p>
                </a>
                <a href="{{ url('/backstage/management_menu1') }}" class="sidebar-link">
                    <p>菜單管理</p>
                </a>
                <a href="{{ url('/backstage/set_info') }}" class="sidebar-link active">
                    <p>編輯餐廳資料</p>
                </a>
            </div>
            <div class="col">
                <h3 class="p-20">編輯餐廳資料</h3>
                <div class="restaurantInfo">
                    <form action="" method="post" id="restaurantInfo">
                        <label for="restaurantName">
                            <h5>
                                餐廳名稱 :
                            </h5>
                            <input id="restaurantName">
                        </label><br>
                        <label for="restaurantTel">
                            <h5>
                                電&emsp;&emsp;話 :
                            </h5>
                            <input id="restaurantTel">
                        </label><br>
                        <label for="restaurantAddress">
                            <h5>
                                地&emsp;&emsp;址 :
                            </h5>
                            <input id="restaurantAddress">
                        </label><br>
                        <label for="restaurantAvergae">
                            <h5>
                                平均消費 :
                            </h5>
                            <input id="restaurantAvergae">
                        </label><br>
                        <label>
                            <h5>
                                餐廳分類 :
                            </h5>
                        </label>
                        <select name="restaurantClassification">
                            <option>餐廳分類</option>
                        </select>
                        <div class="submit-container">
                            <input type="submit" value="存檔">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/backstage.js"></script>
    <script>
        $(document).ready(function() {
            // 確保當前頁面的鏈接是選中的
            $('.mySidebar a').each(function() {
                if (this.href === window.location.href) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
</body>

</html>
