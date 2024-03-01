<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WeFood Login</title>
<link rel="stylesheet" href="../resource/static/css/login.css">
</head>
<body>
<div class="container">
    <div class="login-container">
        <img src="../resource/static/img/wefood.png" alt="Wefood logo">
        <h2>Đăng nhập vào tài khoản của bạn</h2>
        <form id="loginForm" action="../controllers/loginController.php" method="post" onsubmit="return validateLoginForm()">
            <div class="input-field">
                <input type="text" id="username" name="username" placeholder="Tài khoản" required>
                <div id="usernameError" class="error"></div>
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
                <div id="passwordError" class="error"></div>
            </div>
            <button type="submit" class="btn">Đăng Nhập</button>
        </form>
        <p class="signup-link">Bạn chưa có tài khoản? <a href="signup.php">Đăng ký</a></p>
    </div>
</div>

<script src="../resource/static/js/login.js"></script>
</body>
</html>