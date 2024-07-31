<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>青花驕麻辣鍋</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/demoHotpot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
         <nav class="navbar navbar-expand bg-primary sticky-top shadow bg-body rounded">
        <div class="container-fluid">
            <!-- LOGO -->
            <a class="navbar-brand ms-5" href="#">
                <img src="../images/other/logo.jpg" alt="" class="logo d-inline-block align-text-top">
            </a>
            <!-- 伸縮 -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="nav ms-2 me-auto">
                    <div class="nav-item">
                        <!-- 首頁沒有 active -->
                        <!-- <a class="nav-link active" aria-current="page" href="#">Active</a> -->
                        <a class="nav-link d-block" style="white-space: nowrap;" href="#">找餐廳</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link d-block" style="white-space: nowrap;" href="#">看食記</a>
                    </div>
                </div>
                <!-- Input 都在這 -->
                <form class="ms-0 me-5" role="search" style="width: 100%;">
                    <div class="d-flex container-fluid py-3">
                        <!-- hover、click 換 icon -> src="./img/blog.png" -->
                        <img src="../images/other/restaurant.png" class="icon mt-2 me-2" alt="">
                        <!-- 搜尋框 + 情境按鈕(pill 會改成底線) -->
                        <div class="d-block container-fluid position-relative m-0 p-0">
                            <input class="form-control m-0" type="search" placeholder="Click" aria-label="Search">
                            <button class="position-absolute translate-middle rounded-pill"
                                style="display: block; margin-left: 10%; margin-top: 1.5em; white-space: nowrap;">
                                <img class="icon" src="../images/other/dating.png" alt="">約會
                            </button>
                            <button class="position-absolute translate-middle rounded-pill"
                                style="display: block; margin-left: 30%; margin-top: 1.5em; white-space: nowrap;">
                                <img class="icon" src="../images/other/group.png" alt="">聚餐
                            </button>
                            <button class="position-absolute translate-middle rounded-pill"
                                style="display: block; margin-left: 50%; margin-top: 1.5em; white-space: nowrap;">
                                <img class="icon" src="../images/other/confetti.png" alt="">慶生
                            </button>
                            <button class="position-absolute translate-middle rounded-pill"
                                style="display: block; margin-left: 70%; margin-top: 1.5em; white-space: nowrap;">
                                <img class="icon" src="../images/other/handshake.png" alt="">商務
                            </button>
                            <button class="position-absolute translate-middle rounded-pill"
                                style="display: block; margin-left: 90%; margin-top: 1.5em; white-space: nowrap;">
                                <img class="icon" src="../images/other/disabled-people.png" alt="">無障礙
                            </button>
                        </div>
                        <!-- 搜尋 icon = submit -->
                        <img src="../images/other/loupe.png" class="icon mt-2 ms-1" alt="" type="submit">
                    </div>
                </form>
                <!-- 登入及註冊按鈕 -->
                <div class="ms-auto me-5">
                    <a href="#" class="container-fluid">
                        <button class="btn btn-outline-success btn-sm">登入</button>
                    </a>
                    <a href="#" class="container-fluid">
                        <button class="btn btn-outline-danger btn-sm">註冊</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    </header>


    
   <div class="container p-0 " >
        <div class="row d-flex justify-content-center p-2 m-0 mt-5 mb-4">
            <!-- 左邊麵包屑+博主照片 -->
            <div class="col-3 p-3 " >
                <ul class="p-0 m-0 bread" >
                    <li class="m-0">首頁</li>
                    <li class="m-0">食記</li>
                    <li class="m-0">火鍋</li>
                </ul>
                <!-- 博主頭貼+名字 -->
                <div class="card author">
                    <a href="./author.html">
                        <div class="card-body p-0" >
                            <img src="../images/other/winnie.webp" alt="" class="img-fluid">
                        </div>
                    </a>
                    <div class="card-footer d-flex align-items-center justify-content-center" >
                        小熊維尼
                    </div>
                </div>
                
                
            </div>

            <!-- 右邊文章 -->
            <div class="col-9  p-3" >
                <h3>【台中】青花驕麻辣鍋(崇德店)王品集團麻辣鍋、酸菜白肉鍋火鍋餐廳 牛三拼盛宴比臉大氣勢十足</h3>
                <div class="mt-5" >發布時間：<span>2024-07-20</span></div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>用餐時間：<span>2024-06-30</span></div>
                    <!-- 下面這個<div>不可以刪掉 -->
                    <div>
                        <i class="fa-regular fa-heart noColorHeart"></i>
                        <i class="fa-solid fa-heart colorHeart" id="heart"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-facebook" ></i>
                    </div>
                </div>
                <!-- 內文 -->
                <article class="mt-4 bigArticle" >
                    <p class="mb-5" >
                        青花驕麻辣鍋是王品集團推出的麻辣鍋品牌餐廳，麻辣湯頭加入重慶的九葉青花椒熬煮，鮮麻香醇，非常吸引我。想不到幫同事的慶生聚餐，壽星就選定青花驕麻辣鍋崇德店，當餐廳人選丟出來的時候，我完全是舉雙手雙腳同意的啊🙋‍♀️預訂好日期後，大家一起騎車前往青花驕麻辣鍋報到！
                    </p>
                    <p class="mb-3" >
                        ▼青花驕麻辣鍋台中崇德店位於崇德路三段與崇德九路交叉口，附近美食還有奧樂美特、很牛炭燒牛排、森森燒肉、拾七石頭火鍋、八豆食府、本格和牛燒肉放題、尚牛二館…等，完全是個美食餐廳聚集地。
                    </p>
                    <img src="../images/foodnotes_demo/qhj_1.webp" alt="" class="mb-5">
                    <p class="mb-3" >
                        ▼青花椒麻辣鍋，湯頭喝起來微麻帶辣、香醇順口，不過可能是我嘴鈍，覺得重慶江津九葉青花椒的層次香氣不明顯，好喝但不特別。而鍋底的鴨血滑嫩、豆腐孔洞不算多但有入味好吃。
                    </p>
                    <img src="../images/foodnotes_demo/qhj_spicyhotpot.jpg" alt="" class="mb-5" >
                    <p class="mb-3" >
                        ▼青花椒麻口水雞，椒麻醬香氣十足，雞肉也蠻嫩的，好吃。
                    </p>
                    <img src="../images/foodnotes_demo/qhj_chicken.jpg" alt="" class="mb-5">
                    <p class="mb-3" >
                        ▼牛三拼盛宴(牛小排、雪花牛、牛梅花)，我最喜歡油脂分布均勻的牛小排，在熱湯裡輕涮至粉紅色就可以吃啦，香軟嫩口！
                    </p>
                    <img src="../images/foodnotes_demo/qhj_beef.jpg" alt="" class="mb-5">
                    <p class="mb-3" >
                        ▼仙氣海宴，這整盤~我只吃到了干貝，煮熟後軟彈帶嫩，不錯吃。
                    </p>
                    <img src="../images/foodnotes_demo/qhj_seafood.jpg" alt="" class="mb-5">
                    <p class="mb-3">
                        ▼鮮蝦滑、墨魚滑，鮮蝦滑吃得到蝦肉、墨魚滑也吃得到細小墨魚肉，蠻實在的。
                    </p>
                    <img src="../images/foodnotes_demo/qhj_shrimp.jpg" alt="" class="mb-5">
                    <p class="mb-3" >
                        ▼甜點冰糖銀耳，裡頭除了細細的銀耳還有枸杞，冰甜好喝，只有一小杯不夠啊~
                    </p>
                    <img src="../images/foodnotes_demo/qhj_dessert.jpg" alt="" class="mb-5">
                
                    <article>
                        <h5>青花驕麻辣鍋 台中崇德店</h5>
                        <p>均消：<span>600</span>~<span>900</span>元</p>
                        <p>電話：<span>04-2422-3286</span></p>
                        <p>地址：<span>台中市北屯區崇德路三段189號</span></p>
                        <p>營業時間：<span>11:00</span>~<span>1:00</span></p>
                    </article>
                </article>
            </div>

            <hr style="border: 2px solid black; width:80%">

            <!-- 留言區 -->
            <div class="p-4" >
                <div class="d-flex justify-content-between align-items-center commentTitle" >
                    <h3 class="m-0">評論區</h3>
                    <i class="fa-solid fa-pen-to-square"data-bs-toggle="modal" data-bs-target="#myModal"></i>
                </div>
                <!-- 留言的Modal -->
                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-bs-backdrop="static">
                    <div class="modal-dialog" >
                        <div class="modal-content modal-bg" >
                            <!-- Modal Header -->
                            <div class="modal-header" >
                                <div>
                                    <h4 class="modal-title" >我要留言</h4>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body p-4">
                                <form>
                                    <label for="message">留言：</label>
                                    <textarea id="message" name="message" rows="5"></textarea>
                                </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn login" data-bs-dismiss="modal">送出</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
                

            <div class="d-flex justify-content-center mt-4 m-0">
                <div class="row d-flex justify-content-center m-2 p-2 commentHeadphoto" >
                    <div class="col-4 d-flex flex-column align-items-center justify-content-center p-3" >
                        <img src="../images/other/小豬皮傑.jpg" alt="">
                        <div >小豬皮傑</div>
                    </div>
                    <div class="col-8 p-0 d-flex flex-column">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae debitis iure veritatis, totam, facere mollitia et recusandae molestiae vitae tenetur libero a incidunt rem neque accusantium vel. Doloremque, repellat. Debitis?
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem veritatis odio ea, maiores eaque nihil veniam vero non quasi? Ab ipsum eligendi accusantium ipsa ex totam quisquam eos enim unde!
                        </p>
                        <p style="align-self: flex-end; margin-right: 10px;">2024-07-20</p>
                    </div>
                </div>
            </div>
            <!-- <hr style="border: 2px solid black;"> -->

            <div class="d-flex justify-content-center mt-4 m-0">
                <div class="row d-flex justify-content-center m-2 p-2 commentHeadphoto" >
                    <div class="col-4 d-flex flex-column align-items-center justify-content-center p-3" >
                        <img src="../images/other/屹耳.webp" alt="">
                        <div >屹耳</div>
                    </div>
                    <div class="col-8 p-0 d-flex flex-column">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae debitis iure veritatis, totam, facere mollitia et recusandae molestiae vitae tenetur libero a incidunt rem neque accusantium vel. Doloremque, repellat. Debitis?
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem veritatis odio ea, maiores eaque nihil veniam vero non quasi? Ab ipsum eligendi accusantium ipsa ex totam quisquam eos enim unde!
                        </p>
                        <p style="align-self: flex-end; margin-right: 10px;">2024-06-30</p>
                    </div>
                </div>
            </div>
            <!-- <hr style="border: 2px solid black;"> -->

            <div class="d-flex justify-content-center mt-4 m-0">
                <div class="row d-flex justify-content-center m-2 p-2 commentHeadphoto" >
                    <div class="col-4 d-flex flex-column align-items-center justify-content-center p-3" >
                        <img src="../images/other/跳跳虎.jpg" alt="">
                        <div >跳跳虎</div>
                    </div>
                    <div class="col-8 p-0 d-flex flex-column">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae debitis iure veritatis, totam, facere mollitia et recusandae molestiae vitae tenetur libero a incidunt rem neque accusantium vel. Doloremque, repellat. Debitis?
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem veritatis odio ea, maiores eaque nihil veniam vero non quasi? Ab ipsum eligendi accusantium ipsa ex totam quisquam eos enim unde!
                        </p>
                        <p >2024-05-20</p>
                    </div>
                </div>
            </div>




        </div>
       
        



    </div>







    

 



                

    
    <!-- TOP按鈕 -->
    <img src="../images/other/top.png" alt="" class="top" id="top">

    <footer>
        <div class="container mt-3">
        <!-- 左右二欄 -->
        <div class="row justify-content-center">
            <!-- 左邊logo -->
            <div class="col-4">
                <img src="../images/other/logo.jpg" class="logo" alt="">
            </div>
            <!-- 右邊三列 -->
            <div class="col-4">
                <div class="row">
                    <button class="btn btn-outline-success">找餐廳</button>
                </div>
                <div class="row">
                    <button class="btn btn-outline-success">看食記</button>
                </div>
                <div class="row justify-content-center text-center">
                    <!-- 二個 icon -->
                    <a href="#" class="col-6">FBICON<img src="" alt=""></a>
                    <a href="#" class="col-6">IGICON<img src="" alt=""></a>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <span>© 版權聲明</span>
            </div>
        </div>
    </div>

    </footer>

    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/demoHotpot.js"></script>
</body>
</html>