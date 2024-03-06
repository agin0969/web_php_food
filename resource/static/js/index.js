 
    //<!-- hiệu ứng tắt / bật thanh trạng thái người dùng-->
  
        document.addEventListener("DOMContentLoaded", function() {
            var avt_users = document.getElementById("avt_users");
            var mid_user_info = document.querySelector(".mid_user_info");
    
            avt_users.addEventListener("click", function() {
                if (mid_user_info.style.display == "none") {
                    mid_user_info.style.display = "block";
                    avt_users.classList.toggle("avt_animations");
                    setTimeout(function() {
                        avt_users.classList.remove("avt_animations");
                    }, 300);
                } else {
                    mid_user_info.style.display = "none";
                    avt_users.classList.toggle("avt_animations");
                    setTimeout(function() {
                        avt_users.classList.remove("avt_animations");
                    }, 300);
                }
            });
        });

    
    
    
    
   // <!-- js tính năng cuộn background theo danh mục sanr phẩm-->

    window.addEventListener('scroll', function() {
        var foodBoxContainer = document.getElementById('FoodBoxContainer');
        var banner = document.getElementById("banner");
        var containerContent = document.getElementById("container_content");
    
        var foodBoxContainerRect = foodBoxContainer.getBoundingClientRect();
        var bannerRect = banner.getBoundingClientRect();
        var containerContentRect = containerContent.getBoundingClientRect();
        var windowHeight = window.innerHeight;
    
        var foodBoxContainerHeight = foodBoxContainer.offsetHeight;
        var scrollPosition = window.scrollY || window.pageYOffset;
    
        // Tính toán vị trí xuất hiện của container_content
        var containerContentThreshold = foodBoxContainerHeight / 2;
    
        // Khi cuộn trang đã đạt đến ngưỡng xuất hiện của container_content
        if (scrollPosition + windowHeight >= containerContentThreshold) {
            containerContent.style.display = 'block'; // Hiển thị container_content
            containerContent.style.top = bannerRect.bottom + '400px';
        } else {
            containerContent.style.display = 'none'; // Ẩn container_content
        }
    
        // Khi cuộn trang đã đạt đến cuối của foodBoxContainer
        if (scrollPosition + windowHeight >= foodBoxContainerHeight) {
            banner.style.position = 'absolute';
            banner.style.top = windowHeight - bannerRect.height + '0px';
        } else if (banner.style.position === 'absolute') {
            banner.style.position = '';
            banner.style.top = '';
        }
    });
    
    

    
    
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
