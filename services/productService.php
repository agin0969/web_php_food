<?
class ProductService{
    private $conn;
    public function __construct()
    {
        $this->conn=new Database();
    }

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
        } finally {
            $this->conn->closeConn();
        }
        return $products;
    }

}