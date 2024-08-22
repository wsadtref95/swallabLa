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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/profilexi.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backstage.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .email {
            margin-top: 15px;
        }

        .fa-instagram {
            color: #E1306C;
        }

        .fa-facebook {
            color: #4267B2
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            outline: 0;
            background: rgba(0, 0, 0, 0.5);
        }


        .modal.show {
            display: block;
            overflow: auto;
        }


        .fa-facebook:hover,
        .fa-instagram:hover,
        .fa-threads:hover {
            transform: scale(1.2);
            cursor: pointer;

        }
    </style>
</head>


<body>
    <header>
        <div class="container-md">
            <div class="row ">
                <div class="col-6">
                    <a href="{{ url('http://localhost/swallabLa/swallab/public/headpage/headpage') }}"> <img
                            src="{{ asset('/images/other/logo.jpg') }}" style="border-radius: 50%; width:15%"
                            class="m-2 ">
                    </a>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="row">
            <div class="mySidebar col-2 mt-5">
                <a href="{{ route('profile.show') }}" class="active">
                    <p>個人檔案</p>
                </a>
                <a href="{{ url('/login/profile/order') }}">
                    <p>我的訂單</p>
                </a>
                <a href="#">
                    <p>歷史紀錄</p>
                </a>
                <a href="#">
                    <p>發布食記</p>
                </a>
            </div>
            <div class="col-9">
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-between">
                        <h4>編輯個人檔案</h4>
                    </div>
                </div>

                <div class="container mt-3">
                    <form id="profile-form" action="{{ route('profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="ml-5 d-flex">
                                <img id="avatar-display"
                                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('/images/other/deav.jpg') }}"
                                    style="width: 180px; height: auto; cursor: pointer;">
                                <input type="file" id="avatar-input" name="avatar" style="display: none;">
                                <div class="col-md-5 ml-5 ">
                                    <div class="form-group">
                                        <input type="text" placeholder="請輸入姓名" class="form-control" id="name"
                                            name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group adjusted">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $user->email }}" readonly>
                                    </div>
                                    <div class="icon mt-2">
                                        <i class="fa-brands fa-instagram mr-3"
                                            onclick="openSocialModal('Instagram')"></i>
                                        <i class="fa-brands fa-facebook mr-3" onclick="openSocialModal('Facebook')"></i>
                                        <i class="fa-brands fa-threads mr-3" onclick="openSocialModal('Threads')"></i>
                                    </div>
                                </div>
                                <div class="col-md-7 ml-5 ">
                                    <div class="form-group row">
                                        <div class="col-md-9">
                                            <input type="text" placeholder="請輸入電話" class="form-control" id="phone"
                                                name="phone" value="{{ $user->phone }}">
                                        </div>
                                    </div>

                                    {{-- <button class="d-flex delete">刪除帳戶</button> --}}

                                </div>
                            </div>
                        </div>
                        <div class="ml-5 mt-3 profile">個人簡介：
                            <div class="form-group mt-3 introduce">
                                <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
                            </div>
                        </div>
                        <div style="display: inline" class="ml-5">
                            <button type="submit" class="delete ml-1 mx-5 btn">完成編輯</button>

                        </div>

                    </form>
                    {{-- <div>
                        <button class="d-flex delete" data-toggle="modal"
                            data-target="#changePasswordModal">更改密碼</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- 通用社群帳戶填寫 Modal -->


    <div class="modal fade" id="socialModal">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #eee9d5">
                <div class="modal-header">
                    <h5 class="modal-title" id="socialModalLabel">填寫社群帳戶</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="socialForm">
                        <div class="form-group">
                            <label id="socialLabel"></label>
                            <input type="text" id="socialInput" class="form-control" placeholder="請輸入連結"
                                required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="color: white; background-color:rgb(229,166,122)"
                        onclick="saveSocialLink()">儲存</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container col-4">
        <div>
            <div class="d-flex align-items-center">
                <button class="btn ml-5 delete " style="position: relative; right:50px" data-toggle="modal"
                    data-target="#addCreditCardModal">
                    新增信用卡
                </button>
                <!-- 下拉選單 -->
                <div class="dropdown">
                    <button class="delete dropdown-toggle btn" type="button" id="savedCardsDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        查看信用卡
                    </button>
                    <div style="background-color:#eee9d5" class="dropdown-menu" aria-labelledby="savedCardsDropdown" id="savedCardsContainer">
                        <!-- 信用卡選項會動態生成 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 新增信用卡model -->
    <div class="modal fade" id="addCreditCardModal">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #eee9d5">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCreditCardModalLabel">新增信用卡</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="creditCardForm">
                        <div class="form-group">
                            <label>信用卡號碼</label>
                            <input type="text" id="creditCardInput" class="form-control"
                                placeholder="xxxx xxxx xxxx xxxx" maxlength="19" required>
                        </div>
                        <div class="form-group">
                            <label>到期日</label>
                            <input type="text" id="expiryDateInput" class="form-control" placeholder="MM/YY"
                                maxlength="5" required>
                        </div>
                        <div class="form-group">
                            <label>安全碼</label>
                            <input type="text" class="form-control" placeholder="XXX" maxlength="3" required>
                        </div>
                        <div class="form-group">
                            <label>持卡人姓名</label>
                            <input type="text" id="cardholderNameInput" class="form-control" placeholder="請輸入姓名"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="color: white; background-color:rgb(229,166,122)"
                                id="saveCreditCardButton" class="btn " onclick="saveCreditCard()">儲存</button>
                        </div>
                    </form> <!-- 確保結束標籤在所有內容之後 -->
                </div>
            </div>
        </div>
    </div>


    <button class="d-flex delete btn" style="position: absolute; left:900px; bottom:285px" data-toggle="modal"
        data-target="#changePasswordModal">更改密碼</button>
    <!-- 更改密碼model -->
    <div class="modal fade" id="changePasswordModal">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #eee9d5">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordLabel">更改密碼</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm" onsubmit="return handleChangePassword(event)">
                        @csrf
                        <div class="form-group">
                            <label>目前密碼</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>新的密碼</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>確認密碼</label>
                            <input type="password" name="new_password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn"
                            style="color: white; background-color:rgb(229,166,122)">儲存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('avatar-display').onclick = function() {
            document.getElementById('avatar-input').click();
        };


        document.getElementById('avatar-input').onchange = function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('avatar-display').src = URL.createObjectURL(file);
            }
        };


        // 自動格式化信用卡號碼和到期日
        document.getElementById('creditCardInput').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, ''); // 移除所有空格
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value; // 每4個數字添加一個空格


            // 確保總共最多19個字符（16個數字和3個空格）
            if (formattedValue.length > 19) {
                formattedValue = formattedValue.slice(0, 19);
            }


            e.target.value = formattedValue;
        });


        document.getElementById('expiryDateInput').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\//g, ''); // 移除所有斜線
            if (value.length > 2) {
                value = value.slice(0, 2) + '/' + value.slice(2); // 在第二位後添加斜線
            }
            e.target.value = value;
        });




        function saveCreditCard() {
            let creditCardNumber = document.getElementById('creditCardInput').value;
            let expiryDate = document.getElementById('expiryDateInput').value;
            let cardholderName = document.getElementById('cardholderNameInput').value;

            if (creditCardNumber && expiryDate) {
                fetch('{{ route('profile.updateCreditCard') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            card_number: creditCardNumber,
                            expiry_date: expiryDate,
                            cardholder_name: cardholderName
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("信用卡已成功儲存！");
                            window.location.reload(); // 儲存成功後刷新頁面
                        } else {
                            alert("信用卡已成功儲存！");
                            window.location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert("保存信用卡時出現錯誤，請稍後再試。");
                    });
            }
        }


        function closeModal() {
            const modal = document.getElementById('addCreditCardModal');
            modal.classList.remove('show');
            modal.style.display = 'none';
            document.body.classList.remove('modal-open');
            document.body.style.overflow = '';
            document.body.style.paddingRight = '';
        }


        document.getElementById('creditCardForm').addEventListener('submit', function(e) {
            e.preventDefault(); // 防止表單默認提交行為
            saveCreditCard();
        });




        // 顯示已儲存的信用卡
        function displaySavedCards() {
            let cards = [
                '{{ $user->credit_card_1 }}',
                '{{ $user->credit_card_2 }}',
                '{{ $user->credit_card_3 }}'
            ];

            let container = document.getElementById('savedCardsContainer');
            container.innerHTML = '';

            cards.forEach((card, index) => {
                if (card) {
                    let [number, expiry, cardholder] = card.split('|');

                    // 如果cardholder是undefined，則使用預設值
                    cardholder = cardholder || '未提供';

                    let cardElement = document.createElement('div');
                    cardElement.className = 'card mb-3';
                    cardElement.style = 'width: 18rem;';
                    cardElement.innerHTML = `
                <div class="card-body" style="background-color: #eee9d5">
                    <h5 class="card-title">信用卡 ${index + 1}</h5>
                    <p class="card-text"><strong>信用卡號碼:</strong> ${number || '未提供'}</p>
                    <p class="card-text"><strong>到期日:</strong> ${expiry || '未提供'}</p>
                    <p class="card-text"><strong>持卡人姓名:</strong> ${cardholder}</p>
                    <button class="btn btn-danger" onclick="deleteCreditCard(${index})">刪除</button>
                </div>
            `;
                    container.appendChild(cardElement);
                }
            });
        }


        // 刪除信用卡
        function deleteCreditCard(index) {
            fetch('{{ route('profile.deleteCreditCard') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        card_index: index
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("信用卡已刪除！");
                        window.location.reload(); // 刪除成功後刷新頁面
                    } else {
                        alert("刪除信用卡時出現錯誤，請稍後再試。");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("刪除信用卡時出現錯誤，請稍後再試。");
                });
        }


        // 初始化顯示已儲存的信用卡
        document.addEventListener('DOMContentLoaded', function() {
            displaySavedCards();
        });


        // 監聽模態框顯示事件
        document.getElementById('saveCreditCardButton').addEventListener('click', function() {
            document.getElementById('creditCardForm').reset();
        });




        function openSocialModal(platform) {
            // 設置 Modal 標題和輸入框的標籤
            document.getElementById('socialModalLabel').innerText = `填寫 ${platform} 帳戶`;
            document.getElementById('socialLabel').innerHTML = `${platform} 連結<br><br>`;

            // 顯示 Modal
            document.getElementById('socialModal').style.display = 'block';
            document.getElementById('socialModal').classList.add('show');
            document.body.classList.add('modal-open');
            document.body.style.overflow = 'hidden';
            document.body.style.paddingRight = '0px';

            // 获取并显示已保存的链接
            let userLink = '';
            if (platform.toLowerCase() === 'instagram') {
                userLink = '{{ $user->instagram }}';
            } else if (platform.toLowerCase() === 'facebook') {
                userLink = '{{ $user->facebook }}';
            } else if (platform.toLowerCase() === 'threads') {
                userLink = '{{ $user->threads }}';
            }

            if (userLink) {
                document.getElementById('socialInput').value = userLink;
            }
        }

        function closeSocialModal() {
            // 隱藏 Modal
            document.getElementById('socialModal').style.display = 'none';
            document.getElementById('socialModal').classList.remove('show');
            document.body.classList.remove('modal-open');
            document.body.style.overflow = '';
            document.body.style.paddingRight = '';
        }


        function saveSocialLink() {
            const platform = document.getElementById('socialModalLabel').innerText.split(' ')[1].toLowerCase();
            const link = document.getElementById('socialInput').value;

            if (link) {
                $.ajax({
                    url: '{{ route('profile.updateSocialLink') }}',
                    method: 'POST',
                    data: {
                        platform: platform, // 平台名稱 (instagram, facebook, threads)
                        link: link,
                        _token: '{{ csrf_token() }}' // CSRF token for security
                    },
                    success: function(response) {
                        // 提示保存成功
                        alert(`${platform.charAt(0).toUpperCase() + platform.slice(1)} 連結保存成功！`);
                        window.location.reload();
                        // 關閉 Modal
                        closeSocialModal();

                        // 清空輸入框
                        document.getElementById('socialInput').value = '';
                    },
                    error: function(xhr, status, error) {
                        alert('請輸入https格式。');
                    }
                });
            }
        }

        document.querySelector('.modal .close').addEventListener('click', closeSocialModal);
        document.querySelector('.modal .modal-footer .btn-primary').addEventListener('click', saveSocialLink);


        document.addEventListener('DOMContentLoaded', function() {
            const instagramLink = '{{ $user->instagram }}';
            const facebookLink = '{{ $user->facebook }}';
            const threadsLink = '{{ $user->threads }}';

            if (instagramLink) {
                const instagramIcon = document.querySelector('.fa-instagram');
                if (instagramIcon) {
                    instagramIcon.title = `查看 Instagram 連結: ${instagramLink}`;
                }
            }

            if (facebookLink) {
                const facebookIcon = document.querySelector('.fa-facebook');
                if (facebookIcon) {
                    facebookIcon.title = `查看 Facebook 連結: ${facebookLink}`;
                }
            }

            if (threadsLink) {
                const threadsIcon = document.querySelector('.fa-threads');
                if (threadsIcon) {
                    threadsIcon.title = `查看 Threads 連結: ${threadsLink}`;
                }
            }
        });


        function handleChangePassword(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            fetch('{{ route('profile.changePassword') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.success);
                        window.location.reload()

                        const modal = document.getElementById('changePasswordModal');
                        modal.classList.remove('show');
                        modal.style.display = 'none';
                        document.body.classList.remove('modal-open');
                        document.body.style.overflow = '';
                        document.body.style.paddingRight = '';

                    } else if (data.errors) {
                        alert(JSON.stringify(data.errors));
                        window.location.reload()
                    } else if (data.error) {
                        alert(data.error);
                        window.location.reload()
                    }
                })
                .catch(error => console.error('Error:', error));

            return false;
        }
    </script>
</body>


</html>
