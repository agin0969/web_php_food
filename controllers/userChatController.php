<?php
// Lấy dữ liệu từ client
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];
    file_put_contents('../resource/static/chat/chatlog.txt', $message.PHP_EOL, FILE_APPEND | LOCK_EX);
    exit();
}

$chatLog = file_get_contents('../resource/static/chat/chatlog.txt');
echo $chatLog;
?>