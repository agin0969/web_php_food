<?
require_once'../services/billService.php';
$billService = new BillService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_id=$_POST['cart_id'];
    $totalPrice=$_POST['total_price'];
    $address=$_POST['address'];
    $phone=$_POST['phoneNumber'];
    if($address !=null && $phone != null){
        $billService->addToBill($cart_id,$totalPrice,$address,$phone,"Chờ xác nhận");
    }
}

