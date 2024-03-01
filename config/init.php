<?
require_once'config.php';

// File: init.php


if (session_id() === '') {
    session_start();
}

function errorHandler($level, $message, $file, $line) {
    throw new ErrorException($message, 0, $level, $file, $line);
}

function exceptionHandler($ex) {
    if (DEBUG) {
        echo "<h2>Lỗi:</h2>";
        echo "<p>Ngoại lệ: " . get_class($ex) . "</p>";
        echo "<p>Nội dung: " . $ex->getMessage() . "</p>";
        echo "<p>Tập tin: " . $ex->getFile() . " dòng thứ " . $ex->getLine() . "</p>";
    } else {
        echo "<h2>Lỗi. Vui lòng thử lại</h2>";
    }

    exit;
}
set_error_handler("errorHandler");
set_exception_handler("exceptionHandler");
