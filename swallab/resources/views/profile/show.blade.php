<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看個人檔案</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/profilexi.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backstage.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .email {
            margin-top: 15px;
        }

        .fa-instagram {
            color: #E1306C;
        }

        .fa-facebook {
            color: #4267B2
        }

        .fa-threads {
            color: black;
            text-decoration: none;
        }

        .fa-facebook:hover,
        .fa-instagram:hover,
        .fa-threads:hover {
            transform: scale(1.2);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-md">
            <div class="row ">
                <div class="col-6">
                    <a href="{{ url('http://localhost/swallabLa/swallab/public/headpage/headpage') }}"> <img
                            src="{{ asset('/images/other/logo.jpg') }}" style="border-radius: 50%; width:15%"
                            class="m-2 ">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="mySidebar col-2 mt-3">
                <a href="{{ route('profile.show') }}" class="active">
                    <p>個人檔案</p>
                </a>
                <a href="{{ url('/login/profile/order') }}">
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
                    <div class="col-12 d-flex">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="container mt-3">
                    <div class="row">
                        <div class="ml-5 d-flex">

                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('/images/other/default-avatar.jpg') }}"
                                style="width: 180px; height: auto;">
                            <div class="col-md-5 ml-5 ">

                                <div class="name">{{ $user->name }}</div>
                                <div class="email">
                                    {{ $user->email }}
                                </div>
                                <div class="icon mt-2">
                                    @if ($user->instagram)
                                        <a href="{{ $user->instagram }}" target="_blank"
                                            style="text-decoration: none;">
                                            <i class="fa-brands fa-instagram mr-3"></i>
                                        </a>
                                    @else
                                        <i class="fa-brands fa-instagram mr-3" style="color: gray;"></i>
                                    @endif

                                    @if ($user->facebook)
                                        <a href="{{ $user->facebook }}" target="_blank" style="text-decoration: none;">
                                            <i class="fa-brands fa-facebook mr-3"></i>
                                        </a>
                                    @else
                                        <i class="fa-brands fa-facebook mr-3" style="color: gray;"></i>
                                    @endif

                                    @if ($user->threads)
                                        <a href="{{ $user->threads }}" target="_blank" style="text-decoration: none;">
                                            <i class="fa-brands fa-threads mr-3"></i>
                                        </a>
                                    @else
                                        <i class="fa-brands fa-threads mr-3" style="color: gray;"></i>
                                    @endif
                                </div>


                            </div>

                            <div class="col-md-7 ">
                                <div class="follow">30 追蹤中 20 粉絲</div>
                                @if ($user->phone)
                                    <div class="follow">{{ $user->phone }}</div>
                                @endif

                                <a href="{{ route('profile.edit') }}" class="d-flex delete mx-5">編輯個人檔案</a>
                                {{-- <button class="d-flex delete">刪除帳戶</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="ml-5 mt-3 profile">個人簡介：
                        <div class="mt-3 introduce">
                            {{ $user->bio }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <footer>
        <div class="container-md">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('/images/other/logo.jpg') }}" style="border-radius: 50%; width:15%" class="m-2 ">
                </div>
            </div>
        </div>
    </footer> --}}
</body>

</html>
