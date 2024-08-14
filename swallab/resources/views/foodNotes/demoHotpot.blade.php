@extends('layouts.app')

@section('title', '青花驕麻辣鍋')

@section('content')
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/demoHotpot.css') }}">
<link href="{{ asset('css/root.css') }}" rel="stylesheet">
<link href="{{ asset('css/nav.css') }}" rel="stylesheet">
<link href="{{ asset('css/footer.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



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
                <div class="card-footer d-flex align-items-center justify-content-center" style="padding:10px;height:auto">
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
                <p class="mb-5">
                    青花驕麻辣鍋是王品集團推出的麻辣鍋品牌餐廳，麻辣湯頭加入重慶的九葉青花椒熬煮，鮮麻香醇，非常吸引我。想不到幫同事的慶生聚餐，壽星就選定青花驕麻辣鍋崇德店，當餐廳人選丟出來的時候，我完全是舉雙手雙腳同意的啊🙋‍♀️預訂好日期後，大家一起騎車前往青花驕麻辣鍋報到！
                </p>
                <p class="mb-3">
                    ▼青花驕麻辣鍋台中崇德店位於崇德路三段與崇德九路交叉口，附近美食還有奧樂美特、很牛炭燒牛排、森森燒肉、拾七石頭火鍋、八豆食府、本格和牛燒肉放題、尚牛二館…等，完全是個美食餐廳聚集地。
                </p>
                <img src="{{ asset('images/foodnotes_demo/qhj_1.webp') }}" alt="" class="mb-5" />
                <p class="mb-3">
                    ▼青花椒麻辣鍋，湯頭喝起來微麻帶辣、香醇順口，不過可能是我嘴鈍，覺得重慶江津九葉青花椒的層次香氣不明顯，好喝但不特別。而鍋底的鴨血滑嫩、豆腐孔洞不算多但有入味好吃。
                </p>
                <img src="{{ asset('images/foodnotes_demo/qhj_spicyhotpot.jpg') }}" alt="" class="mb-5" />
                <p class="mb-3">
                    ▼青花椒麻口水雞，椒麻醬香氣十足，雞肉也蠻嫩的，好吃。
                </p>
                <img src="{{ asset('images/foodnotes_demo/qhj_chicken.jpg') }}" alt="" class="mb-5" />
                <p class="mb-3">
                    ▼牛三拼盛宴(牛小排、雪花牛、牛梅花)，我最喜歡油脂分布均勻的牛小排，在熱湯裡輕涮至粉紅色就可以吃啦，香軟嫩口！
                </p>
                <img src="{{ asset('images/foodnotes_demo/qhj_beef.jpg') }}" alt="" class="mb-5" />
                <p class="mb-3">
                    ▼仙氣海宴，這整盤~我只吃到了干貝，煮熟後軟彈帶嫩，不錯吃。
                </p>
                <img src="{{ asset('images/foodnotes_demo/qhj_seafood.jpg') }}" alt="" class="mb-5" />
                <p class="mb-3">
                    ▼鮮蝦滑、墨魚滑，鮮蝦滑吃得到蝦肉、墨魚滑也吃得到細小墨魚肉，蠻實在的。
                </p>
                <img src="{{ asset('images/foodnotes_demo/qhj_shrimp.jpg') }}" alt="" class="mb-5" />
                <p class="mb-3">
                    ▼甜點冰糖銀耳，裡頭除了細細的銀耳還有枸杞，冰甜好喝，只有一小杯不夠啊~
                </p>
                <img src="{{ asset('images/foodnotes_demo/qhj_dessert.jpg') }}" alt="" class="mb-5" />

                <article>
                    <h5>青花驕麻辣鍋 台中崇德店</h5>
                    <p>均消：<span>600</span>~<span>900</span>元</p>
                    <p>電話：<span>04-2422-3286</span></p>
                    <p>地址：<span>台中市北屯區崇德路三段189號</span></p>
                    <p>營業時間：<span>11:00</span>~<span>1:00</span></p>
                </article>
            </article>
        </div>
        <hr class="hrStyle">

        <div class="p-4">
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
                        <div class="modal-body" style="margin:auto;position:relative">
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $id }}">
                                <!-- <div class="form-group">
                                    <label for="comment">留言：</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                                </div> -->
                                <div class="modal-body">
                                    <label for="comment" class="mb-3">留言：</label>
                                    <textarea id="comment" name="comment" rows="5" class="form-control" style="width:400px" required></textarea>
                                </div>
                                
                                <div class="modal-footer mt-3">
                                    {{-- <button type="submit" class="btn">提交</button> --}}
                                    <button type="submit" class="btn" id="btnSubmit" style="position: absolute;right:28px;bottom:10px;">送出</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="messages-container">
                @foreach ($comments as $comment)
                    <div class="d-flex justify-content-center mt-4 m-0">
                        <div class="row d-flex justify-content-center m-2 p-2 commentHeadphoto">
                            <div class="col-4 d-flex flex-column align-items-center justify-content-center p-3">
                                <img src="{{ $comment->user->avatar_url }}" alt="{{ $comment->user->name }}" />
                                <div>{{ $comment->user->name }}</div>
                            </div>
                            <div class="col-8 p-0 d-flex flex-column">
                                <p>{{ $comment->comment }}</p>
                                <p>{{ \Carbon\Carbon::parse($comment->created_at)->locale('zh_TW')->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<img src="{{ asset('images/other/top.png') }}" alt="" class="top" id="top" />



<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
<script src="{{ asset('js/demoHotpot.js') }}"></script>
<script src="{{ asset('js/footer.js') }}"></script>
@endsection
