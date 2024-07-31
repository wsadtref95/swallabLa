<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>食記首頁</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/foodNotes.css">
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
        <!-- 最新文章1+2 -->
        <div class="row p-0 title">
            <div class="col-8 p-0">
                <div class="height500">
                    <img src="../images/bbq/hutong.jpg" class="img-fluid">
                    <div class="text-con">
                        <p class="ellipsis">胡同燒肉-燒肉食材新鮮就是王道，還有專人代烤、貼心解說服務，讓人怎能不愛呢。</p>
                        <p></p>
                        <p class="latestDate-1">2024/7/14</p>
                    </div>
                </div>
            </div>
            <div class="col-4 row p-0">
                <div class="col-12">
                    <div class="img-con">
                        <img src="../images/dessert/shichu.jpg">
                        <div class="text-con">
                            <p class="ellipsis">蒔初甜點五權店:清新可愛綠葡萄戚風蛋糕</p>
                            <p></p>
                            <p class="latestDate-1">2024/6/30</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="img-con">
                        <img src="../images/izakaya/woliu.jpeg">
                        <div class="text-con">
                            <p class="ellipsis">台中我流精緻烤物WOLIU 吃的很精緻 價格卻很平實</p>
                            <p></p>
                            <p class="latestDate-1">2024/6/15</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 要放到JS裡的 -->
            <!-- <div class="col-8 p-0">
                <div class="height500">
                    <img src="../_images/甜點/若草蛋糕店.jpg" class="img-fluid">
                    <div class="text-con">
                        <p class="ellipsis">若草．台中模範街神秘甜點店，水果千層、焦糖布丁大推</p>
                        <p></p>
                        <p class="latestDate-1">2024/7/10</p>
                    </div>
                </div>
            </div>
            <div class="col-4 row p-0">
                <div class="col-12">
                    <div class="img-con">
                        <img src="../_images/甜點/日日鬆餅.jpg">
                        <div class="text-con">
                            <p class="ellipsis">台中西區 日日鬆餅 平價舒芙蕾鬆餅 審計新村必吃美食</p>
                            <p></p>
                            <p class="latestDate-1">2024/6/25</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="img-con">
                        <img src="../_images/甜點/可可庫奇.jpg">
                        <div class="text-con">
                            <p class="ellipsis">台中北區 可可庫奇甜點工坊 到中友一中商圈逛街、用餐後的甜點午茶好選擇</p>
                            <p></p>
                            <p class="latestDate-1">2024/5/29</p>
                        </div>
                    </div>
                </div>
            </div> -->



        <!-- 側邊欄+店家3*4 -->
        <div class="row align-items-start justify-content-center" style="margin-top: 8%;">
            <!-- 側邊欄 -->
            <div class="col-3 custom-ul sticky-top">
                <div class="mb-2 mt-3 ">
                    <img src="../images/other/hot.png" alt="" >
                    <li>本週熱門</li>
                </div>
                <div class="mb-2 ">
                    <img src="../images/other/hotpot.png" alt="">
                    <li>火鍋</li>
                </div>
                <div class="mb-2">
                    <img src="../images/other/barbecue.png" alt="">
                    <li>燒肉</li>
                </div>
                <div class="mb-2"> 
                    <img src="../images/other/ramen.png" alt="">
                    <li>拉麵</li>
                </div>
                <div class="mb-2">
                    <img src="../images/other/izakaya.png" alt="" id="beer">
                    <li>居酒屋</li>
                </div>
                <div class="mb-2">
                    <img src="../images/other/dessert.png" alt="" id="dessert">
                    <li>甜點</li>
                </div>               
            </div>
            <!-- 店家3*4 -->
            <div class="col-9 mb-5">
             <!-- 本週熱門 -->
                <div class="row">
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden" > 
                            <div class="card-body p-0">
                                <!-- <a href="./demoHotpot.html"> -->
                                    <img src="../images/hotpot/qinghj.jpg" alt="" class="img-fluid notesImage" >
                                <!-- </a> -->
                            </div>
                            <div class="card-footer align-items-center">
                                <p class="ellipsis notesTitle">【台中】青花驕麻辣鍋(崇德店)王品集團麻辣鍋、酸菜白肉鍋火鍋餐廳 牛三拼盛宴比臉大氣勢十足</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202489</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/bbq/kodo.png" alt="" class="img-fluid  notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">全程專人代烤壽星優惠95折，KODO和牛燒肉</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202377</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/bbq/fengjian.jpeg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">【台中-南屯區】燒肉風間｜套餐份量超多，桌邊服務超讚的啦</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202256</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/dessert/erlin.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">甜點秘境「貳林工作室」，必嚐ig爆紅「芋泥抹茶戚風三明治」超美味又超好拍！</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202203</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/ramen/xuanri.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">懸日拉麵｜以水果入湯頭，主打新潮系的精緻創意拉麵店</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202189</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/ramen/shouren.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">MEN monster 挺有意思的香料拉麵，味道濃郁，但口感清爽充滿衝突的特色拉麵</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202138</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/hotpot/roudd.png" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">【台中西區】肉多多火鍋（台中廣三店）CP值超高的平價吃到飽火鍋 會員免費送肉</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202076</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/dessert/liyu.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">台中西區│離域Cafe-老宅咖啡館，多了新品千層酥的選擇，審計新村附近甜點咖啡美食推薦</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202010</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/izakaya/xiaoms_qinmei.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">【台中食記】西區近科博館老宅改建〔 小麥所居酒屋 〕台日結合創意料理，高人氣聚餐地點，深夜食堂好所在。</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201989</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/hotpot/yuemc.jpg" alt="" class="img-fluid  notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">月暮藏涮涮鍋 |台中西屯活體海鮮、日本和牛，浮誇貴氣裝潢+個人火鍋套餐499元起</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201956</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/dessert/overture.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">【台中甜點推薦】Overture序曲 千層蛋糕水果蛋糕IG網美人氣名店！</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201907</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../images/hotpot/tangzhan.jpeg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">台中火鍋-湯棧 公益店，麻油雞鍋、剝皮辣椒鍋 營業到凌晨二點冷冬宵夜首選</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201896</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- 甜點 -->
                <!-- <div class="row">
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden" >
                            <div class="card-body p-0">
                                <img src="../_images/甜點/貳林.jpg" alt="" class="img-fluid notesImage" >
                            </div>
                            <div class="card-footer align-items-center">
                                <p class="ellipsis notesTitle">甜點秘境「貳林工作室」，必嚐ig爆紅「芋泥抹茶戚風三明治」超美味又超好拍！</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202203</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/離域Cafe.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">台中西區│離域Cafe-老宅咖啡館，多了新品千層酥的選擇，審計新村附近甜點咖啡美食推薦</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">202010</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/Overture序曲.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">【台中甜點推薦】Overture序曲 千層蛋糕水果蛋糕IG網美人氣名店！</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201907</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/J.W CAFE.jpeg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">J.W. Cafe｜網路爆紅的貓掌印布丁就是這間！每日限量供應</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201879</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/ten thousand.jpeg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">人氣咖啡「Ten Thousand Coffee」插旗台中！純白基地打造海島度假概念店</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201834</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/二月森甜點.webp" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">：二月森甜點工作室｜台中人氣法式手工餅乾甜點專賣</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201802</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/偷偷.jpeg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">偷偷toutou | 台中超浮誇甜點16宮格乾冰塔</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201787</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/克莉絲塔.jpeg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">克莉斯塔｜多達10多種鹹甜口味，最推焦糖佐海鹽蛋塔</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201741</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/勞咖.jpeg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">LOWCA勞咖| 台中炸饅頭早午餐還有超邪惡的台版蜜糖吐司</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201708</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/查壹茶Charlie Tea & Coffee.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">【台中西屯美食】查壹茶Charlie Tea & Coffee，神等級好吃流心感巴斯克蛋糕、爆漿抹茶鬆餅</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201689</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/綠町抹茶專門店.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">綠町抹茶專門店-巷弄裡的抹茶專賣店，使用丸久小山園抹茶粉製作，抹茶控必收藏</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201664</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-0">
                                <img src="../_images/甜點/蒔初.jpg" alt="" class="img-fluid notesImage">
                            </div>
                            <div class="card-footer">
                                <p class="ellipsis notesTitle">蒔初甜點五權店:清新可愛綠葡萄戚風蛋糕</p>
                                <div class="fixed-bottom-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../images/other/eye.png" alt="">
                                        <p class="m-0 viewNumber">201622</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> -->
            
                
            </div>

            
        </div>




    </div>








    

 



                
    <!-- 新增食記按鈕 -->
    <a href="https://www.google.com.tw/"><img src="../images/other/write.png" alt="" width="40" id="write"></a>
    
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
    <script src="../js/foodNoted.js"></script>
</body>
</html>

