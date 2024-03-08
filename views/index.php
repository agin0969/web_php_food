<?
require_once'../views/header.php';

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resource/static/css/style.css">
    <link rel="stylesheet" href="../resource/static/css/cart.css">

    <title>WEFOOD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 0;
        }
    </style>
</head>

<body>

    <div id="wraper">
        <!--background-->
        <div id="banner"></div>
        <!-- <header>   </header> -->

        <div class="content" style="height: 110vh !important;" >

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
                        <img src="../resource/static/img/star.png" alt="">
                    </span>
                    <span>
                        <img src="../resource/static/img/star.png" alt="">
                    </span>
                    <span>
                        <img src="../resource/static/img/star.png" alt="">
                    </span>
                    <span>
                        <img src="../resource/static/img/star.png" alt="">
                    </span>
                    <span>
                        <img src="../resource/static/img/star.png" alt="">
                    </span>

                    <p>Hơn 500 luợt đánh giá 5 sao</p>
                </div>

                <div class="box-info-web-3">
                    <p id="p1">Phản Hồi</p>
                    <p id="p2">Hơn 600 phản hồi tích cực!</p>
                </div>
            </div>

            <!--cac san pham cua mot menu-->
            <div id="FoodBoxContainer">
                <div class="mid_foodbox" style="overflow-y: auto; height : 510px">
                <!-- traf sua -->
                <div class="product" id="mon_nuoc">
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
                                    <?php if(!empty($sessionData)) { ?>
                                    <form name="cartForm" id="cartForm" action="../controllers/addToCartItemController.php" method="post">
                                        <div class="btn cart quantity">
                                            
                                            <span class="minus">-</span>
                                            <input name="input_quantity" value="01" class="num"
                                                style="width: 30px; background:none; border:none" readonly>
                                            <span class="plus">+</span>
                                            
                                        </div>
                                        <input type="hidden" id="cart_id" name="cart_id" value="<?php echo $cartInfor->getId(); ?>">
                                        <input type="hidden" id="id1" name="id1" value="">
                                        <button class="btn buy" type="button" name="add_cart" value="Add cart"
                                            onclick="getid(<?php echo $product->getId(); ?>)">Add cart</button>
                                    </form>
                                    <?php } ?>
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
                <!-- anư vặt -->
                <div class="product" id="mon_kho">

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
                                    <div class="btn cart quantity">
                                        <span class="minus">-</span>
                                        <span class="num">00</span>
                                        <span class="plus">+</span>
                                    </div>
                                    <form action="" method="post">
                                        <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                                        <input type="hidden" name="product_name" value="<?= $product->getName() ?>">
                                        <input type="hidden" name="product_price" value="<?= $product->getPrice() ?>">
                                        <input type="hidden" name="product_image" value=".,/img/12.jpg">
                                        <input type="hidden" name="quantity" value="1">
                                        <input class="btn buy" type="submit" name="add_cart" value="Add cart">
                                    </form>
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
                <div class="product" id="thuc_uong">

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
                                    <div class="btn cart quantity">
                                        <span class="minus">-</span>
                                        <span class="num">00</span>
                                        <span class="plus">+</span>
                                    </div>
                                    <form action="" method="post">
                                        <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                                        <input type="hidden" name="product_name" value="<?= $product->getName() ?>">
                                        <input type="hidden" name="product_price" value="<?= $product->getPrice() ?>">
                                        <input type="hidden" name="product_image" value=".,/img/12.jpg">
                                        <input type="hidden" name="quantity" value="1">
                                        <input class="btn buy" type="submit" name="add_cart" value="Add cart">
                                    </form>
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
                <div class="product" id="trang_mieng">

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
                                    <div class="btn cart quantity">
                                        <span class="minus">-</span>
                                        <span class="num">00</span>
                                        <span class="plus">+</span>
                                    </div>
                                    <form action="" method="post">
                                        <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                                        <input type="hidden" name="product_name" value="<?= $product->getName() ?>">
                                        <input type="hidden" name="product_price" value="<?= $product->getPrice() ?>">
                                        <input type="hidden" name="product_image" value=".,/img/12.jpg">
                                        <input type="hidden" name="quantity" value="1">
                                        <input class="btn buy" type="submit" name="add_cart" value="Add cart">
                                    </form>
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


        <!-- link file footer-->
        <!--     <link rel="stylesheet" href="../views/footer.php">    -->
        <div id="container_content">

            <div id="footer">
                <div class="my-info">
                    <ul>
                        <div>Thông tin liên hệ </div>
                        <li>
                            <p>.09xxxxxxx01</p>
                        </li>
                        <li>
                            <p>fanbage: Wefood cân tất</p>
                        </li>
                        <li>
                            <p>blog</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>




    </div>




    <div class="test"></div>




    <script>
    function getid(productid) {
        document.getElementById('id1').value = productid;
        document.getElementById('cartForm').submit();
    }
    </script>
    <script>
    function getcartid(cart_id) {
        document.getElementById('cart_id').value = cart_id;
    }
    </script>

    <script>
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
    </script>

    <script src="../resource/static/js/index.js"></script>

    <!-- hiệu ứng tắt / bật thanh trạng thái người dùng-->
   




    <!-- js tính năng cuộn background theo danh mục sanr phẩm-->
    <script>
    window.addEventListener('scroll', function() {
        var foodBoxContainer = document.getElementById('FoodBoxContainer');
        var banner = document.getElementById("banner");


        var foodBoxContainerRect = foodBoxContainer.getBoundingClientRect();
        var windowHeight = window.innerHeight;

        // Khi phần tử FoodBoxContainer được kéo đến cuối trang
        if (foodBoxContainerRect.bottom <= windowHeight) {
            banner.style.position = 'absolute';
        } else {
            banner.style.position = ''; // Trả về giá trị mặc định của position
        }
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
        showFoodbox('mon_nuoc');
    };
    </script>






 


</body>

</html>