@extends('layouts.app')

@section('title', '會員中心->我的訂單')

@section('content')
    <style>
        #cart-container .cart-item {
            margin-bottom: 1.5rem;
        }

        #cart-container img {
            width: 100px;
            height: auto;
            margin-right: 1.5rem;
        }

        #cart-container .btn {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin-right: 0.5rem;
            margin-left: 0.5rem;
        }

        #cart-container .total-amount {
            margin-top: 3rem;
            font-size: 1.5rem;
            text-align: right;
        }

        #btndelete{
            position: absolute;
            right: 150px;
        }

        #btnp{
            position: absolute;
            right: 280px;
        }
        #btnd{
            position: absolute;
            right: 380px;
        }

        #num{
            position: absolute;
            right: 355px;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="mySidebar col-2">
                <a href="{{ url('/login/profile') }}">
                    <p>個人檔案</p>
                </a>
                <a href="" class="active">
                    <p>我的訂單</p>
                </a>
                <a href="">
                    <p>歷史紀錄</p>
                </a>
                <a href="">
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
                <div id="cart-container">
                    {{-- 餐點顯示位置 --}}
                </div>
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
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dateMenuButton"
                                    data-toggle="dropdown">
                                    日期
                                </button>
                                <div class="dropdown-menu" id="dateDropdown"></div>
                                <div class="ml-2">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        id="hourMenuButton" data-toggle="dropdown">
                                        時
                                    </button>
                                    <div class="dropdown-menu" id="hourDropdown"></div>
                                </div>
                                <div class="ml-2">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        id="minuteMenuButton" data-toggle="dropdown">
                                        分
                                    </button>
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
    <script src="{{ asset('js/order.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('js/ordercart.js') }}"></script> --}}
    <script>
        const assetBaseUrlShowCart = "{{ asset('storage/photos') }}";
        console.log(localStorage.getItem('cart'));

        console.log('ordercart.js loaded');

        document.addEventListener('DOMContentLoaded', function() {
            loadOrderCart();
        });

        function loadOrderCart() {
            const cartContents = document.getElementById('cart-container');
            const storedCart = localStorage.getItem('cart');
            if (storedCart) {
                const cart = JSON.parse(storedCart);
                cartContents.innerHTML = '';
                let total = 0;

                cart.forEach((item, index) => {
                    const itemRow = document.createElement('div');
                    itemRow.classList.add('d-flex', 'align-items-center', 'justify-content-between', 'mb-4',
                        'cart-item');
                    itemRow.innerHTML = `
                <div class="d-flex align-items-center">
                    <img src="${assetBaseUrlShowCart}/${item.photo}" style="width: 100px; height: auto;" class="me-4">
                    <div>
                        <div>${item.name}</div>
                        <div>$${item.price} x ${item.quantity}</div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button id="btnd" class="btn btn-outline-secondary rounded-circle me-2" onclick="updateQuantity(${index}, ${item.quantity - 1})">-</button>
                    <span id="num">${item.quantity}</span>
                    <button id="btnp" class="btn btn-outline-secondary rounded-circle ms-2" onclick="updateQuantity(${index}, ${item.quantity + 1})">+</button>
                    <button id="btndelete" class="btn btn-outline-secondary rounded-circle ms-4" onclick="removeItem(${index})"><i class="fas fa-trash-alt"></i></button>
                </div>
                <div class="fw-bold ms-4">$${(item.price * item.quantity).toFixed(0)}</div>
            `;
                    cartContents.appendChild(itemRow);
                    total += item.price * item.quantity;
                });

                const totalRow = document.createElement('div');
                totalRow.classList.add('fw-bold', 'mt-5', 'total-amount');
                totalRow.innerText = `總計: $${total.toFixed(0)}`;
                cartContents.appendChild(totalRow);
            } else {
                cartContents.innerHTML = '<p>購物車為空</p>';
            }
        }

        function updateQuantity(index, newQuantity) {
            let cart = JSON.parse(localStorage.getItem('cart'));
            if (newQuantity <= 0) {
                cart.splice(index, 1); // 移除項目
            } else {
                cart[index].quantity = newQuantity;
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            loadOrderCart();
        }

        function removeItem(index) {
            let cart = JSON.parse(localStorage.getItem('cart'));
            cart.splice(index, 1); // 移除項目
            localStorage.setItem('cart', JSON.stringify(cart));
            loadOrderCart();
        }
    </script>
@endsection
