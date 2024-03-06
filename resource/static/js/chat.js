$(document).ready(function() {
    getChatLog();
});

// Hàm để lấy tin nhắn từ server và cập nhật giao diện người dùng
function getChatLog() {
    $.ajax({
        url: '../controllers/userChatController.php',
        type: 'GET',
        success: function(data) {

            var messages = data.split('\n');
            $('#chat-container').html('');
            messages.forEach(function(message) {
                $('#chat-container').append('<button class="btn-light btn">' +
                    '<span>- '+message+'</span>' +
                    '</button>');

            });
        },
        complete: function() {

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
        data: {
            message: message
        },
        success: function() {
            // Gửi tin nhắn thành công, xóa nội dung ô nhập tin nhắn
            $('#message-input').val('');
        }
    });
}