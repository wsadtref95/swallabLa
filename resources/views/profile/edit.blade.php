<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯個人檔案</title>
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
            <div class="mySidebar col-2 mt-5">
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
                        <h4>會員中心 -> 編輯個人檔案</h4>
                    </div>
                </div>
                <div class="container mt-3">
                    <form id="profile-form" action="{{ route('profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="ml-5 d-flex">
                                <img id="avatar-display"
                                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('/images/other/default-avatar.jpg') }}"
                                    style="width: 180px; height: auto; cursor: pointer;">
                                <input type="file" id="avatar-input" name="avatar" style="display: none;">
                                <div class="col-md-5 ml-5 ">
                                    <div class="form-group">
                                        <input type="text" placeholder="請輸入姓名" class="form-control" id="name"
                                            name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group adjusted">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $user->email }}" readonly>
                                    </div>
                                    <div class="icon mt-2">
                                        <i class="fa-brands fa-instagram me-2 ms-2"></i>
                                        <i class="fa-brands fa-facebook me-2 ms-2"></i>
                                        <i class="fa-brands fa-threads me-2 ms-2"></i>
                                    </div>
                                </div>
                                <div class="col-md-7 ml-5 ">
                                    <div class="form-group">
                                        <input type="text" placeholder="請輸入電話" class="form-control" id="phone"
                                            name="phone" value="{{ $user->phone }}">
                                    </div>
                                    <button class="d-flex delete" data-toggle="modal"
                                        data-target="#changePasswordModal">更改密碼</button>
                                    <button class="d-flex delete">刪除帳戶</button>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mt-3 profile">個人簡介：
                            <div class="form-group mt-3 introduce">
                                <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
                            </div>
                        </div>
                        <div class="ml-5">
                            <button type="submit" class="delete ml-1 ">完成編輯</button>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <!-- 更改密碼model -->
    <div class="modal fade" id="changePasswordModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordLabel">更改密碼</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>目前密碼</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>新的密碼</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>確認密碼</label>
                            <input type="password" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">儲存</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <footer>
        <div class="container-md">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('image/大專logo.png') }}" style="border-radius: 50%; width:15%" class="m-2 ">
                </div>
            </div>
        </div>
    </footer> --}}
    <script>
        document.getElementById('avatar-display').onclick = function() {
            document.getElementById('avatar-input').click();
        };

        document.getElementById('avatar-input').onchange = function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('avatar-display').src = URL.createObjectURL(file);
            }
        };
    </script>
</body>

</html>
