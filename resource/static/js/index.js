
    
    

    

    
    
    // <!-- js hiển thị phần con của menu -->
             
                    function showFoodbox(foodType) {
                    var foodBoxes = document.getElementsByClassName('product');
                    
                    // Ẩn tất cả các box trước khi hiển thị box mới
                    for (var i = 0; i < foodBoxes.length; i++) {
                        foodBoxes[i].style.display = 'none';
                    }
    
                    // Xóa border dưới của tất cả các thẻ li
                    var menuItems = document.querySelectorAll('#main-menu li');
                    for (var i = 0; i < menuItems.length; i++) {
                        menuItems[i].style.borderBottom = 'none';
                    }
    
                    
                    // Hiển thị box tương ứng với loại thức ăn
                    var selectedFoodBox = document.getElementById(foodType);
                    if (selectedFoodBox) {
                        selectedFoodBox.style.display = 'block';
                        
                        var menuItem = document.querySelector('#main-menu li a[href="#' + foodType + '"]');
                        menuItem.parentElement.style.borderBottom = '2px solid #a7c1c4db';
                        console.log(menuItem);
                    } else {
                        console.log("Không tìm thấy box với id: " + foodType);
                    }
                    }
    
                    window.onload = function() {
                        showFoodbox('mon_nuoc'); 
                    };
          
    
    
    
                
   // <!-- js hiển thị phần chức nang cuộn cho header -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

            $(document).ready(function(){
                $(window).scroll(function(){
                    if( $(this).scrollTop()) {
                        $('header').addClass('sticky');
                    }else{
                        $('header').removeClass('sticky');
                    }
                });
            });
