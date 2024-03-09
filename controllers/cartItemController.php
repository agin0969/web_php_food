<?php
require_once'../services/cartItemService.php';
$cartItemService=new CartItemService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_POST['id'];
    $cartItemService->deleteCartItemById( $id );
    header("Location: ../views/userCart.php");
}

?>
