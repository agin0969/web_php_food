<?
require_once'../database/database.php';
require_once'../models/user.php';

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
            if($userInfo){
                if(password_verify($password, $userInfo['password'])) {
                   
                    return true;
                } else {
                   
                    return false;
                }
            }
        } else {
           
            return false;
        }
        }
        catch (PDOException $e) {
            die("Error: " . $e->getMessage());
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
               

                return $user;
            }
        } else {
             return null;
        }
        }catch (PDOException $e) {
            die("Error: " . $e->getMessage());
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
                   
    
                    return $userId;
                }
            } else {
                return false;
            }
            }catch (PDOException $e) {
                die("Error: " . $e->getMessage());
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
                    
    
                    return $userRole;
                }
            } else {
                return "user";
            }
            }catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            } 

    }

    public function addUserToDataBase($username,$password,$email){
        try{
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $roleService = new RoleService();
            $roleId=$roleService->getRoleIdByName('user');
            $sql="INSERT INTO `user` (name, password, email, role_id) VALUES (:username, :password, :email, :role_id)";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':username',$username);
            $result->bindParam(':password',$hashedPassword);
            $result->bindParam(':email',$email);
            $result->bindParam(':role_id',$roleId);
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

    public function startSession(){
        return session_start();
    }

    public function setSession($username) {
        $user=$this->getUserByName($username);
        $_SESSION['username']=$user->getUsername();
        $_SESSION['id']=$user->getId();

        $_SESSION['role_id']=$user->getRoleId();

        
    }
    public function getSession() {
        $this->startSession();
        $desiredVariables = ['username', 'id', 'role_id'];
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