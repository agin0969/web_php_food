<?
require_once'../services/billService.php';
$billService = new BillService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_id=$_POST['cart_id'];
    $totalPrice=$_POST['total_price'];
    $address=$_POST['address'];
    $phone=$_POST['phoneNumber'];
    if($address !=null && $phone != null){
        $result=$billService->addToBill($cart_id,$totalPrice,$address,$phone,"Chờ xác nhận");
        if($result){
            header('Location: ../views/adminBill.php');
            exit();
        } else {
            header("Location: ../views/404.php");
            exit();
        }
    }
} else {
    header("Location: ../views/404.php");
    exit();
}

