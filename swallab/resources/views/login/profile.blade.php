<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/profilexi.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/backstage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
    <header>
        <div class="container-md">
            <div class="row ">
                <div class="col-6">
                    <img src="{{ asset('images/root/LOGO.jpg') }}" style="border-radius: 50%; width:15%" class="m-2 ">
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="mySidebar col-2">
                <a href="{{ route('profile.show') }}" class="active">
                    <p>個人檔案</p>
                </a>
                <a href="{{url('/login/profile/order')}}">
                    <p>我的訂單</p>
                </a>
                <a href="#">
                    <p>歷史紀錄</p>
                </a>
                <a href="#">
                    <p>發布食記</p>
                </a>
            </div>
            <div class="col-9">
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-between">
                        <h4>會員中心 -> 個人檔案</h4>
                    </div>
                </div>
                <div class="container mt-3">
                    <div class="row">
                        <div class="ml-5 d-flex">
                            <img src="{{ asset($user->avatar ?? 'images/root/LOGO.jpg') }}" style="width: 180px; height: auto;">
                            <div class="col-md-5 ml-10 ">
                                <div class="name">{{ $user->name }}</div>
                                <div class="icon">
                                    <i class="fa-brands fa-instagram me-2 ms-2"></i>
                                    <i class="fa-brands fa-facebook me-2 ms-2"></i>
                                    <i class="fa-brands fa-threads me-2 ms-2"></i>
                                </div>
                            </div>
                            <div class="col-md-7 ml-5 ">
                                <div class="follow">30 追蹤中 20 粉絲</div>
                                <div class="col-md-8">
                                    <a href="{{ url('/login/profile/Fedit') }}">
                                        <button class="edit btn-outline-primary">編輯個人檔案</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-5 mt-3 profile">個人簡介：</div>
                    <div class="ml-5 mt-3 introduce">
                        早上好 今天我有冰淇淋
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/backstage.js') }}"></script>
</body>

</html>
