<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Chat</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div id="chat-container">
    <div id="chat-log"></div>
    <input type="text" id="message-input" placeholder="Nhập tin nhắn...">
    <button onclick="sendMessage()">Gửi</button>
</div>

<script>
// Lấy tin nhắn khi trang web được tải
$(document).ready(function() {
    getChatLog();
});

// Hàm để lấy tin nhắn từ server và cập nhật giao diện người dùng
function getChatLog() {
    $.ajax({
        url: '../controllers/userChatController.php',
        type: 'GET',
        success: function(data) {
            $('#chat-log').html(data);
        },
        complete: function() {
            // Lặp lại hàm mỗi 2 giây để kiểm tra tin nhắn mới
            setTimeout(getChatLog, 200);
        }
    });
}

// Hàm để gửi tin nhắn lên server
function sendMessage() {
    var message = $('#message-input').val();
    $.ajax({
        url: '../controllers/userChatController.php',
        type: 'POST',
        data: {message: message},
        success: function() {
            // Gửi tin nhắn thành công, xóa nội dung ô nhập tin nhắn
            $('#message-input').val('');
        }
    });
}
</script>

</body>
</html>
