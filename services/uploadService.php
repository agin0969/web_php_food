<?
require_once '../models/errorFileUpload.php';
require_once '../config/init.php';
require_once '../services/dialog.php';

class UploadService{
  public function __construct(){
      $this->upload();
  }
  public function upload()  {
      $flag=false;
      try {
          if (empty($_FILES)) {
              throw new Exception('Không thể upload tập tin.');
          }

          $errorCode = $_FILES['file']['error'];
          $rs = ErrorFileUpload::getErrorMessage($errorCode);

          if ($rs !== 'OK') {
              Dialog::show($rs);
              $flag=true;
          }

          $fileMaxSize = FILE_MAX_SIZE;
          if ($_FILES['file']['size'] > $fileMaxSize) {
              Dialog::show("Kích thước tập tin phải nhỏ hơn hoặc bằng $fileMaxSize bytes.");
              
          }

          $mineTypes = FILE_TYPE;
          $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
          $fileMineType = finfo_file($fileInfo, $_FILES['file']['tmp_name']);

          if (!in_array($fileMineType, $mineTypes)) {
              Dialog::show('Kiểu tập tin phải là hình ảnh.');
              
          }

          $pathInfo = pathinfo($_FILES['file']['name']);
          $filename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $pathInfo['filename']);
          $extension = $pathInfo['extension'];
          
          $baseFileToHost = "../resource/static/img/" . $filename . '.' . $extension;
          $fileToHost = $baseFileToHost;
          $i = 1;
          
          while (file_exists($fileToHost)) {
              $fileToHost = "../resource/static/img/"."$i-".$filename . '.' . $extension;
              $i++;
          }
          
          $fullname = pathinfo($fileToHost, PATHINFO_BASENAME);
          

          $fileTmp = $_FILES['file']['tmp_name'];

          if (move_uploaded_file($fileTmp, $fileToHost)) {
              $flag = true;
          } else {
              $flag=false;
          }
      } catch (Exception $e) {
          Dialog::show($e->getMessage());
      }
  }



  
}