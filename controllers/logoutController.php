<?
require '../services/userService.php';
session_start();
$userService= new UserService();

    if(isset($_SESSION['id'])){
        $userService->clearSession();
        header('Location: ../views/index.php');
    } else echo 'ngo';
