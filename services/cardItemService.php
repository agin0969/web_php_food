<?
require_once '../database/database.php';
require_once '../models/cardItem.php';

class CardItemService{
    private $conn;
    public function __construct(){
        $this->conn=new Database();
    }
}