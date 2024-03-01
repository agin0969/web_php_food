<?
require_once '../database/database.php';
require_once '../models/product.php';
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
                $productdata = $result->fetchAll(PDO::FETCH_ASSOC);
                $products = array();
            foreach ($productdata as $data) {
                $product = new Product(
                    $data['id'],
                    $data['name'],
                    $data['category_id'],
                    $data['price'],
                    $data['image']
                );
                $products[] = $product;
            }
                
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
        $sql="SELECT * FROM `product` WHERE id=:id ";
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
    public function getIdProductByNameLike($name){
        try {
            $namelike = "%$name%";
            $sql = "SELECT * FROM `product` WHERE name LIKE :namelike ";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':namelike', $namelike);
            $result->execute();
            if ($result) {
                $productdata = $result->fetchAll(PDO::FETCH_ASSOC);
                $ids = array();
            foreach ($productdata as $data) {
                $id = $data['id'];
                $ids[] = $id;
            }
                
            } else {
                $ids = array();
            }
            return $ids;
         

        } catch (PDOException $e) {
            die("Lỗi: " . $e->getMessage());
        }
    }

    public function getProductByListId($ids){
        try {
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $sql = "SELECT * FROM `product` WHERE id IN ($placeholders)";
            $result = $this->conn->prepare($sql);
            $result->execute($ids);
    
            $productdata = $result->fetchAll(PDO::FETCH_ASSOC);
            $products = array();
            foreach ($productdata as $data) {
                $product = new Product(
                    $data['id'],
                    $data['name'],
                    $data['category_id'],
                    $data['price'],
                    $data['image']
                );
                $products[]=$product;
            }
            return $products;
        } catch (PDOException $e) {
            die("Lỗi: " . $e->getMessage());
        }
    }
    

}