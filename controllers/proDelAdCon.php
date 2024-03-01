<?
require_once '../services/productService.php';
require_once '../models/checkuser.php';
// $checkSession= new Checkuser();
// if (!$checkSession->checkSession()){
//     header("Location: ../views/login.php");
//     exit;
// }
    $productService = new ProductService();
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
         $id = $_GET['id'];
         $productService->deleteProductById($id);
         header("Location: ../views/adminView.php");
         exit;
    }