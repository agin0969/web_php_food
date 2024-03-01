<?
require_once '../services/uploadService.php';
$upload = new UploadService();
if ($upload) {
  header("Location: ../views/index.php");
} else {
  header("Location: ../views/upload.php");
}

