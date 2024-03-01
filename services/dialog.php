<?
class Dialog {
    public static function show($message) {
        if (DEBUG) {
            echo "<h2>Lỗi:</h2>";
            echo "<p>Thông báo: $message</p>";
        } else {
            echo "<h2>Lỗi. Vui lòng thử lại</h2>";
        }

        exit;
    }
}