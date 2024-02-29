



// chuyển trang đến mục milk tea khi load lại trang
window.onload = function () {
    showFoodbox('milk_tea');
};



// chức năng hiển thị danh sách sản phẩm tuong ứng với mục đã chọn trên menu
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











