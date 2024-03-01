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
    public function deleteProductById($id) {
        try{
            $sql="DELETE FROM `product` WHERE id=:id ";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':id',$id);
            $result->execute();
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
            } else {
                return false;
            }
            }catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
    }

    public function changeProduct($id, $name, $category_id, $price, $image, $description)
{
    try {
        if(!empty($name)){
            $strname="name=:name";
        } else {
            $strname=" ";
        }
        if(!empty($category_id)){
            if(!empty($name)){
            $strcate=", category_id=:category_id";
            } else {
                $strcate="category_id=:category_id";
            }
        } else {
            $strcate=" ";
        }
        if(!empty($price)){
            if(!empty($category_id)){
                $strpri=", price=:price";
            } else {
                $strpri="price=:price";
            }
            
        } else {
            $strpri=" ";
        }
        if(!empty($image)){
            if(!empty($price)){
            $strimg=", image= :image";
            } else {
                $strimg="image= :image";
            }
        } else {
            $strimg=" ";
        }
        
        if(!empty($description)){
            if(!empty($image)){
            $strdes=", description=:description";
            } else {
                $strdes="description=:description";
            }
        } else {
            $strdes=" ";
        }
        $str=$strname.$strcate.$strpri.$strimg.$strdes;
        if($str===""){
            return false;
        }
        $sql = "UPDATE `product` SET " . $str . " WHERE id=:id";

        $result = $this->conn->prepare($sql);

        if (!empty($name)) {
            $result->bindParam(':name', $name);
        }
        if (!empty($category_id)) {
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