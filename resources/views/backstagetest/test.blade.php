<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>HeadPage</title>
</head>

<body>
    <div class="container mt-5">
        <div class="ms-3 me-5 col-1 mb-3">
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
        <h2>新增菜單項目</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form id="menuForm" method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="foodName" class="form-label">菜名</label>
                <input type="text" class="form-control" id="foodName" name="foodName" required>
            </div>
            <div class="mb-3">
                <label for="foodPrice" class="form-label">價格</label>
                <input type="number" class="form-control" id="foodPrice" name="foodPrice" required>
            </div>
            <div class="mb-3">
                <label for="foodPhoto" class="form-label">食物圖片</label>
                <input type="file" class="form-control" id="foodPhoto" name="foodPhoto" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">存檔</button>
        </form>
    </div>

    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>
