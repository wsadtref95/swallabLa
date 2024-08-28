@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>填寫餐廳菜單</h1>
        <form action="{{ route('meals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="meals_name">餐點名稱:</label>
                <input type="text" name="meals_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="class">分類:</label>
                <select name="class" class="form-control" required>
                    <!-- 火鍋類 -->
                    <optgroup label="火鍋類">
                        <option value="1">蔬菜</option>
                        <option value="2">餃類</option>
                        <option value="3">丸子</option>
                        <option value="4">肉類</option>
                        <option value="5">主食</option>
                        <option value="6">飲料</option>
                        <option value="7">甜點</option>
                        <option value="8">其他</option>
                    </optgroup>

                    <!-- 拉麵類 -->
                    <optgroup label="拉麵類">
                        <option value="9">豚骨</option>
                        <option value="10">醬油</option>
                        <option value="11">味噌</option>
                        <option value="12">海鮮</option>
                        <option value="6">飲料</option> <!-- 與火鍋類飲料相同 -->
                        <option value="8">其他</option> <!-- 與火鍋類其他相同 -->
                    </optgroup>

                    <!-- 燒肉類 -->
                    <optgroup label="燒肉類">
                        <option value="1">蔬菜</option> <!-- 與火鍋類蔬菜相同 -->
                        <option value="13">豬肉</option>
                        <option value="14">牛肉</option>
                        <option value="12">海鮮</option> <!-- 與拉麵類海鮮相同 -->
                        <option value="15">雞肉</option>
                        <option value="6">飲料</option> <!-- 與火鍋類飲料相同 -->
                        <option value="7">甜點</option> <!-- 與火鍋類甜點相同 -->
                        <option value="8">其他</option> <!-- 與火鍋類其他相同 -->
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="price">價格:</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photo">照片:</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    @endsection
