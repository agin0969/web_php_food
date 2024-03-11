<?
require_once'../services/billService.php';
require_once'../services/shipService.php';
$billService = new BillService();
$shipService = new ShipService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bill_id=$_POST['id1'];
    $transpot=$_POST['transport'];
    if($bill_id!=null){
        $result1=$billService->updateBillStatus($bill_id);
        $result2=$shipService->addShip($bill_id,$transpot);
        if($result1 && $result2){
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