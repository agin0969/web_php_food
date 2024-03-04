<?
require_once '../services/userService.php';
 class RegisterController {
    private $userService;
    public function __construct(){
        $this->userService = new UserService();
    }

    public function signup($username, $password, $email ){
        if($this->userService->getUserByName($username)==null){
            $add=$this->userService->addUserToDataBase($username,$password,$email);
            if($add){
                $this->userService->clearSession();
                $this->userService->startSession();
                $this->userService->setSession($username);
                header("Location: ../views/index.php");
                exit;
                
            }
            else{
                echo('something wrong');
                header("refresh: 10; ../views/signup.php");
            }
            
        }
    }


 }
 $registerController=new RegisterController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $registerController->signup($username,$password,$email);
}


