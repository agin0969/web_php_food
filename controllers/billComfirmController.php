<?
require_once'../services/billService.php';
require_once'../services/shipService.php';
$billService = new BillService();
$shipService = new ShipService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bill_id=$_POST['id1'];
    $transpot=$_POST['transport'];
    if($bill_id!=null){
        $billService->updateBillStatus($bill_id);
        $shipService->addShip($bill_id,$transpot);
        header('Location: ../views/adminBill.php');
        exit();
    }
}