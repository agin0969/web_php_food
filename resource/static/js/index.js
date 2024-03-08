 
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
    
    const quantityContainers = document.querySelectorAll(".btn.cart.quantity");

    quantityContainers.forEach(quantityContainer => {
        const plus = quantityContainer.querySelector(".plus");
        const minus = quantityContainer.querySelector(".minus");
        const input = quantityContainer.querySelector(".num");

        let val = parseInt(input.value);

        plus.addEventListener("click", () => {
            val++;
            updateValue();
        });

        minus.addEventListener("click", () => {
            if (val > 0) {
                val--;
                updateValue();
            }
        });

        function updateValue() {
            input.value = val;
        }
    });
   
    
    

    
    
  
 




    // <!-- js hiển thị phần chức nang cuộn cho header -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('header').addClass('sticky');
            } else {
                $('header').removeClass('sticky');
            }
        });
    });
 

    // <!-- // JavaScript để điều khiển Offcanvas và Dropdown -->
 
    function toggleOffcanvas() {
        var offcanvas = document.getElementById("offcanvasExample");
        offcanvas.classList.toggle("active");
    }

    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.classList.toggle("active");
        dropdownMenu.style.display = dropdownMenu.classList.contains("active") ? "block" : "none";
    }
 
