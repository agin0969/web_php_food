
 
// hiệu ứng đổi màu của thanh header khi cuộn trang
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $('header').addClass('sticky');
        } else {
            $('header').removeClass('sticky');
        }
    });
});

