<?
require_once '../services/productService.php';
require_once '../models/checkuser.php';
require_once '../services/uploadService.php';
$checkSession= new Checkuser();
if (!$checkSession->checkSessionAdmin()){
    header("Location: ../views/login.php");
    exit;
}
    $upload = new UploadService();
    $img=$upload->upload();
    if($img === null){
        $img="../resource/static/img/nothaveimg.png";       
    }
    $productService = new ProductService();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            $name = $_POST['name'];
        $category_id =$_POST['category'];
        $price=$_POST['price'];
        $description=$_POST['descrip'];
        
        $productService->addProductToDb($name, $category_id, $price, $img, $description);     
    }