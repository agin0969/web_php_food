<?require_once'../controllers/productController.php';
require_once '../config/init.php';

    $productController=new ProductController();
    $products=$productController->getAllProduct();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resource/static/css/style.css">
    <title>WEFOOD</title>
    <script src="../resource/static/js/index.js"></script>
</head>

<body>

    <div id="wraper">
        <!--background-->
        <div id="banner"></div>
        <header>
            <div class="inner-header container">
                <a href="" class="logo">WEFOOD</a>
                <nav>
                    <ul id="main-menu">
                        <li id = "milktea"><a href="#" onclick="showFoodbox('milk_tea')">trà sữa</a></li>
                        <li><a href="#" onclick="showFoodbox('fast_food')">ăn vặt</a></li>
                        <li><a href="#" onclick="showFoodbox('drink')">đồ uống</a></li>
                        <li><a href="#" onclick="showFoodbox('lunch')">combo trưa</a></li>
                        <li><a href="#" onclick="showFoodbox('breakfast')">combo sáng</a></li> 
                    </ul>
                </nav>
            </div>
        </header>
        <div class="content">
            <div class="address">
                <h2>Thay đổi địa chỉ giao hàng </h2>
                <input class="set-address" type="text" name="set-address" placeholder="Nhập địa chỉ giao hàng,..." />
                <button class="btn_address">ĐỔI</button>
                <button class="btn_address">Mặc định</button>

            </div>
            <!--muc tim kiem cac san pham-->
            <div class="search_info">
                <h2>Đặt đồ ăn nhanh chóng ... </h2>
                <input class="search" type="text" name="search" placeholder="Tìm địa điểm, món ăn, đồ uống,..." />
                <button class="btn_search">Tìm</button>
            </div>

            <!-- 3 hình ảnh thêm về thông tin uy tín của trang web-->
            <div class="box-info-web">
                <div class="box-info-web-1">
                    <p id="p1">Siêu Ưu Đãi</p>
                    <p id="p2"> 50 %</p>
                    <link rel="stylesheet" href="xem thêm" class="">
                </div>

                <div class="box-info-web-2">
                    <span>
                        <img src="../icon/star.png" alt="">
                    </span>
                    <span>
                        <img src="icon/star.png" alt="">
                    </span>
                    <span>
                        <img src="icon/star.png" alt="">
                    </span>
                    <span>
                        <img src="icon/star.png" alt="">
                    </span>
                    <span>
                        <img src="icon/star.png" alt="">
                    </span>
                    <p>Hơn 500 luọt đánh giá 5 sao</p>
                </div>

                <div class="box-info-web-3">
                    <p id="p1">Phản Hồi</p>
                    <p id="p2">Hơn 600 phản hồi tích cực!</p>
                </div>
            </div>

            <!--cac san pham cua mot menu-->
            <div id="FoodBoxContainer">

                <!-- traf sua -->
                <div class="product" id="milk_tea">
                    <ul class="milktea">
                        <?php foreach ($products as $product): ?>
                            <?php if ($product->getCategoryId() == 4): ?>
                        <li>
                            <div class="item">
                                <div class="product-top">
                                    <a href="" class="thump">
                                        <img src="https://cdn.nhathuoclongchau.com.vn/unsafe/800x0/https://cms-prod.s3-sgn09.fptcloud.com/uong_nhieu_tra_sua_co_gay_ung_thu_khong_1_f8f43641f7.png"
                                            alt="san pham">
                                    </a>
                                    <button class="btn buy">Mua ngay</button>
                                    <button class="btn cart">+</button>
                                </div>
                                <div class="product-info">
                                    <a href="" class="product-name"><?= $product->getName() ?></a>
                                    <div class="product-price"><?= $product->getPrice() ?></div>
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; ?>


                    </ul>         
              </div>
        <!-- anư vặt -->
                <div class="product" id="fast_food">

                     <ul class="milktea">
                        <?php foreach ($products as $product): ?>
                            <?php if ($product->getCategoryId() == 2): ?>
                        <li>
                            <div class="item">
                                <div class="product-top">
                                    <a href="" class="thump">
                                        <img src="https://cdn.nhathuoclongchau.com.vn/unsafe/800x0/https://cms-prod.s3-sgn09.fptcloud.com/uong_nhieu_tra_sua_co_gay_ung_thu_khong_1_f8f43641f7.png"
                                            alt="san pham">
                                    </a>
                                    <button class="btn buy">Mua ngay</button>
                                    <button class="btn cart">+</button>
                                </div>
                                <div class="product-info">
                                    <a href="" class="product-name"><?= $product->getName()?></a>
                                    <div class="product-price"><?= $product->getPrice() ?></div>
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>                    
                </div>
        <!-- đô uống -->
                <div class="product" id="drink">

                     <ul class="milktea">
                        <?php foreach ($products as $product): ?>
                            <?php if ($product->getCategoryId() == 3): ?>
                        <li>
                            <div class="item">
                                <div class="product-top">
                                    <a href="" class="thump">
                                        <img src="https://cdn.nhathuoclongchau.com.vn/unsafe/800x0/https://cms-prod.s3-sgn09.fptcloud.com/uong_nhieu_tra_sua_co_gay_ung_thu_khong_1_f8f43641f7.png"
                                            alt="san pham">
                                    </a>
                                    <button class="btn buy">Mua ngay</button>
                                    <button class="btn cart">+</button>
                                </div>
                                <div class="product-info">
                                    <a href="" class="product-name"><?= $product->getName() ?></a>
                                    <div class="product-price"><?= $product->getPrice() ?></div>
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>                    
                </div>
    <!-- ăn trưa -->
                <div class="product" id="lunch">

                     <ul class="milktea">
                        <?php foreach ($products as $product): ?>
                            <?php if ($product->getCategoryId() == 1): ?>
                        <li>
                            <div class="item">
                                <div class="product-top">
                                    <a href="" class="thump">
                                        <img src="https://cdn.nhathuoclongchau.com.vn/unsafe/800x0/https://cms-prod.s3-sgn09.fptcloud.com/uong_nhieu_tra_sua_co_gay_ung_thu_khong_1_f8f43641f7.png"
                                            alt="san pham">
                                    </a>
                                    <button class="btn buy">Mua ngay</button>
                                    <button class="btn cart">+</button>
                                </div>
                                <div class="product-info">
                                    <a href="" class="product-name"><?= $product->getName() ?></a>
                                    <div class="product-price"><?= $product->getPrice() ?></div>
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>                    
                </div>

        <!-- ăn sáng -->
        <div class="product" id="breakfast">

            <ul class="milktea">
                <?php foreach ($products as $product): ?>
                    <?php if ($product->getCategoryId() == 1): ?>
                <li>
                    <div class="item">
                        <div class="product-top">
                            <a href="" class="thump">
                                <img src="https://cdn.nhathuoclongchau.com.vn/unsafe/800x0/https://cms-prod.s3-sgn09.fptcloud.com/uong_nhieu_tra_sua_co_gay_ung_thu_khong_1_f8f43641f7.png"
                                    alt="san pham">
                            </a>
                            <button class="btn buy">Mua ngay</button>
                            <button class="btn cart">+</button>
                        </div>
                        <div class="product-info">
                            <a href="" class="product-name"><?= $product->getName() ?></a>
                            <div class="product-price"><?= $product->getPrice() ?></div>
                        </div>
                    </div>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>                    
            </div>    


            </div>
        </div>
    </div>

















