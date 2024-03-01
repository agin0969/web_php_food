<?php
require_once '../config/init.php';


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>



    <div class="container">
        <aside class="sidebar">
            <!-- Nội dung của Sidebar ở đây -->
            <ul>
                <li>Menu Item 1</li>
                <li>Menu Item 2</li>
                <li>Menu Item 3</li>
            </ul>
        </aside>
        <main class="content">
            <form action="../controllers/uploadController.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="file" id="file">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </main>
    </div>

</body>

</html>