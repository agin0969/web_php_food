<?
require_once '../services/productService.php';
require_once '../models/checkuser.php';
$checkSession= new Checkuser();
if (!$checkSession->checkSessionAdmin()){
    header("Location: ../views/login.php");
    exit;
}
    $productService = new ProductService();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $id = $_POST['id'];
         if($productService->deleteProductById($id))
         {

         header("Location: ../views/adminView.php");
         exit;
         }  else {
            header("Location: ../views/404.php");
            exit;
         }
    }