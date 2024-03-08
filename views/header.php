<?require_once'../controllers/productController.php';
require '../services/CartService.php';
require '../services/cartItemService.php';
//require_once '../config/init.php';

    $productController=new ProductController();
    $products=$productController->getAllProduct();

    $productService = new ProductService();

    require '../services/userService.php';
    $userService = new UserService();
    $sessionData = $userService->getSession();


    if(!empty($sessionData)){

    
    $userId=$sessionData['id'];
            
    
    $cartService= new CartService();
    $cartInfor=$cartService->getCartByUserId($userId);


  
    $cartItemService = new CartItemService();
    $cartItems= $cartItemService->getItemWithCartId($cartInfor->getId());
    $totalPrice=$cartItemService->getTotalAmountInCart($cartInfor->getId());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Document</title>

</head>
<body>
<header>
            <div class="inner-header container">
                <a href="" class="logo">WEFOOD</a>
                <nav>
                    <ul id="main-menu">
                        <li id = "milktea"><a href="#mon_nuoc" onclick="showFoodbox('mon_nuoc')">Món Nước</a></li>
                        <li><a href="#mon_kho" onclick="showFoodbox('mon_kho')">Món Khô</a></li>
                        <li><a href="#thuc_uong" onclick="showFoodbox('thuc_uong')">Thức Uống</a></li>
                        <li><a href="#trang_mieng" onclick="showFoodbox('trang_mieng')">Tráng Miệng</a></li>
                    </ul>
                </nav>
                
                <?
                    $sessionData = $userService->getSession();
                    if (!empty($sessionData['username']) && !empty($sessionData['id']) && !empty($sessionData['role_id'])) {
                        // Người dùng đã đăng nhập
                        echo '
                            
                            <button id="avt_users">logo</button>
                            <div class="user_info">
                                <div class="mid_user_info">
                                    <ul class="users_info">
                                        <li>
                                            <ul class="logo_name">
                                                <li id="logo_info"><a href="">logo</a></li>
                                                
                                                <li id="name_info"><a href="">'.  $sessionData['username'] .'</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li id="email"><a href="">'.  $sessionData['id'] .'</a></li>
                                        <li><a href="">Profile</a></li>
                                        <li><a href="?logout=true">Đăng xuất</a></li>
                                    </ul>
                                </div>   
                            </div>
                        ';
                    } else {
                        // Người dùng chưa đăng nhập
                        echo '
                            <a href="../views/login.php" id="lg_lo">
                                <button class="login_signup">Đăng nhập/Đăng ký</button>
                            </a>'
                        ;


                    }
                    // Kiểm tra nếu người dùng chọn đăng xuất
if (isset($_GET['logout'])) {
    $userService->clearSession();
    header('Location: ../views/index.php');
    exit();
}

                ?>

        </header>

        
</body>
</html>