<?
require '../services/userService.php';
$userService = new UserService();
$sessionData = $userService->getSession();
echo '<pre>';
print_r($sessionData);
echo '</pre>';
