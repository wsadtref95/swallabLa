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

        #btndelete {
            position: absolute;
            right: 150px;
        }

        #btnp {
            position: absolute;
            right: 280px;
        }

        #btnd {
            position: absolute;
            right: 380px;
        }

        #num {
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
                <hr>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-center">
                            {{-- <button class="btn btn-outline-primary mx-4">未付款</button>
                            <button class="btn btn-outline-primary mx-4">待確認</button>
                            <button class="btn btn-outline-primary mx-4">待出餐</button> --}}
                        </div>
                    </div>
                </div>
                <br>
                <h2 class="col-12 d-flex justify-content-center"><b>青花驕-公益店</b></h2>
                <br>
                <div id="cart-container">
                    {{-- 餐點顯示位置 --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        <script>
                            // 清空 localStorage 中的购物车
                            localStorage.removeItem('cart');
                            // 刷新购物车显示区域
                            loadOrderCart();
                        </script>
                    @endif
                </div>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-3">
                                        <label class="d-flex md-3">取餐時間:</label>
                                        <div class=" d-flex">
                                            <label class="mt-2" for="dateSelect">日</label>
                                            <label class="mt-2" for="dateSelect">期</label>
                                            <select id="dateSelect" class="ml-2">
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                            <div class="ml-3 d-flex">
                                                <select id="hourSelect">
                                                    <option value=""></option>
                                                </select>
                                                <label class="ml-2 mt-2">時</label>
                                            </div>
                                            <div class="ml-3 d-flex">
                                                <select id="minuteSelect">
                                                    <option>00</option>
                                                    <option>30</option>
                                                </select>
                                                <label class="ml-2 mt-2">分</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-end">
                        <form action="{{ route('order.store') }}" method="POST" id="orderForm">
                            @csrf
                            <input type="hidden" name="utensils" id="utensilsInput">
                            <input type="hidden" name="credit_card" id="creditCardInput">
                            <input type="hidden" name="pickup_date" id="pickupDateInput">
                            <input type="hidden" name="pickup_time" id="pickupTimeInput">
                            <input type="hidden" name="cart_items" id="cartItemsInput">
                            <input type="hidden" name="total" id="totalInput">

                            <button type="submit" class="btn btn-warning mt-5">確認付款</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    {{-- <script src="{{ asset('js/order.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/ordercart.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        document.getElementById('orderForm').addEventListener('submit', function(event) {

            document.getElementById('utensilsInput').value = document.querySelector(
                'input[name="utensils"]:checked').id === 'yesOption' ? 1 : 0;
            document.getElementById('creditCardInput').value = document.getElementById('creditCardSelect').value;
            document.getElementById('pickupDateInput').value = document.getElementById('dateSelect').value;
            document.getElementById('pickupTimeInput').value = document.getElementById('hourSelect').value + ':' +
                document.getElementById('minuteSelect').value;


            const cartItems = localStorage.getItem('cart');
            document.getElementById('cartItemsInput').value = cartItems;


            const cart = JSON.parse(cartItems);
            let total = 0;
            cart.forEach(item => {
                total += item.price * item.quantity;
            });
            document.getElementById('totalInput').value = total;
        });
        const yesOption = document.getElementById('yesOption');
        const noOption = document.getElementById('noOption');


        yesOption.addEventListener('change', function() {
            if (this.checked) {
                console.log(1);
            }
        });


        noOption.addEventListener('change', function() {
            if (this.checked) {
                console.log(0);
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            let today = new Date();

            today = new Date(today.toLocaleString("en-US", {
                timeZone: "Asia/Taipei"
            }));

            let dateOptions = [
                today.toLocaleDateString(),
                new Date(today.setDate(today.getDate() + 1)).toLocaleDateString(),
                new Date(today.setDate(today.getDate() + 1)).toLocaleDateString()
            ];

            let dateSelect = document.getElementById('dateSelect');
            let options = dateSelect.getElementsByTagName('option');

            for (let i = 0; i < options.length; i++) {
                options[i].textContent = dateOptions[i];
                options[i].value = dateOptions[i];
            }


            dateSelect.selectedIndex = 0;
        })
        const assetBaseUrlShowCart = "{{ asset('storage/photos') }}";
        console.log(localStorage.getItem('cart'));
        // console.log('ordercart.js loaded');
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
                totalRow.innerHTML = `總計: $${total.toFixed(0)} <hr>`;
                cartContents.appendChild(totalRow);
            }
            // else {
            //     cartContents.innerHTML = '<br><h4>購物車為空</h4>';
            // }
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

        function pickupTime() {
            let x = new Date().toISOString();
            var form = new FormData();
            form.append("current_time", x);

            $.ajax({
                url: "{{ url('/get-pickup-time') }}",
                method: "POST",
                data: {
                    current_time: x,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#hourSelect').empty();
                    let startHour = response.hour;
                    let endHour = 24;

                    for (let i = startHour; i < endHour; i++) {
                        $('#hourSelect').append($('<option>', {
                            value: i,
                            text: i
                        }));
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Request failed: " + textStatus + ", " + errorThrown);
                }
            });
        }

        $(document).ready(function() {
            pickupTime();

        });

        const dateSelect = document.getElementById('dateSelect');
        const hourSelect = document.getElementById('hourSelect');
        const minuteSelect = document.getElementById('minuteSelect');
        dateSelect.addEventListener('change', function() {
            console.log('選擇的日期:', dateSelect.value);
        });

        hourSelect.addEventListener('change', function() {
            console.log('選擇的時間:', hourSelect.value + '時');
        });

        minuteSelect.addEventListener('change', function() {
            console.log('選擇的分鐘:', minuteSelect.value + '分');
        });


        const creditCardSelect = document.getElementById('creditCardSelect');


        creditCardSelect.addEventListener('change', function() {
            console.log('選擇的信用卡:', creditCardSelect.value);
        });
    </script>

@endsection
