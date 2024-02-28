<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WeFood Sign Up</title>
<link rel="stylesheet" href="../resource/static/css/login.css">
</head>
<body>
<div class="container">
    <div class="login-container">
        <img src="../resource/static/img/wefood.png" alt="Wefood logo">
        <h2>Tạo tài khoản của bạn</h2>
        <form action="../controllers/registerController.php" method="post">
            <div class="input-field">
                <input type="text" name="username" placeholder="Tài khoản" required>
            </div>
            <div class="input-field">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <button type="submit" class="btn">Đăng Ký</button>
        </form>
        <p class="signin-link">Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </div>
</div>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
        echo "Tên tài khoản chỉ được chứa các ký tự chữ và số.";
        exit;
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email không hợp lệ.";
        exit; 
    }

    
    if (strlen($password) < 8) {
        echo "Mật khẩu phải có ít nhất 8 ký tự.";
        exit; 
    }

  
    echo "Đăng ký thành công!";
    
    header("Location: login.php");
    exit; 
}
?>
