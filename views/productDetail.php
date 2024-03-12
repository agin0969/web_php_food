<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Detail</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../resource/static/css/productDetail.css">

<style>

    .product-container {
        display: flex;
        border: 1px solid #ddd; 
    }

    .product-image {
        flex: 0 0 50%; 
        border-right: 1px solid #ddd; 
    }

    .product-info {
        flex: 0 0 50%; 
        padding: 20px; 
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }
</style>
</head>
<body>

<?php
    require '../services/productService.php';
    $productService = new ProductService();
    $product = $productService->getProductById($_GET['id']);
?>

<div class="container">
    <div class="product-container">
        <div class="product-image">
            <img src="../resource/static/img/ts.png" alt="Product Image" class="img-fluid">
        </div>
        <div class="product-info">
            <h2 class="my-4"><?php echo $product->getName(); ?></h2>
            <p class="lead">Price: $<?php echo $product->getPrice(); ?></p>
            <p>Description: <?php echo $product->getDescription(); ?></p>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" class="form-control" value="1" min="1">
            </div>
            <div class="action-buttons">
                <button class="btn btn-primary" onclick="addToCart()">Add to Cart</button>
                <button class="btn btn-secondary" onclick="decreaseQuantity()">-</button>
                <button class="btn btn-secondary" onclick="increaseQuantity()">+</button>
                
            </div>
        </div>
    </div>
</div>

<script>
function addToCart() {
    // Lấy số lượng từ input
    var quantity = document.getElementById('quantity').value;

    alert('Đã thêm ' + quantity + ' sản phẩm vào giỏ hàng.');
}

function decreaseQuantity() {
    var quantityInput = document.getElementById('quantity');
    if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
}

function increaseQuantity() {
    var quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value) + 1;
}
</script>
<?php include 'footer.php'; ?>
</body>
</html>
