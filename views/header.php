<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Document</title>
     <!-- Liên kết jQuery trước khi sử dụng -->
     <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
     <script src="..//resource/static/js/header.js"></script>
</head>
<body>
    <header>
        <div class="inner-header container">
            <a href="" class="logo">WEFOOD</a>
            <nav>
                <ul id="main-menu">
                    <li id = "milktea"><a href="#" onclick="showFoodbox('milk_tea')">trà sữa</a></li>
                    <li><a href="#" onclick="showFoodbox('fast_food')">ăn vặt</a></li>
                    <li><a href="#" onclick="showFoodbox('drink')">đồ uống</a></li>
                    <li><a href="#" onclick="showFoodbox('lunch')">combo trưa</a></li>
                    <li><a href="#" onclick="showFoodbox('breakfast')">combo sáng</a></li> 
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>