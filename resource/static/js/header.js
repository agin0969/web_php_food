
 /*
// hiệu ứng đổi màu của thanh header khi cuộn trang
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $('header').addClass('sticky');
        } else {
            $('header').removeClass('sticky');
        }
    });
});*/


// hiệu ứng tắt / bật thanh trạng thái người dùng
document.addEventListener("DOMContentLoaded", function() {
    var avt_users = document.getElementById("avt_users");
    var mid_user_info = document.getElementById("mid_user_info");

    mid_user_info.addEventListener("click", function() {
        if (avt_users.style.display === "none") {
            avt_users.style.display = "block";
        } else {
            avt_users.style.display = "none";
        }
    });
});

