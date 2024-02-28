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
<script src="login.js"></script>
</body>
</html>
