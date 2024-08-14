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
                        <h4>會員中心 -> 編輯個人檔案</h4>
                    </div>
                </div>
                <div class="container mt-3">
                    <form id="profile-form" action="{{ route('profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="ml-5 d-flex">
                                <img id="avatar-display"
                                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('/images/other/default-avatar.jpg') }}"
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
                                    <!-- 通用社群帳戶填寫 Modal -->
                                    <div class="modal fade" id="socialModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
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
                                                            <input type="text" id="socialInput" class="form-control"
                                                                placeholder="請輸入連結" required>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="saveSocialLink()">儲存</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 ml-5 ">
                                    <div class="form-group">
                                        <input type="text" placeholder="請輸入電話" class="form-control" id="phone"
                                            name="phone" value="{{ $user->phone }}">
                                    </div>
                                    <button class="d-flex delete" data-toggle="modal"
                                        data-target="#changePasswordModal">更改密碼</button>
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
                            <button type="submit" class="delete ml-1 "><a style="text-decoration: none ; color:#fff" href="http://localhost/swallabLa/swallab/public/profile">完成編輯 </a></button>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <!-- 更改密碼model -->
    <div class="modal fade" id="changePasswordModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordLabel">更改密碼</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>目前密碼</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>新的密碼</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>確認密碼</label>
                            <input type="password" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">儲存</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <footer>
        <div class="container-md">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('image/大專logo.png') }}" style="border-radius: 50%; width:15%" class="m-2 ">
                </div>
            </div>
        </div>
    </footer> --}}
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

        function openSocialModal(platform) {
            // 設置 Modal 標題和輸入框的標籤
            document.getElementById('socialModalLabel').innerText = `填寫 ${platform} 帳戶`;
            document.getElementById('socialLabel').innerText = `${platform} 連結`;

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

                        // 關閉 Modal
                        closeSocialModal();

                        // 清空輸入框
                        document.getElementById('socialInput').value = '';
                    },
                    error: function(xhr, status, error) {
                        alert('保存連結時出現錯誤，請稍後再試。');
                    }
                });
            }
        }


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
    </script>
</body>


</html>
