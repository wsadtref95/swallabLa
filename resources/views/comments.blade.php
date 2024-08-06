@extends('layouts.app')

@section('title', '會員中心->我的訂單')

@section('content')
<div class="container p-0">
    <div class="row d-flex justify-content-center p-2 m-0 mt-5 mb-4">
        <div class="col-3 p-3">
            <ul class="p-0 m-0 bread">
                <li class="m-0">首頁</li>
                <li class="m-0">食記</li>
                <li class="m-0">火鍋</li>
            </ul>
            <div class="card author">
                <a href="./author.html">
                    <div class="card-body p-0">
                        <img src="{{ asset('images/other/winnie.webp') }}" alt="" class="img-fluid" />
                    </div>
                </a>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    小熊維尼
                </div>
            </div>
        </div>
        <div class="col-9 p-3">
            <h3>【台中】青花驕麻辣鍋(崇德店)王品集團麻辣鍋、酸菜白肉鍋火鍋餐廳 牛三拼盛宴比臉大氣勢十足</h3>
            <div class="mt-5">發布時間：<span>2024-07-20</span></div>
            <div class="d-flex justify-content-between align-items-center">
                <div>用餐時間：<span>2024-06-30</span></div>
                <div>
                    <i class="fa-regular fa-heart noColorHeart"></i>
                    <i class="fa-solid fa-heart colorHeart" id="heart"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                </div>
            </div>
            <article class="mt-4 bigArticle">
                <!-- 文章內容 -->
            </article>
        </div>
        <hr class="hrStyle">
        <div id="comment" class="p-4">
            <div class="d-flex justify-content-between align-items-center commentTitle">
                <h3 class="m-0">評論區</h3>
                <i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#myModal"></i>
            </div>
            <div class="modal fade" id="myModal" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content modal-bg">
                        <div class="modal-header">
                            <div>
                                <h4 class="modal-title">我要留言</h4>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">留言：</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <h2>留言列表</h2>
            @foreach ($comments as $comment)
                <div class="media mb-3">
                    <img src="{{ $comment->user->avatar }}" class="mr-3 rounded-circle" width="50" alt="{{ $comment->user->name }}">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $comment->user->name }}</h5>
                        <p>{{ $comment->comment }}</p>
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<img src="{{ asset('images/other/top.png') }}" alt="" class="top" id="top" />
<script src="{{ asset('js/demoHotpot.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
@endsection
