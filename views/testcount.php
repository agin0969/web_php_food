<? 
 require_once'../services/productService.php';
$productService=new ProductService();
echo $productService->   getProductCount() ;
    
?>