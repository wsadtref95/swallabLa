document.addEventListener('DOMContentLoaded', function () {
    const popupBlog = document.getElementById('popupBlog');
    const popupRest = document.getElementById('popupRest');
    const theicon = document.getElementById('theicon');
    const showicon = document.getElementById('showicon');

    if (popupBlog) {
        popupBlog.addEventListener('click', function () {
            showicon.className = blogIcon.toIcon();
        });
    }

    if (popupRest) {
        popupRest.addEventListener('click', function () {
            showicon.className = restIcon.toIcon();
        });
    }

    // 當滑鼠經過時，顯示兩個 icon
    if (theicon) {
        theicon.addEventListener('mouseover', function () {
            document.getElementById('popupBR').style.display = 'flex';
            popupBlog.style.display = 'flex';
            popupRest.style.display = 'flex';
        });

        // 當滑鼠離開時，只顯示已選擇的 icon
        theicon.addEventListener('mouseout', function () {
            popupBlog.style.display = 'none';
            popupRest.style.display = 'none';
        });
    }

    class Theicon {
        constructor(type, icon) {
            this.type = type;
            this.icon = icon;
        }
        toIcon() {
            return this.icon;
        }
    }

    let restIcon = new Theicon("rest", "fa-solid fa-utensils");
    let blogIcon = new Theicon("blog", "fa-solid fa-book-open");

    if (showicon) {
        showicon.className = restIcon.toIcon();
    }
});

// 搜尋框
// 點擊輸入框，切換下拉選單的顯示和隱藏
function myFunction() {
    var dropdown = document.getElementById("myDropdown");
    if (dropdown) {
        if (dropdown.style.display === "none" || dropdown.style.display === "") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    }
}

function myFunction2() {
    var dropdown = document.getElementById("myDropdown2");
    if (dropdown) {
        if (dropdown.style.display === "none" || dropdown.style.display === "") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    }
}

// 搜尋框顯示
function fillInput(value) {
    var input1 = document.getElementById('myInput');
    var dropdown = document.getElementById('myDropdown');
    var input2 = document.getElementById('myInput2');

    if (input1) {
        input1.value = value;
    }
    if (dropdown) {
        dropdown.style.display = "none";
    }
    if (input2) {
        input2.style.display = "block";
    }
}

function fillInput2(value) {
    var input1 = document.getElementById('myInput');
    var dropdown = document.getElementById('myDropdown2');
    var input2 = document.getElementById('myInput2');

    if (input2) {
        input2.value = value;
    }
    if (dropdown) {
        dropdown.style.display = "none";
    }
    if (input1) {
        input1.style.display = "block";
    }
}

// 點擊其他地方隱藏下拉
window.onclick = function (event) {
    if (!event.target.matches('#myInput')) {
        var dropdown = document.getElementById("myDropdown");
        if (dropdown && dropdown.style.display === "block") {
            dropdown.style.display = "none";
        }
    }

    if (!event.target.matches('#myInput2')) {
        var dropdown = document.getElementById("myDropdown2");
        if (dropdown && dropdown.style.display === "block") {
            dropdown.style.display = "none";
        }
    }
}
