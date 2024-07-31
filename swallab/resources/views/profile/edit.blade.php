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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/profilexi.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <div class="container-md p-0">
            <div class="row ">
                <div class="col-6">
                    <img src="{{ asset('image/大專logo.png') }}" style="border-radius: 50%; width:15%" class="m-2 ">
                </div>
            </div>
        </div>  
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <a href="{{ route('profile.show') }}">個人檔案</a>
                <a href="{{ url('/order') }}">我的訂單</a>
                <a href="#">歷史紀錄</a>
                <a href="#">發布食記</a>
            </div>
            <div class="col-md-10">
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-between">
                        <h4>會員中心 -> 編輯個人檔案</h4>
                    </div>
                </div>
                <div class="container mt-3">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">名稱</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">電子郵件</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">電話</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="bio">個人簡介</label>
                                    <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="avatar">更新照片</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                    @if ($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar" class="img-thumbnail mt-2" style="width: 150px;">
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">保存變更</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-md">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('image/大專logo.png') }}" style="border-radius: 50%; width:15%" class="m-2 ">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
