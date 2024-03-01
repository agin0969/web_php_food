<? require_once '../services/productService.php';
require_once '../models/checkuser.php';
require_once '../services/uploadService.php';
// $checkSession= new Checkuser();
// if (!$checkSession->checkSession()){
//     header("Location: ../views/login.php");
//     exit;
// }

$upload = new UploadService();
$img=$upload->upload();
$productService = new ProductService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name'];
    $id = $_POST['id'];
    $category_id =$_POST['category'];
    $price=$_POST['price'];
    $description=$_POST['descrip'];
    $productService->changeProduct($id,$name, $category_id, $price, $img, $description);

    
    
    
}