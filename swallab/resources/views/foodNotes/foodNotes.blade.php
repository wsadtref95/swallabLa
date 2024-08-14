@extends('layouts.app')
@section('content')
    <style>
        #sidebar {
            position: relative;
            right:  500px;
        }
    </style>
    <div class="container p-0">
        <!-- 最新文章1+2 -->
        <div class="row p-0 title">
            <div class="col-8 p-0">
                <div class="height500">
                    <img src="" class="img-fluid newTitle" />
                    <div class="text-con">
                        <p class="ellipsis title" id="title1"></p>
                        <p></p>
                        <p class="latestDate-1" id="date1"></p>
                    </div>
                </div>
            </div>
            <div class="col-4 row p-0">
                <div class="col-12">
                    <div class="img-con">
                        <img src="" class="newTitle" />
                        <div class="text-con">
                            <p class="ellipsis title" id="title2"></p>
                            <p></p>
                            <p class="latestDate-1"id="date2"></p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="img-con">
                        <img src="" class="newTitle" />
                        <div class="text-con">
                            <p class="ellipsis title" id="title3"></p>
                            <p></p>
                            <p class="latestDate-1" id="date3"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 側邊欄+店家3*4 -->
        <div class="row align-items-start justify-content-center mt8">
            <!-- 側邊欄 -->
            <div id="sidebar" class="col-3 custom-ul sticky-top">
                <div class="mb-2 mt-3 ">
                    <img src="../images/other/hot.png" alt="" id="hot" />
                    <li>本週熱門</li>
                </div>
                <div class="mb-2 ">
                    <img src="../images/other/hotpot.png" alt="" id="hotpot" />
                    <li>火鍋</li>
                </div>
                <div class="mb-2">
                    <img src="../images/other/barbecue.png" alt="" id="bbq" />
                    <li>燒肉</li>
                </div>
                <div class="mb-2">
                    <img src="../images/other/ramen.png" alt="" id="ramen" />
                    <li>拉麵</li>
                </div>
                <div class="mb-2">
                    <img src="../images/other/izakaya.png" alt="" id="beer" />
                    <li>居酒屋</li>
                </div>
                <div class="mb-2">
                    <img src="../images/other/dessert.png" alt="" id="dessert" />
                    <li>甜點</li>
                </div>
            </div>
            <!-- 店家3*4 -->
            <div class="col-9 mb-5">
                <!-- 本週熱門 -->
                <div class="row" id="cardTop">

                </div>

            </div>
        </div>
    </div>

    <!-- 新增食記按鈕 -->
    <a href="https://www.google.com.tw/"><img src="../images/other/write.png" alt="" width="40"
            id="write" /></a>

    <!-- TOP按鈕 -->
    <img src="../images/other/top.png" alt="" class="top" id="top" />


    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/foodNoted.js"></script>
@endsection
