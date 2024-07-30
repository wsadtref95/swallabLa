<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>新增食物</h1>   
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('food_items.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">食物名稱</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">圖片URL</label>
                <input type="url" class="form-control" id="image_url" name="image_url" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">價格</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="store_name">店名:</label>
                <input type="text" class="form-control" id="store_name" name="store_name" required>
            </div>
            <button type="submit" class="btn btn-primary">新增食物</button>
        </form>
    </div>
</body>

</html>
