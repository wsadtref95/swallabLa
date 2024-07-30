<!-- resources/views/orders.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的訂單</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/orderxi.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/backstage.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('images/root/LOGO.jpg') }}" style="border-radius: 50%; width:15%" class="m-2">
                </div>
            </div>
        </div>  
    </header>
    <div class="container">
        <div class="row">
            <div class="mySidebar col-2">
                <a href="{{ url('login/profile') }}">
                    <p>個人檔案</p>
                </a>
                <a href="#" class="active">
                    <p>我的訂單</p>
                </a>
                <a href="#">
                    <p>歷史紀錄</p>
                </a>
                <a href="#">
                    <p>發布食記</p>
                </a>
            </div>
            <div class="col-9 myorder">
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-between">
                        <h4>會員中心 -> 我的訂單</h4>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-outline-primary mx-4">未付款</button>
                            <button class="btn btn-outline-primary mx-4">待確認</button>
                            <button class="btn btn-outline-primary mx-4">待出餐</button>
                        </div>
                    </div>
                </div>
                
                @foreach($foodItems as $foodItem)
                <div class="row mt-5 foodItem-row" id="foodItem-row-{{ $foodItem->id }}">
                    <div class="col-md-2 d-flex align-items-center">
                        <img src="{{ asset('images/qhjpage/' . $foodItem->image) }}" class="foodItem-img">
                    </div>
                    <div class="col-md-3 foodItem-details">
                        <div class="items">{{ $foodItem->name }}</div>
                        <div class="d-flex">
                            <div class="price">$</div>
                            <div class="price" id="price-{{ $foodItem->id }}">{{ $foodItem->price }}</div>
                        </div>
                    </div>
                    <div class="col-md-4 foodItem-actions">
                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-button" onclick="decrement('number-span-{{ $foodItem->id }}', 'price-{{ $foodItem->id }}', 'total-price-{{ $foodItem->id }}')">-</button>
                            <span class="number-span fs-20" id="number-span-{{ $foodItem->id }}">0</span>
                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-button" onclick="increment('number-span-{{ $foodItem->id }}', 'price-{{ $foodItem->id }}', 'total-price-{{ $foodItem->id }}')">+</button>
                        </div>
                        <span id="total-price-{{ $foodItem->id }}" class="fs-20 total-price-forupdateSubtotal">$0</span>
                    </div>
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                        <button class="btn btn-link trash" onclick="removefoodItem('foodItem-row-{{ $foodItem->id }}')"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                @endforeach
                
                <div class="col-md-9 d-flex justify-content-end ml-5">
                    <h4 id="subtotal">總計:$0</h4>
                </div>
                <hr>
                <div class="container my-5">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="p-3">
                                <label class="form-check-label">請問你需要免洗餐具、吸管嗎？</label>
                                <div>
                                    <input type="radio" class="ml-2" id="yesOption" name="utensils"> 是
                                    <input type="radio" class="ml-2" id="noOption" name="utensils"> 否
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-between">
                            <label>選擇信用卡</label>
                            <select class="form-control" id="creditCardSelect">
                                <option>信用卡1</option>
                                <option>信用卡2</option>
                                <option>信用卡3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-3">
                                <label for="pickupTime">取餐時間:</label>
                                <div class="d-flex">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dateMenuButton" data-toggle="dropdown">日期</button>
                                    <div class="dropdown-menu" id="dateDropdown"></div>
                                    <div class="ml-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="hourMenuButton" data-toggle="dropdown">時</button>
                                        <div class="dropdown-menu" id="hourDropdown"></div>
                                    </div>
                                    <div class="ml-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="minuteMenuButton" data-toggle="dropdown">分</button>
                                        <div class="dropdown-menu" id="minuteDropdown">
                                            <a class="dropdown-item" href="#">00</a>
                                            <a class="dropdown-item" href="#">30</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-warning">確認付款</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-md">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('images/大專logo.png') }}" style="border-radius: 50%; width:15%" class="m-2">
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/order.js') }}"></script>
</body>
</html>
