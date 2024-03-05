<?php
require_once'../services/cartShoppingService.php';


// Định nghĩa phương thức getProductToForm() trong một lớp (ví dụ: CartShoppingService)
class CartShoppingController {
    public function getProductToForm() {
        if(isset($_POST['add_cart']) && $_POST['add_cart']) {
            $product_image = $_POST['product_image'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            $cartShoppingService = new CartShoppingService();
            $cartContent = $cartShoppingService->addToCart($product_image, $product_name, $product_price, $product_id, $quantity);
            //var_dump($_SESSION['cart_shopping']);
            return $cartContent;
        }
    }
}


?>
