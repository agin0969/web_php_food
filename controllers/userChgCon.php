<?php
require_once '../services/userService.php';

$userService = new UserService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ biểu mẫu
    $id = $_POST['id1'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];

    if($userService->changeUserInfor($id,$name,$password,$email,$role_id)){
        header("Location: ../views/adminWithUser.php");
         exit;
     }  else {
         header("Location: ../views/404.php");
         exit;
     }
} else {
    // Nếu không phải là yêu cầu POST, có thể xử lý theo cách khác tùy thuộc vào yêu cầu của bạn.
    // Ví dụ: Chuyển hướng người dùng hoặc hiển thị trang lỗi.
    echo "Yêu cầu không hợp lệ.";
}
?>
