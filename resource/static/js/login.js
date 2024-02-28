function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;
    
    var usernamePattern = /^[a-zA-Z0-9]*$/;
    if (!username.match(usernamePattern)) {
        alert('Mật khẩu phải có ít nhất 6 ký tự.');
        return false;
    }
    
   
    if (password.length < 6) {
        alert('Password must be at least 6 characters long. Please try again.');
        return false;
    }

   
    if (!validateEmail(email)) {
        alert('Email không hợp lệ.');
        return false;
    }

    return true; // Nếu tất cả dữ liệu hợp lệ
}

function validateEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return email.match(emailPattern);
}