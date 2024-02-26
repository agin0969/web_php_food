<?

//class chua cac method CRUD lien quan den user
class UserService{
    private $conn;

    public function __construct()
    {
        $this->conn=new Database();
    }



    //xac minh user bang username va password
    public function authUser(string $username,string $password) {
        $sql="SELECT * FROM `user` WHERE name=:username ";
        $result= $this->conn->prepare($sql);
        $result->bindParam(':username',$username);
        $result->execute();
        if ($result){
            $userInfo = $result->fetch(PDO::FETCH_ASSOC); 
            if(password_hash($userInfo['password'],PASSWORD_DEFAULT)==$password) {
                $this->conn->closeConn();
                return true;
            } else {
                $this->conn->closeConn();
            return false;
            }
           
            
        } else {
            $this->conn->closeConn();
            return false;
           
        }
    }




    //tra ve doi tuong user theo username
    public function getUserByName(string $username){
        $sql="SELECT * FROM `user` WHERE name=:username ";
        $result= $this->conn->prepare($sql);
        $result->bindParam(':username',$username);
        $result->execute();
        if ($result) {
            $userInfo = $result->fetch(PDO::FETCH_ASSOC); 
            if ($userInfo) {
               
                $user = new User(
                    $userInfo['id'],
                    $userInfo['name'],
                    $userInfo['password'],
                    $userInfo['email'],
                    $userInfo['role_id']
                );
                $this->conn->closeConn();

                return $user;
            }
        }
        return null;
    }

   
}