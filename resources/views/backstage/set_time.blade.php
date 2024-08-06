<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backstage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Set Time</title>
    <style>
        .active {
            background-color: #f8f9fa;
            color: #495057;
        }

        #aa {
            background-image: url('{{ asset('images/other/subtle_white_feathers.webp') }}');

        }
    </style>
</head>

<body>
    <div id="aa">
        <!-- NAV_begin : sticky-top -->
        <nav class="navbar navbar-expand sticky-top shadow">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand ms-5 col-1" href="../headpage/headpage.html">
                    <img src="../images/root/logo.jpg" alt="" class="logo d-inline-block align-text-top">
                </a>

                <div class="ms-3 me-5 col-1">
                    <a href="#" class="">
                        @if (Auth::check())
                            <h5 href="{{ route('profile.show') }}" class="text-decoration-none">
                                <span>{{ Auth::user()->name }}</span>
                            </h5>
                        @else
                            <a href="{{ route('login') }}">
                                <button class="btn btn-sm btnLogin text-nowrap">登入/註冊</button>
                            </a>
                        @endif
                    </a>
                </div>
            </div>
        </nav>
        <!-- NAV_end -->
        <div class="container">
            <div class="row">
                <div class="mySidebar col-2">
                    <a href="{{ url('/backstage/new_oder') }}" class="sidebar-link">
                        <p>訂單狀況</p>
                    </a>
                    <a href="{{ url('/backstage/set_time') }}" class="sidebar-link active">
                        <p>編輯營業時間</p>
                    </a>
                    <a href="{{ url('/backstage/management_menu1') }}" class="sidebar-link">
                        <p>菜單管理</p>
                    </a>
                    <a href="{{ url('/backstage/set_info') }}" class="sidebar-link">
                        <p>編輯餐廳資料</p>
                    </a>
                </div>
                <div class="col">
                    <h3 class="m-20">營業時間</h3>
                    <div class="editTime">
                        <form action="http://localhost/myProj/getOpeningHours.php" method="post"
                            id="businessHoursForm">
                            <div class="workdays">
                                <h4>平日</h4>
                                <div class="weekdaysContainer row">
                                    <div class="col">
                                        <label id="monday" onclick="toggleSelection('monday')">
                                            <input type="hidden" name="myWeekdays[]" value="monday" disabled>
                                            星期一
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label id="tuesday" onclick="toggleSelection('tuesday')">
                                            <input type="hidden" name="myWeekdays[]" value="tuesday" disabled>
                                            星期二
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label id="wednesday" onclick="toggleSelection('wednesday')">
                                            <input type="hidden" name="myWeekdays[]" value="wednesday" disabled>
                                            星期三
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label id="thursday" onclick="toggleSelection('thursday')">
                                            <input type="hidden" name="myWeekdays[]" value="thursday" disabled>
                                            星期四
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label id="friday" onclick="toggleSelection('friday')">
                                            <input type="hidden" name="myWeekdays[]" value="friday" disabled>
                                            星期五
                                        </label>
                                    </div>
                                </div>

                                <div class="daytime row">
                                    <h4 class="p-20">選擇時間</h4>
                                    <div class="newBtn">
                                        <p id="addBreakTime">新增休息時間</p>
                                    </div>
                                    <div class="col-6 p-20">
                                        <h5>開始時間</h5>
                                        <select name="weekdayStartTimeHour" id="openTime">
                                            <option>小時</option>
                                        </select>
                                        <span> : </span>
                                        <select name="weekdayStartTimeMin" class="Min">
                                            <option>分鐘</option>
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                    <div class="col-6 p-20">
                                        <h5>打烊時間</h5>
                                        <select name="weekdayEndTimeHour" id="closeTime">
                                            <option>小時</option>
                                        </select>
                                        <span> : </span>
                                        <select name="weekdayEndTimeMin" class="Min">
                                            <option>分鐘</option>
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                    <div id="myAdd" class="breakTimeContainer row"></div>
                                </div>

                                <h4>假日</h4>
                                <div class="holidaysContainer row">
                                    <div class="col">
                                        <label id="saturday" onclick="toggleHolidaySelection('saturday')">
                                            <input type="hidden" name="myHolidays[]" value="saturday" disabled>
                                            星期六
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label id="sunday" onclick="toggleHolidaySelection('sunday')">
                                            <input type="hidden" name="myHolidays[]" value="sunday" disabled>
                                            星期日
                                        </label>
                                    </div>
                                </div>
                                <div class="daytime row">
                                    <h4 class="p-20">選擇時間</h4>
                                    <div class="newBtn">
                                        <p id="addHolidayBreakTime">新增休息時間</p>
                                    </div>
                                    <div class="col-6 p-20">
                                        <h5>開始時間</h5>
                                        <select name="holidayStartTimeHour" id="holidayOpenTime">
                                            <option>小時</option>
                                        </select>
                                        <span> : </span>
                                        <select name="holidayStartTimeMin" class="Min">
                                            <option>分鐘</option>
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                    <div class="col-6 p-20">
                                        <h5>打烊時間</h5>
                                        <select name="holidayEndTimeHour" id="holidayCloseTime">
                                            <option>小時</option>
                                        </select>
                                        <span> : </span>
                                        <select name="holidayEndTimeMin" class="Min">
                                            <option>分鐘</option>
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                    <div id="myHolidayAdd" class="breakTimeContainer row"></div>
                                </div>
                            </div>

                            <div class="mySettimeBtn">
                                <div class="settimeBtn" onclick="submitForm()">存檔</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery-3.7.1.js"></script>
        <script src="../js/backstage.js"></script>
        <script src="../js/setTime.js"></script>
        <script>
            $(document).ready(function() {
                // 確保當前頁面的鏈接是選中的
                $('.mySidebar a').each(function() {
                    if (this.href === window.location.href) {
                        $(this).addClass('active');
                    }
                });
            });
        </script>
    </div>
</body>

</html>
