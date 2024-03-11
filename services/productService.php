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
                    $data['image'],
                    $data['description']
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
    public function deleteProductById($id) {
        try{
            $product=$this->getProductById($id);
            $img=$product->getImage();
            $sql="DELETE FROM `product` WHERE id=:id ";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':id',$id);
            $result->execute();
            if (file_exists($img)){
                unlink($img);
               
            }
            return true;
        }
        catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            } 
        
    }
    public function addProductToDb($name, $category_id, $price, $image, $description){
        try{
            
            $sql="INSERT INTO `product` (name, category_id, price, image, description) VALUES (:name, :category_id, :price, :image, :description)";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':name',$name);
            $result->bindParam(':category_id',$category_id);
            $result->bindParam(':price',$price);
            $result->bindParam(':image',$image);
            $result->bindParam(':description',$description);
            $result->execute();
            if($result){
                return true;
            } 
            }catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
    }

    public function changeProduct($id, $name, $category_id, $price, $image, $description)
    {
        try {
            $updateFields = [];
    
            if (!empty($name)) {
                $updateFields[] = "name = :name";
            }
            if (!empty($category_id) && is_numeric($category_id)) {
                $updateFields[] = "category_id = :category_id";
            }
            if (!empty($price)) {
                $updateFields[] = "price = :price";
            }
            if (!empty($image)) {
                $updateFields[] = "image = :image";
            }
            if (!empty($description)) {
                $updateFields[] = "description = :description";
            }
    
           
            if (empty($updateFields)) {
                return false;
            }
    
            $updateString = implode(', ', $updateFields);
    
            $sql = "UPDATE `product` SET $updateString WHERE id = :id";
    
            $result = $this->conn->prepare($sql);
    
            if (!empty($name)) {
                $result->bindParam(':name', $name);
            }
            if (!empty($category_id) && is_numeric($category_id)) {
                $result->bindParam(':category_id', $category_id);
            }
            if (!empty($price)) {
                $result->bindParam(':price', $price);
            }
            if (!empty($image)) {
                $result->bindParam(':image', $image);
            }
            if (!empty($description)) {
                $result->bindParam(':description', $description);
            }
    
            $result->bindParam(':id', $id);
    
            $result->execute();
    
            return true;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
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
                    $productInfo['description']
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
            if(count($ids)===0){
                return $products=array();
            }
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $sql = "SELECT * FROM `product` WHERE id IN ($placeholders)";
            $result = $this->conn->prepare($sql);
            $result->execute($ids);
            if($result){
            $productdata = $result->fetchAll(PDO::FETCH_ASSOC);
            $products = array();
            foreach ($productdata as $data) {
                $product = new Product(
                    $data['id'],
                    $data['name'],
                    $data['category_id'],
                    $data['price'],
                    $data['image'],
                    $data['description']
                );
                $products[]=$product;
            }
            
        } else {
            $products=array();
        }
            return $products;
        } catch (PDOException $e) {
            die("Lỗi: " . $e->getMessage());
        }
    }
    public function getProductCount() {
        try {
            $sql = "SELECT COUNT(*) AS total FROM `product`";
            $result = $this->conn->prepare($sql);
            $result->execute();
    
            if ($result) {
                $count = $result->fetch(PDO::FETCH_ASSOC);
                return isset($count['total']) ? (int)$count['total'] : 0;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    

}
