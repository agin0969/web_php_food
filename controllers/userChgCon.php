<?php
require_once '../services/userService.php';

$userService = new UserService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ biểu mẫu
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];

    // Kiểm tra xem có giá trị nào đó bị trống hay không
    if (empty($name) || empty($password) || empty($email) || empty($role_id)||empty($id)) {
        // Xử lý lỗi, có thể chuyển hướng người dùng về trang trước đó hoặc hiển thị thông báo lỗi
        echo "Vui lòng điền đầy đủ thông tin.";
        exit;
    }

    // Gọi phương thức changeUserInfor để cập nhật thông tin người dùng
    $result = $userService->changeUserInfor($id, $name, $password, $email, $role_id);

    if ($result) {
        // Xử lý thành công, có thể chuyển hướng người dùng hoặc hiển thị thông báo thành công
        header("Location: ../views/adminWithUser.php");

    } else {
        // Xử lý lỗi, có thể chuyển hướng người dùng về trang trước đó hoặc hiển thị thông báo lỗi
        echo "Có lỗi xảy ra khi cập nhật thông tin người dùng.";
    }
} else {
    // Nếu không phải là yêu cầu POST, có thể xử lý theo cách khác tùy thuộc vào yêu cầu của bạn.
    // Ví dụ: Chuyển hướng người dùng hoặc hiển thị trang lỗi.
    echo "Yêu cầu không hợp lệ.";
}
?>
