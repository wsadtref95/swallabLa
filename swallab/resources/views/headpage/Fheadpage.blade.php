<!-- resources/views/headpage/headpage.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/headpage.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>HeadPage</title>
</head>

<body>
    <!-- NAV_begin : sticky-top -->
    <nav class="navbar navbar-expand sticky-top shadow">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand ms-5 col-1" href="{{ route('headpage') }}">
                <img src="{{ asset('images/root/logo.jpg') }}" alt=""
                    class="logo d-inline-block align-text-top">
            </a>
            <!-- 伸縮 -->
            <div class="collapse navbar-collapse col-10" id="navbarSupportedContent">
                <div class="nav ms-0 me-3 row">
                    <div class="nav-item col-6">
                        <a class="nav-link d-block nav_mainbtn" href="{{ url('/login') }}">找餐廳</a>
                    </div>
                    <div class="nav-item col-6">
                        <a class="nav-link d-block nav_mainbtn" href="{{ url('/login') }}">看食記</a>
                    </div>
                </div>
                <!-- Input 都在這 -->
                <form class="ms-2 me-1 w-100" role="search" name="search">
                    <div class="d-flex" style="width: 100%;">
                        {{-- class="theicon" --}}
                        <div id="theicon" class=" mt-2 me-0 align-items-center justify-content-center">
                            {{-- <div id="popup"
                                class="popup row text-center d-flex align-items-center justify-content-center">
                                <p><i id="showicon" class=""></i></p>
                            </div>
                            <div id="popupBR" class="popupBR">
                                <div id="popupBlog" class="col-6 text-center">
                                    <p class="text-center"><i class="fa-solid fa-book-open"></i></p>
                                </div>
                                <div id="popupRest" class="col-6 text-center">
                                    <p><i class="fa-solid fa-utensils"></i></p>
                                </div>
                            </div> --}}
                        </div>

                        <!-- 搜尋框 + 情境按鈕(pill 會改成底線) -->
                        <div class="d-block position-relative m-0 p-0 col">
                            <div style="display: flex;" clas="row">
                                <div class="col-6">
                                    <input type="text" id="myInput" onclick="myFunction()" placeholder="點擊我"
                                        class="form-control m-0">
                                    <div id="myDropdown" class="dropdown-content"
                                        style="display: none; position: absolute;">
                                        <a href="#cate_no" onclick="fillInput('null')"
                                            class="position-relative">不挑分類</a>
                                        <a href="#cate_hotpot" onclick="fillInput('火鍋')"
                                            class="position-relative">火鍋</a>
                                        <a href="#cate_bbq" onclick="fillInput('燒肉')" class="position-relative">燒肉</a>
                                        <a href="#cate_izakaya" onclick="fillInput('居酒屋')"
                                            class="position-relative">居酒屋</a>
                                        <a href="#cate_ramen" onclick="fillInput('拉麵')" class="position-relative">拉麵</a>
                                        <a href="#cate_dessert" onclick="fillInput('甜點')"
                                            class="position-relative">甜點</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input type="text" id="myInput2" onclick="myFunction2()" placeholder="點擊我"
                                        class="form-control m-0 col-6">
                                    <div id="myDropdown2" class="dropdown-content"
                                        style="display: none; position: absolute;">
                                        <a href="#loc_no" onclick="fillInput2('null')"
                                            class="position-relative">不挑地區</a>
                                        <a href="#loc_Taichung" onclick="fillInput2('台中市')"
                                            class="position-relative">台中市</a>
                                        <a href="#loc_1" onclick="fillInput2('選項2')"
                                            class="position-relative">選項2</a>
                                        <a href="#loc_2" onclick="fillInput2('選項3')"
                                            class="position-relative">選項3</a>
                                    </div>
                                </div>
                            </div>

                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 10%;">
                                <img class="icon" src="{{ asset('images/nav_icon/dating.png') }}" alt="">約會
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 30%;">
                                <img class="icon" src="{{ asset('images/nav_icon/group.png') }}" alt="">聚餐
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 50%;">
                                <img class="icon" src="{{ asset('images/nav_icon/confetti.png') }}"
                                    alt="">慶生
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 70%;">
                                <img class="icon" src="{{ asset('images/nav_icon/handshake.png') }}"
                                    alt="">商務
                            </button>
                            <button class="position-absolute translate-middle rounded-pill filter_btn"
                                style="margin-left: 90%;">
                                <img class="icon" src="{{ asset('images/nav_icon/disabled-people.png') }}"
                                    alt="">無障礙
                            </button>
                        </div>
                        <input type="image" src="{{ asset('images/nav_icon/loupe.png') }}" class="icon mt-2 ms-0"
                            onclick="document.search.submit()">
                    </div>
                </form>
                <!-- 登入及註冊按鈕 -->
                <div class="ms-3 me-5 col-1">

                    <a href="{{ url('/login') }}">
                        <button class="btn btn-sm btnLogin text-nowrap">登入/註冊</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAV_end -->

    <!-- Main_begin -->
    <main>
        <div class="w-100 container-fluid d-flex flex-column align-items-center" style="flex:1">
            <!-- 品牌介紹 -->
            <div class="bg-primary row align-self-center w-100">
                <div class="fs-1 fw-bold text-center my-4">Swallab</div>
                <article class="bg-danger text-center w-100">
                    <span>
                        吃，除了吃飽，可以吃好，還可以吃得巧妙<br>
                        吃可以是日常生活的一個小實驗<br>
                        實驗你與餐廳的匠心<br>
                        實驗你與其他人的默契<br>
                        實驗你自己的餐飲慣習<br>
                    </span>
                </article>
            </div>
            <!-- 大門二欄 -->
            <div class="row justify-content-center w-100 mt-3">
                <div class="col-md-5 d-flex flex-column align-items-center justify-content-center mt-3">
                    <div id="mainImageRest" class="mb-3">
                        <img src="{{ asset('images/headpage_mainphoto/main_rest.jpeg') }}" alt="找餐廳"
                            class="img-fluid">
                    </div>
                    <div class="row justify-content-center w-100" id="btnRest">
                        <a href="#" class="btn btn-outline-danger text-center w-50">找餐廳</a>
                    </div>
                </div>
                <div class="col-md-5 d-flex flex-column align-items-center justify-content-center mt-3">
                    <div id="mainImageNotes" class="mb-3">
                        <img src="{{ asset('images/headpage_mainphoto/main_notes.jpeg') }}" alt="看食記"
                            class="img-fluid">
                    </div>
                    <div class="row justify-content-center w-100" id="btnNotes">
                        <a href="#" class="btn btn-outline-danger text-center w-50">看食記</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main_end -->

    <!-- Footer_begin -->
    <footer class="myFooter mt-3">
        <!-- 左右二欄 -->
        <div class="row justify-content-center mt-3 container">
            <!-- 左邊logo -->
            <div class="col-4 text-center"></div>
            <div class="col-2 justify-content-center">
                <img src="{{ asset('images/root/logo.jpg') }}" class="logo" alt="">
                <div class="text-center">
                    <span class="rights text-nowrap">© 版權聲明</span>
                </div>
            </div>
            <!-- 右邊三列 -->
            <div class="col-2">
                <div class="">
                    <a class="btn btnFooter text-nowrap">找餐廳</a>
                </div>
                <div class="">
                    <a class="btn btnFooter text-nowrap">看食記</a>
                </div>
                <div class="row justify-content-center">
                    <!-- 二個 icon -->
                    <a href="#" class="col-6 text-center">
                        <i class="fa-brands fa-facebook"></i> <!-- facebook -->
                    </a>
                    <a href="#" class="col-6 text-center">
                        <i class="fa-brands fa-instagram"></i> <!-- instagram -->
                    </a>
                </div>
            </div>
            <div class="col-4 text-center"></div>
        </div>
    </footer>
    <!-- Footer_end -->

    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/headpage_opendoor_animate.js') }}"></script>
    <script scr="{{ asset('js/nav.js') }}"></script>
    <script src="{{ asset('js/footer.js') }}"></script>
</body>

</html>
