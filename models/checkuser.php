<? 
class Checkuser{
    public function __construct(){
    }
    public function checkSessionAdmin(){
        session_start();
        if (isset($_SESSION) && empty($_SESSION)){
            return false;
        }
        else {
            if ($_SESSION['role_id']===1){
                return true;
            }
            else {
                return false;
            }
           
        }
    }

    public function checkSessionUser(){
        session_start();
        if (isset($_SESSION) && empty($_SESSION)){
            return false;
        }
        else {
            if ($_SESSION['role_id']===2){
                return true;
            }
            else {
                return false;
            }
           
        }
    }
}

