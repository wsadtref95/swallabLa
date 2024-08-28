@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>填寫餐廳資料</h1>
        <form action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">餐廳名稱:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">地址:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">電話:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="average_price">平均消費:</label>
                <input type="number" name="average_price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="class">分類:</label>
                <select name="class" class="form-control" required>
                    <option value="1">火鍋</option>
                    <option value="2">燒肉</option>
                    <option value="3">拉麵</option>
                    <option value="4">居酒屋</option>
                    <option value="5">甜點</option>
                    <option value="6">日式餐廳</option>
                    <option value="7">義式餐廳</option>
                    <option value="8">韓式餐廳</option>
                    <option value="9">其他</option>
                </select>
            </div>
            <div class="form-group">
                <label for="photo">照片:</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    </div>
@endsection
