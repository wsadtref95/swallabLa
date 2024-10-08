<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯個人檔案</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profilexi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/backstage.js') }}"></script>
</head>

<body>
    <header>
        <div class="container-md p-0">
            <div class="row">
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
                <a href="#">
                    <p>我的訂單</p>
                </a>
                <a href="#">
                    <p>歷史紀錄</p>
                </a>
                <a href="#">
                    <p>發布食記</p>
                </a>
            </div>
            <div class="col">
                <div class="col-md-10">
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-between">
                            <h4>會員中心 -> 編輯個人檔案</h4>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <div class="row">
                            <div class="ml-5 d-flex">
                                <img src="{{ asset($user->avatar ?? 'images/root/LOGO.jpg') }}"
                                    style="width: 180px; height: auto;">
                                <div class="col-md-5 ml-5">
                                    <div class="name">{{ $user->name }}</div>
                                    <div class="icon">
                                        <i class="fa-brands fa-instagram me-2 ms-2"></i>
                                        <i class="fa-brands fa-facebook me-2 ms-2"></i>
                                        <i class="fa-brands fa-threads me-2 ms-2"></i>
                                    </div>
                                    <div class="email">
                                        {{ $user->email }}
                                    </div>
                                </div>
                                <div class="col-md-7 ml-5">
                                    <div class="follow">{{ $user->phone }}</div>
                                    <button class="d-flex delete" data-toggle="modal"
                                        data-target="#changePasswordModal">更改密碼</button>
                                    <button class="d-flex delete">刪除帳戶</button>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mt-3 profile">個人簡介：
                            <div class="mt-3 introduce">
                                {{ $user->introduction ?? '早上好 今天我有冰淇淋' }}
                            </div>
                        </div>
                        <button class="delete ml-5">完成編輯</button>
                        <hr>
                        <button class="ml-5 delete" data-toggle="modal" data-target="#addCreditCardModal">新增信用卡</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 更改密碼模態框 -->
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
                    <button type="button" id="saveCreditCardButton" class="btn btn-primary">儲存</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 新增信用卡模態框 -->
    <div class="modal fade" id="addCreditCardModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCreditCardModalLabel">新增信用卡</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>信用卡號碼</label>
                            <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="form-group">
                            <label>到期日</label>
                            <input type="text" class="form-control" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <label>安全碼</label>
                            <input type="text" class="form-control" placeholder="123">
                        </div>
                        <div class="form-group">
                            <label>持卡人姓名</label>
                            <input type="text" class="form-control" placeholder="王小明">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">儲存</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container-md">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('images/root/LOGO.jpg') }}" style="border-radius: 50%; width:15%"
                        class="m-2 ">
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
