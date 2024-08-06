<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>食物列表</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">食物列表</h1>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>編號ID</th>
                    <th>食物名稱</th>
                    <th>食物圖片</th>
                    <th>價格</th>
                    <th>餐廳名稱</th>
                    <th>動作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foodItems as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{ $item->image_url }}" alt="{{ $item->name }}" style="width: 100px; height: 100px;"></td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->store_name }}</td>
                        <td>
                            <a href="{{ route('food_items.edit', $item->id) }}" class="btn btn-primary">編輯</a>
                            <form action="{{ route('food_items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">刪除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('food_items.create') }}" class="btn btn-success">新增食物</a>
    </div>
</body>

</html>
