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
        try {

        
        $sql="SELECT * FROM `user` WHERE name=:username ";
        $result= $this->conn->prepare($sql);
        $result->bindParam(':username',$username);
        $result->execute();
        if ($result){
            $userInfo = $result->fetch(PDO::FETCH_ASSOC); 
            if(password_verify($password, $userInfo['password'])) {
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
        catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        } 
        finally {
            $this->conn->closeConn();
        }
    }




    //tra ve doi tuong user theo username
    public function getUserByName(string $username){
        try{
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
        } else {
             return null;
        }
        }catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        } finally {
            $this->conn->closeConn();
        }
    }
    public function getIdByUsername($username){
        try{
            $sql="SELECT * FROM `user` WHERE name=:username ";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':username',$username);
            $result->execute();
            if ($result) {
                $userInfo = $result->fetch(PDO::FETCH_ASSOC); 
                if ($userInfo) {
                   
                   $userId=$userInfo['id'];
                    $this->conn->closeConn();
    
                    return $userId;
                }
            } else {
                return null;
            }
            }catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            } finally {
                $this->conn->closeConn();
            }

    }

    public function getRoleByUsername($username){
        try{
            $sql="SELECT * FROM `user` WHERE name=:username ";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':username',$username);
            $result->execute();
            if ($result) {
                $userInfo = $result->fetch(PDO::FETCH_ASSOC); 
                if ($userInfo) {
                   
                   $userRole=$userInfo['role'];
                    $this->conn->closeConn();
    
                    return $userRole;
                }
            } else {
                return "user";
            }
            }catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            } finally {
                $this->conn->closeConn();
            }

    }

    public function startSession(){
        return session_start();
    }

    public function setSession($username , $password) {
        $_SESSION['$username']=$username;
        $_SESSION['$password']=$password;
        $_SESSION['$id']=$this->getIdByUsername($username);
        $_SESSION['$role']=$this->getRoleByUsername($username);
    }
    public function getSession() {
        session_start();
        $desiredVariables = ['username', 'password', 'id', 'role'];
        $sessionData = [];
        foreach ($desiredVariables as $variable) {
            if (isset($_SESSION[$variable])) {
                $sessionData[$variable] = $_SESSION[$variable];
            }
        }
        return $sessionData;
    }

    public function clearSession(){
        return session_destroy();
    }

   
}