<? ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <link href="../resource/static/css/chat.css " rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>

<body>
    <script>
    function scrollToBottom() {
        var chatBody = $('#chat-container');
        chatBody.scrollTop(chatBody[0].scrollHeight);
    }
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
                var count = 0;
                var a;
                $('#chat-container').html('');
                messages.forEach(function(message) {
                    count = count + 1;
                    $('#chat-container').append(
                        '<button class="btn-light btn d-flex flex-column">' +
                        '<span>- ' + message + '</span>' +
                        '</button>');
                    
                });
                if (count >= a) {
                        scrollToBottom();
                        a = count;
                    }


            },
            complete: function() {
                setTimeout(getChatLog, 200);
            }
        });
    }

    // Hàm để gửi tin nhắn lên server
    function sendMessage() {
        var message = $('#input-message').val(); // Corrected ID here
        $.ajax({
            url: '../controllers/userChatController.php',
            type: 'POST',
            data: {
                message: message
            },
            success: function() {
                // Gửi tin nhắn thành công, xóa nội dung ô nhập tin nhắn
                $('#input-message').val(''); // Corrected ID here
            }
        });
    }
    </script>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Chat??
    </button>

    <!-- Modal -->
    <div class="container chat-container">
        <div class="container chat-body " id="chat-container">

        </div>
        <form>
            <div class="row input-chat">
                <div class="col">
                    <input type="text" class="form-control" id="input-message" placeholder="message!">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" onclick="sendMessage()">Send</button>
                </div>
            </div>
        </form>
    </div>



</body>

</html>