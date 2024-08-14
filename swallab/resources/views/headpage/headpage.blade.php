@extends('layouts.app')

@section('title', '餐廳內頁')

@section('content')
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
                        <img  src="{{ asset('images/headpage_mainphoto/main_notes.jpeg') }}" alt="看食記"
                            class="img-fluid">
                    </div>
                    <div class="row justify-content-center w-100" id="btnNotes">
                        <a href="{{url("")}}" class="btn btn-outline-danger text-center w-50">看食記</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main_end -->


@endsection
