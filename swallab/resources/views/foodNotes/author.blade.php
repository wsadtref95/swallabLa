<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作者個人頁面</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/author.css">
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


    
   <div class="container p-0">
        <div class="row d-flex justify-content-center p-0 mt-5 mb-2">
            <!-- 個人資訊 -->
            <img src="../images/other/winnie.webp" class="img-fluid col-4 p-0 headphoto"></img>
            <div class="col-8 p-3">
                <div class="d-flex justify-content-center align-items-center p-3">
                    <div  class="d-flex" style="gap:150px;">
                        <!-- 下面這個<div>不可以刪掉 -->
                        <div>
                            <div class="d-flex justify-content-center align-items-center">
                                <h3 class="authorName" style="margin-bottom: 40px;">小熊維尼</h3>
                            </div>
                            <div class="social-icon">
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-facebook" ></i>
                                <i class="fa-brands fa-threads"></i>
                            </div>
                        </div>
                        <!-- 下面這個<div>不可以刪掉 -->
                        <div>
                            <div class="d-flex justify-content-center align-items-center">
                                <h4 class="followTitle">
                                    <strong>30</strong> 追蹤中 
                                    <strong id="fans">20</strong> 粉絲
                                </h4>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn follow" >+ 追蹤</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 個人簡介 -->
                <div class="w-100 p-4">
                    <h5>個人簡介：</h5>
                    <div class="mt-2 p-2 information">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam doloribus nesciunt hic? Laborum doloremque quae numquam soluta eius voluptatem necessitatibus ratione aliquam aspernatur consequatur voluptas, eaque ea ad, consectetur facere?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad non vitae quae voluptates, consectetur error delectus est praesentium omnis assumenda quo quas exercitationem? Sint optio doloribus sunt, assumenda nesciunt ipsam?
                    </div>
                </div>
            </div>
                <!-- <hr style="border:2px solid black"> -->
            <!-- 博主之前發表過的食記 -->
            <div class="mt-5 mb-5 p-0">
                <div class="d-flex justify-content-center mt-4 m-0">
                    <div class="row d-flex justify-content-center m-2 p-0 foodNotes-bg">
                        <img src="../images/hotpot/qinghj.jpg" alt="" class="col-5 m-4">
                        <div class="col-7 d-flex align-items-center ">
                            <div class="p-4">
                                <h4  class="mb-4">青花驕</h4>
                                <div class="ellipsis-6 history" >
                                    青花驕麻辣鍋是王品集團推出的麻辣鍋品牌餐廳，麻辣湯頭加入重慶的九葉青花椒熬煮，鮮麻香醇，非常吸引我。想不到幫同事的慶生聚餐，壽星就選定青花驕麻辣鍋崇德店，當餐廳人選丟出來的時候，我完全是舉雙手雙腳同意的啊🙋‍♀️預訂好日期後，大家一起騎車前往青花驕麻辣鍋報到！<br>
                                    【青花驕麻辣鍋 台中崇德店】<br>
                                    📞電話：04-2422-3286 <br>
                                    🏡地址：台中市北屯區崇德路三段189號 <br>
                                    💰鍋底費130元/人；鴛鴦鍋每桌+收150元；青麻椒肥牛鍋每桌+收298元；每人低消300元(需加收10%服務費) <br>
                                    👶120cm以下兒童不收費
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4 m-0">
                    <div class="row d-flex justify-content-center m-2 p-0 foodNotes-bg">
                        <img src="../images/hotpot/roudd.png" alt="" class="col-5 m-4">
                        <div class="col-7 d-flex align-items-center ">
                            <div class="p-4">
                                <h4  class="mb-4">肉多多</h4>
                                <div class="ellipsis-6 history" >
                                    最近天氣終於變冷，最適合吃個暖暖的火鍋。說到火鍋，一定會想到已經開了近50家分店的「肉多多火鍋」。台中火鍋店的選擇有不少家，所以其實我已經一陣子沒去吃肉多多火鍋了啦。這次多虧了住在廣三SOGO附近的朋友約我去肉多多火鍋店慶生，我才發現肉多多火鍋進步不少，跟以前很不一樣了耶！肉品、湯頭都做了改版大升級，難怪最近幾年肉多多火鍋在網路上的評價相當高。
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4 m-0">
                    <div class="row d-flex justify-content-center m-2 p-0 foodNotes-bg">
                        <img src="../images/bbq/wuma.jpg" alt="" class="col-5 m-4">
                        <div class="col-7 d-flex align-items-center ">
                            <div class="p-4">
                                <h4  class="mb-4">屋馬燒肉</h4>
                                <div class="ellipsis-6 history" >
                                    屋馬燒肉｜訂位很容易爆滿的知名台中燒肉店，屋馬菜單怎麼點才划算?
                                    台中最熱門最難訂位的燒肉店《屋馬燒肉》，跟茶六燒肉都是相當有名，《屋馬燒肉》在台北是沒有分店的，只有7家分店全部都是在台中，如果想要吃的話《屋馬燒肉》一定要先訂位，建議是屋馬燒肉線上訂位比較快，點餐方式有分套餐跟單點，大部份都是點套餐比較划算，套餐有前菜、肉品、海鮮與甜點等等，絕對是可以吃得飽的，網友說免費雞湯一定要喝。
                                </div>
                            </div>
                        </div>
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
    <script src="../js/author.js"></script>
</body>
</html>