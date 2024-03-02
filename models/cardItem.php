<? 
class CartItem {
    private $id;
    private $product_id;
    private $quantity;

    // Constructor
    public function __construct($id, $product_id, $quantity) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}