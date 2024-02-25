



function showFoodbox(foodType) {
    var foodBoxes = document.getElementsByClassName('product');

    // Ẩn tất cả các box trước khi hiển thị box mới
    for (var i = 0; i < foodBoxes.length; i++) {
        foodBoxes[i].style.display = 'none';
    }


    // Hiển thị box tương ứng với loại thức ăn
    var selectedFoodBox = document.getElementById(foodType);
    if (selectedFoodBox) {
        selectedFoodBox.style.display = 'block';
    } else {
        console.log("Không tìm thấy box với id: " + foodType);
    }
}
window.onload = function () {
    showFoodbox('milk_tea');
};



$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $('header').addClass('sticky');
        } else {
            $('header').removeClass('sticky');
        }
    });
});

