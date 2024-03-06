<?php
require_once'../services/cartItemService.php';

$cartItemService=new CartItemService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $id=intval($_POST['id1']);
    $quantity=intval($_POST['input_quantity']);
    $cart_id=$_POST['cart_id'];
    if(
    $cartItemService->addCartItem($id,$quantity,$cart_id)){
        header("Location: ../views/index.php");
    }
    else { header("Location: ../views/404.php"); }
    
}

?>