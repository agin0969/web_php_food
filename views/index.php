<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script> -->
    <link rel="stylesheet" href="../resource/static/css/style.css">
    <link rel="stylesheet" href="../resource/static/css/cart.css">

    <title>WEFOOD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="../resource/static/js/index.js" type="text/javascript"> </script>
    <style>
    /* width */
    ::-webkit-scrollbar {
        width: 0;
    }
    </style>
</head>

<body>
    <!-- realtime search tai index -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#live_search").keyup(function() {
            var query = $(this).val();
            if (query != "") {
                $.ajax({
                    url: '../controllers/indexLiveSearch.php',
                    method: 'POST',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#search_result').html(data);
                        $('#search_result').css('display', 'block');
                        $("#live_search").focusout(function() {
                            $('#search_result').css('display', 'none');
                        });
                        $("#live_search").focusin(function() {
                            $('#search_result').css('display', 'block');
                        });
                        addCssClassToResults();
                    }
                });
            } else {
                $('#search_result').css('display', 'none');
            }
        });
    });
            function addCssClassToResults() {
                $('#search_result > div').addClass('search_result_item');
            }
    </script>

    <div id="wraper">
        <!--background-->
        <div id="banner"></div>
        <!-- <header>   </header> -->
        <?
        require_once'../views/header.php';
        ?>
        <div class="content" style="height: 110vh !important;">


            <div class="box_content_left">
                <!--muc tim kiem cac san pham-->
                <div class="search_info">
                    <h2>Đặt đồ ăn nhanh chóng ... </h2>
                    <input class="search" type="text" name="live_search" id="live_search"
                        placeholder="Tìm địa điểm, món ăn, đồ uống,..." />
                    <button class="btn_search">Tìm</button>
                    <div id="search_result"></div>
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

            </div>
            <div class="box_content_right">
                <!-- địa chỉ giao hàng -->
                <!-- <div class="address">
                    <h2>Thay đổi địa chỉ giao hàng </h2>
                    <input class="set-address" type="text" name="set-address"
                        placeholder="Nhập địa chỉ giao hàng,..." />
                    <button class="btn_address">ĐỔI</button>
                    <button class="btn_address">Mặc định</button>
                </div> -->

                <!--cac san pham cua mot menu-->
                <div id="FoodBoxContainer">
                    <div class="mid_foodbox" style="overflow-y: auto; height : 90vh">
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
                                            <form name="cartForm" id="cartForm"
                                                action="../controllers/addToCartItemController.php" method="post">
                                                <div class="btn cart quantity">

                                                    <span class="minus">-</span>
                                                    <input name="input_quantity" value="01" class="num"
                                                        style="width: 30px; background:none; border:none" readonly>
                                                    <span class="plus">+</span>

                                                </div>
                                                <input type="hidden" id="cart_id" name="cart_id"
                                                    value="<?php echo $cartInfor->getId(); ?>">
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
                                            <?php if(!empty($sessionData)) { ?>
                                            <form name="cartForm" id="cartForm"
                                                action="../controllers/addToCartItemController.php" method="post">
                                                <div class="btn cart quantity">

                                                    <span class="minus">-</span>
                                                    <input name="input_quantity" value="01" class="num"
                                                        style="width: 30px; background:none; border:none" readonly>
                                                    <span class="plus">+</span>

                                                </div>
                                                <input type="hidden" id="cart_id" name="cart_id"
                                                    value="<?php echo $cartInfor->getId(); ?>">
                                                <input type="hidden" id="id1" name="id1" value="">
                                                <button class="btn buy" type="button" name="add_cart" value="Add cart"
                                                    onclick="getid(<?php echo $product->getId(); ?>)">Add cart</button>
                                            </form>
                                            <?php } ?>
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
                                            <?php if(!empty($sessionData)) { ?>
                                            <form name="cartForm" id="cartForm"
                                                action="../controllers/addToCartItemController.php" method="post">
                                                <div class="btn cart quantity">

                                                    <span class="minus">-</span>
                                                    <input name="input_quantity" value="01" class="num"
                                                        style="width: 30px; background:none; border:none" readonly>
                                                    <span class="plus">+</span>

                                                </div>
                                                <input type="hidden" id="cart_id" name="cart_id"
                                                    value="<?php echo $cartInfor->getId(); ?>">
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
                        <!-- ăn trưa -->
                        <div class="product" id="trang_mieng">

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
                                            <?php if(!empty($sessionData)) { ?>
                                            <form name="cartForm" id="cartForm"
                                                action="../controllers/addToCartItemController.php" method="post">
                                                <div class="btn cart quantity">

                                                    <span class="minus">-</span>
                                                    <input name="input_quantity" value="01" class="num"
                                                        style="width: 30px; background:none; border:none" readonly>
                                                    <span class="plus">+</span>

                                                </div>
                                                <input type="hidden" id="cart_id" name="cart_id"
                                                    value="<?php echo $cartInfor->getId(); ?>">
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
                </div>
            </div>


        </div>



            
            
            
            
            
        </div>
        <!-- link file footer-->
        <?   require_once'../views/footer.php'; ?>  
                                        
<!-- javascript cho index -->

<!-- thêm thẻ div cho các kết quả trả về của search_result -->
<script>
    function handleSearchSuccess(data) {
    var results = JSON.parse(data); // Giả sử dữ liệu trả về là một mảng JSON của kết quả tìm kiếm

    var searchResultContainer = $('#search_result');
    searchResultContainer.empty(); // Xóa bỏ nội dung cũ trước khi thêm kết quả mới

    results.forEach(function(result) {
        var div = $('<div class="search_result_item"></div>'); // Tạo một phần tử div mới
        div.text(result.name); // Giả sử name là thuộc tính của mỗi kết quả tìm kiếm
        searchResultContainer.append(div); // Thêm phần tử div vào searchResultContainer
    });

    $('#search_result').css('display', 'block');
}
</script>


<!-- js lấy id từ form -->
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
    // <!-- js hiển thị phần con của menu -->

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









</body>

</html>