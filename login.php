<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập và Đăng ký</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form action="authenticate.php" method="post">
        <label for="username">Tên đăng nhập:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Đăng nhập">
    </form>

    <h2>Đăng ký</h2>
    <form action="register.php" method="post">
        <label for="new_username">Tên đăng nhập mới:</label><br>
        <input type="text" id="new_username" name="new_username" required><br>
        <label for="new_password">Mật khẩu mới:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <input type="submit" value="Đăng ký">
    </form>
</body>
</html>