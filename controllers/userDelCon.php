<?
require_once '../services/userService.php';
require_once '../models/checkuser.php';
// $checkSession= new Checkuser();
// if (!$checkSession->checkSession()){
//     header("Location: ../views/login.php");
//     exit;
// }
    $userService = new UserService();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $id = $_POST['id'];
         $userService->deleteUserById($id);
         header("Location: ../views/adminWithUser.php");
         exit;
    }