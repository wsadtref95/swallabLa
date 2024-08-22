@extends('layouts.app')

@section('title', 'HeadPage')

@section('content')
    <!-- Main_begin -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/root.css">
        <link rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/headpage.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- <link rel="stylesheet" href="style.css"> -->
        <title>HeadPage</title>
        <style>
            .myTitle {
                /* font-family: 'Noto Sans TC', sans-serif; */
                font-size: 6em;
                font-weight: bolder;
                text-align: center;
                color: #b67546;
                font-weight: bold;
                text-decoration: none;
                margin-bottom: 8%;
                position: relative;
                top: 40px;
            }

            article {
                font-size: 1.5em;
                text-align: center;
                margin-bottom: 5%;
            }
        </style>
    </head>
    <main>
        <div class="w-100 container-fluid d-flex flex-column align-items-center" style="flex:1">
            <!-- 品牌介紹 -->
            <div class="w-100 container-fluid" style="flex:1">
                <!-- 品牌介紹 -->
                <div class="row align-self-center">
                    <div class="myTitle">Swallab</div>
                    <article>
                        吃，除了吃飽，可以吃好，還可以吃得巧妙<br>
                        吃可以是日常生活的一個小實驗<br>
                        實驗你與大廚的匠心<br>
                        實驗你與其他人的默契<br>
                        實驗你自己的餐飲慣習<br><br>
                        歡迎來到食嚥室<br>
                        讓我們一起探索大街小巷的美食！<br>
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
                            <a href="{{ url('') }}" class="btn btn-outline-danger text-center w-50">看食記</a>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!-- Main_end -->


@endsection
