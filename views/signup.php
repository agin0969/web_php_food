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
<script>
function validateForm() {
    var username = document.forms["signupForm"]["username"].value;
    var email = document.forms["signupForm"]["email"].value;
    var password = document.forms["signupForm"]["password"].value;
    
   
    var usernameRegex = /^[a-zA-Z0-9]+$/;
    if (!usernameRegex.test(username)) {
        alert("Tên tài khoản chỉ được chứa các ký tự chữ và số.");
        return false;
    }

   
    var emailRegex = /\S+@\S+\.\S+/;
    if (!emailRegex.test(email)) {
        alert("Email không hợp lệ.");
        return false;
    }

    
    if (password.length < 12) {
        alert("Mật khẩu phải có ít nhất 12 ký tự.");
        return false;
    }

  
    alert("Đăng ký thành công!");
    window.location.href = "login.html";
    return false; 
}
</script>

</body>
</html>
