<?
require_once '../database/database.php';
require_once '../models/pruduct.php';
class ProductService{
    private $conn;
    public function __construct()
    {
        $this->conn=new Database();
    }




//lay toan bo products
    public function getAllProduct(){
        try {
            $sql = "SELECT * FROM `product`";
            $result = $this->conn->prepare($sql);
            $result->execute();

            if ($result) {
                $products = $result->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $products = array();
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $products;
    }



    //lay product theo id
    public function getProductById(int $id){
        try{
        $sql="SELECT * FROM `user` WHERE id=:id ";
        $result= $this->conn->prepare($sql);
        $result->bindParam(':id',$id);
        $result->execute();
        if ($result) {
            $productInfo = $result->fetch(PDO::FETCH_ASSOC); 
            if ($productInfo) {
               
                $product = new Product(
                    $productInfo['id'],
                    $productInfo['name'],
                    $productInfo['category_id'],
                    $productInfo['price'],
                    $productInfo['image'],
                );
               

                return $product;
            }
        } else {
             return null;
        }
        }catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        } 
    } 

}