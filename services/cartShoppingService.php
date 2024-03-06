 <?
 class CartShoppingService{
    public function addToCart($product_image, $product_name, $product_price, $product_id, $quantity) {
    
    // Kiểm tra và khởi tạo $_SESSION['cart_shopping'] nếu nó chưa tồn tại
    if (!isset($_SESSION['cart_shopping'])) {
        $_SESSION['cart_shopping'] = [];
    }

    // Thêm sản phẩm vào giỏ hàng
    $sp = [
        'product_image' => $product_image,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'product_id' => $product_id,
        'quantity' => $quantity
    ];

    $_SESSION['cart_shopping'][] = $sp;
    return $_SESSION['cart_shopping'];
    }
 }

?>
