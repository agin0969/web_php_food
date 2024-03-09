<?
 require_once '../database/database.php';
 require_once '../models/bill.php';

class BillService{
    private $conn;
    public function __construct(){
        $this->conn=new Database();
    }

    public function addToBill($cartId, $totalPrice, $diaChi, $sdt, $status)
    {
        try {
           
            $sql = "INSERT INTO hoadon (cart_id, total_price, dia_chi, sdt, ngay_tao, status)
                    VALUES (:cart_id, :total_price, :dia_chi, :sdt, NOW(), :status)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->bindParam(':total_price', $totalPrice);
            $stmt->bindParam(':dia_chi', $diaChi);
            $stmt->bindParam(':sdt', $sdt);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            
            die("Error: " . $e->getMessage());
        }
    }

    public function getAllBill(){
        try {
            $sql = "SELECT * FROM `hoadon`";
            $result = $this->conn->prepare($sql);
            $result->execute();

            $bills = array();

            if ($result) {
                $billData = $result->fetchAll(PDO::FETCH_ASSOC);

                foreach ($billData as $data) {
                    $bill = new Bill(
                        $data['id'],
                        $data['cart_id'],
                        $data['total_price'],
                        $data['dia_chi'],
                        $data['sdt'],
                        $data['ngay_tao'],
                        $data['status']
                    );

                    $bills[] = $bill;
                }
            } else {
                $bills = array();
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $bills;
    }

    public function getBillByCartId($cartId) {
        try {
            $sql = "SELECT * FROM `hoadon` WHERE `cart_id` = :cartId";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cartId', $cartId);
            $stmt->execute();
    
            $bills = array();
    
            if ($stmt) {
                $billData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                foreach ($billData as $data) {
                    $bill = new Bill(
                        $data['id'],
                        $data['cart_id'],
                        $data['total_price'],
                        $data['dia_chi'],
                        $data['sdt'],
                        $data['ngay_tao'],
                        $data['status']
                    );
    
                    $bills[] = $bill;
                }
            } else {
                $bills = array();
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    
        return $bills;
    }


}