<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>餐廳內頁</title>
    <link rel="stylesheet" href="./../css/detailxi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="row ">
                <div class="col-6">
                    <img src="./../images/root/LOGO.jpg" style="border-radius: 50%; width:15%" class="m-2 ">
                </div>
            </div>
        </div>  
    </header>
        <div class="container">
            <div class="row header-content">
                <div class="col-md-8 header-img">
                    <div class="myimg">
                    <img src="./../images/qhjpage/qhjdetail.jpg" >
                    </div>
                </div>
                <div class="icon-shopping icon-circle">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="icon-heart ">
                    <i class="fa-regular fa-heart" id="hearticon"></i>
                </div>
            </div>
        </div>
        <div class="container " >
            <div class="row ">
                <div class="col-5">
                    <div class="hotpot">
                    <div style="font-size: 30px; font-weight: bold;">無老鍋 - 公益店</div>
                    <div class="ml-5" style="font-size: 25px; font-weight: bold;">
                        4.8分 <span style="font-size: 20px">(33)</span>
                      </div>
                    <div class="ml-5 mt-2">均消200-400</div>
                    <span class="mt-2 ">地址：台中市南屯區公益路二段74號</span>
                    <button class="score" data-toggle="modal" data-target="#scoreModal">點我評分</button>
                    </div>
                </div>
                <div class="col-6 ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.5897766425455!2d120.64794117534831!3d24.15104057839904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693d965f29ddcd%3A0x3352553556c97bc8!2z54Sh6ICB6Y2LKOWFrOebiuW6lyk!5e0!3m2!1szh-TW!2stw!4v1721538300299!5m2!1szh-TW!2stw" width="600" height="300" style="border:0; margin-top: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!-- 評分model -->
            <div class="modal fade" id="scoreModal" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scoreLabel" >無老鍋-公益店</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>評分:</label>
                                    <div>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>留言</label>
                                    <input type="text" class="form-control" style="padding: 50px 0;">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">送出</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-md mt-5">
                <div class="row ">
                    <!-- 側邊欄 -->
                    <div class="col-2 custom-ul sticky-top">
                        <div class="mb-2 mt-3">
                            <a href="https://www.google.com.tw/"><img src="./../images/other/hot_2.png" style="width: 150px;" alt=""></a>
                            <li>招牌餐點</li>
                        </div>
                        <div class="">
                            <a href="https://www.google.com.tw/"><img src="./../images/other/limited_time_offer.png " style="width: 100px;" alt=""></a>
                            <li>限時優惠</li>
                        </div>
                        <div class="mt-2">
                            <a href="https://www.google.com.tw/"><img src="./../images/other/vegetable_6.jpeg" style="width: 100px;" alt=""></a>
                            <li>青菜</li>
                        </div>
                        <div class="mt-2"> 
                            <a href="https://www.google.com.tw/"><img src="./../images/other/dumpling.png" style="width: 100px; border: none ;background-color: transparent;" alt=""></a>
                            <li>餃類</li>
                        </div>
                        <div class="mt-2">
                            <a href="https://www.google.com.tw/"><img src="./../images/other/porkball_1.jpg " style="width: 100px;" alt=""></a>
                            <li>丸子</li>
                        </div>
                        <div class="mt-2 mb-5">
                            <a href="https://www.google.com.tw/"><img src="./../images/other/rice.png " style="width: 80px;" alt=""></a>
                            <li>主食</li>
                        </div>               
                    </div>
                    <!-- 餐點 -->
                    <div class="col-9 mb-5 ml-5">
                        <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">招牌餐點</div>
                        <div class="row">   
                            <div class=" col-4 mb-4">
                                <img class="ml-3 myimg" src="./../images/qhjpage/person/1.avif" alt="" >
                                <div class="name">個人即享鍋</div>
                                <div class="price">$310</div>
                                <button class="score ml-5" data-toggle="modal" data-target="#cartModal">加入購物車</button>
                            </div>    
                            <div class=" col-4 mb-4">
                                <img class="ml-3 myimg" src="./../images/qhjpage/person/2.avif" alt="" >   
                                <div class="name">麻辣粉條鍋</div>
                                <div class="price">$289</div>
                                <button class="score ml-5" >加入購物車</button>
                            </div>
                            <div class=" col-4 mb-4">
                                <img class="ml-3 myimg" src="./../images/qhjpage/person/3.avif" alt="" >   
                                <div class="name ">青花驕麻辣燙</div>
                                <div class="price">$180</div>
                                <button class="score ml-5">加入購物車</button>
                            </div>
                            
                        </div>
                        <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">限時優惠</div>
                        <div class="row">       
                            <div class=" col-4 mb-4">
                                <img class="ml-3 myimg" src="./../images/qhjpage/meat/1.avif" alt="" >   
                                <div class="name">美國安格斯牛小排 (200g)</div>
                                <div class="price">$550</div>
                                <button class="score ml-5">加入購物車</button>
                            </div>
                            <div class=" col-4 mb-4">
                                <img class="ml-3 myimg" src="./../images/qhjpage/meat/14.avif" alt="" >
                                <div class="name">大腸頭 (220g)</div>
                                <div class="price">$300</div>
                                <button class="score ml-5">加入購物車</button>
                            </div>
                        
                        </div>
                        <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">餃類</div>
                        <div class="row">       
                            <div class=" col-4 mb-4">
                                <img class="ml-3 myimg" src="./../images/qhjpage/dumpling/1.avif" alt="" >   
                                <div class="name">水晶餃 (8個)</div>
                                <div class="price">$90</div>
                                <button class="score ml-5">加入購物車</button>
                            </div>
                            <div class=" col-4 mb-4">
                                <img class="ml-3 myimg" src="./../images/qhjpage/dumpling/3.avif" alt="" >
                                <div class="name">香菇肉蛋餃 (5個)</div>
                                <div class="price">$160</div>
                                <button class="score ml-5">加入購物車</button>
                            </div>
                        
                        </div>
                        <!-- 留言區 -->
                        <div class="ml-3 mb-4" style="font-size: 30px; font-weight: bold;">大家怎麼說</div>
                        
                        <div class="row">
                            <div class="col-3">
                            <img class="ml-2" src="./../images/root/LOGO.jpg" style="width: 150px;">
                            </div>
                            <div class="col-9">
                                <div>
                                一進門椒麻香氣撲鼻而來，接待員親切的接待⋯雖然第一次，但餐點沒讓人失望⋯我們點了雙人套餐，酸菜白肉（微酸而不嗆）+麻辣（麻而不辣）湯底真的絕配，也適合孩子，原本還擔心吃不飽，結果～飽到吃不完。白飯粒粒分明是我愛的、鮮蝦滑蝦子多看得到、手工麵Q彈量多、油條適合麻辣湯底、鴨血豆腐品質保證，青花驕特調烏梅汁搭配碎冰真的驚艷⋯唇齒留香讓人回味
                                </div>
                                <div class="date">2024/5/1</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                            <img class="ml-2" src="./../images/root/LOGO.jpg" style="width: 150px;">
                            </div>
                            <div class="col-9">
                                <div>
                                    好吃平日雙人套餐優惠
                                    份量多 還吃不完
                                    沒吃完會主動詢問要不要打包👍
                                    吃麻辣鍋湯底有鴨血豆腐
                                    外帶還另外給一包鴨血豆腐
                                    超貼心、餐點又好吃
                                    便宜！真的大推
                                    第一次吃很稱讚👏
                                    
                                </div>
                                <div class="date" style="margin-top: 60px;">2024/6/1</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row hidden"  id="hidden-Comment" style="display: none;">
                            <div class="col-3">
                            <img class="ml-2" src="./../images/root/LOGO.jpg" style="width: 150px;">
                            </div>
                            <div class="col-9">
                                <div>
                                    第二次來用餐，3種部位的牛肉品質都不錯，且份量足，吃得很開心。海鮮的部分生蠔與干貝已說明不可生食，烹煮後相當甘甜嫩滑，也很好吃，不過CP值略低。每人有收取鍋底費用，最後的打包誠意十足，可以回家後繼續享用。整體而言是值得再訪的餐廳。
                                </div>
                                <div class="date" style="margin-top: 60px;">2024/8/1</div>
                            </div>
                        </div>
                        
                        <button class="score" style="margin-left: auto; margin-top: 10px;" onclick="showMore('hidden-Comment')">顯示更多</button>
                        <!-- 購物車model -->
                        <div class="modal fade" id="cartModal" >
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cartLabel">無老鍋-公益店</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>x</span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex">
                                        <div class="row">
                                            <div>
                                            <img src="./../images/qhjpage/person/1.avif" class="product-img" >
                                            </div>
                                            <div class=" product-details ml-3">
                                            <div class="items mt-3 ">個人即享鍋</div>
                                            <div class="d-flex mt-4 ml-4">
                                            <span>$</span>
                                            <span class="prices" id="price-1">310</span>
                                            </div>
                                            </div>
                                            <div class=" product-actions">
                                                <div class="ml-5 mt-3">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-button" onclick="decrement('number-span-1', 'price-1', 'total-price-1')">-</button>
                                                    <span class="number-span fs-20" id="number-span-1">0</span>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-button" onclick="increment('number-span-1', 'price-1', 'total-price-1')">+</button>
                                                <div id="total-price-1" class="mt-3 ml-1">$0</div>
                                                </div>
                                                
                                            </div>
                                            <div class=" d-flex align-items-center justify-content-center ml-5">
                                                <button class="btn btn-link trash " onclick="removeProduct('product-row-1')"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">儲存</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        
        </div>
        <!-- top -->
        <img src="./../images/other/top.png" class="top" id="top">
    <footer>
        <div class="container-md">
            <div class="row">
                <div class="col-6">
                    <img src="./../images/root/LOGO.jpg" style="border-radius: 50%; width:15%" class="m-2 ">
                </div>
            </div>
        </div>
    </footer>
    <script src="./../js/detail.js"></script>
    
</body>
</html>