<!-- js tính năng hướng vào trang con menu khi load lại trang hoặc về trang chủ-->

<!-- js tính năng cuộn background theo danh mục sanr phẩm-->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const menu = document.getElementById('FoodBoxContainer');
    const background = document.getElementById('banner');

        menu.addEventListener('scroll', function() {
            // Get the scroll position of the menu
            const scrollPosition = menu.scrollTop;

            // Get the maximum scroll height of the menu
            const maxScrollHeight = menu.scrollHeight - menu.clientHeight;

            console.log('Scroll Position:', scrollPosition);
            console.log('Max Scroll Height:', maxScrollHeight);

        // Check if the menu is scrolled to the bottom
        if (scrollPosition === maxScrollHeight) {
            // If at the bottom, allow the background to scroll
            background.style.backgroundPositionY = -scrollPosition + 'px';
            console.log('Background Scrolling Enabled');
        } else {
            // If not at the bottom, keep the background fixed
            background.style.backgroundPositionY = '0';
            console.log('Background Fixed');
        }
    });
});

</script>


 <!-- js hiển thị phần con của menu -->
            <script>
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
                window.onload = function() {
                    showFoodbox('milk_tea'); 
                };
            </script>



            
<!-- js hiển thị phần chức nang cuộn cho header -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if( $(this).scrollTop()) {
                    $('header').addClass('sticky');
                }else{
                    $('header').removeClass('sticky');
                }
            });
        });
    </script>


</body>

</html>