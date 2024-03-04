<? 
require_once '../config/init.php';
require_once'../services/productService.php';
require_once'../models/checkuser.php';
$checkSession= new Checkuser();
if (!$checkSession->checkSessionAdmin()){
    header("Location: ../views/login.php");
    exit;
}

$productService = new ProductService();
if (isset($_GET['numbers'])) {
    $numbers = $_GET['numbers'];
    $products = $productService->getProductByListId($numbers);
} else {
    $products = $productService->getAllProduct();
}

$count = 1;

?>


<!doctype html>
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
    <link href="../resource/static/css/adminView.css " rel="stylesheet" type="text/css">
    <script src="../resource/static/js/hideAndShow.js" type="text/javascript"> </script>
    <script>
  
   
    </script>

</head>

<body>
    <div class="bodyy">
        <? include "../resource/frame/sidebarAdmin.php" ?>
        <div class="body-content container-fluid">
            <div class="container-fluid content-header">
                <span>Danh sách sản phẩm</span>
                <form class="d-flex search-box" role="search" action="../controllers/proSeaAdCon.php" method="get">
                    <input class="form-control me-2" type="search" id="search" name="search"
                        placeholder="Search product name" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="container-fluid aa">

                <table class="table table-striped table-container" style="border-radius: 20px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">CategoryId</th>
                            <th scope="col">Price</th>
                            <th scope="col">Img</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <th scope="row">
                                <?php echo $count ?>
                            </th>
                            <td>
                                <?php echo $product->getId() ?>
                            </td>
                            <td>
                                <?php echo $product->getName() ?>
                            </td>
                            <td>
                                <?php echo $product->getCategoryId() ?>
                            </td>
                            <td>
                                <?php echo $product->getPrice() ?>
                            </td>
                            <td>
                                <?php echo $product->getImage() ?>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col ml-1">
                                        <button class="btn btn-outline-success" type="button"
                                            onclick="ddelete(<?php echo $product->getId(); ?>)">Xóa</button>
                                    </div>
                                    <div class="col ml-1">
                                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#product-re"
                                            onclick="getid(<?echo $product->getId()?>)">Sửa</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $count = $count + 1 ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <form id="form-delete" action="../controllers/proDelAdCon.php" method="POST">
                    <input type="hidden" id="id" name="id" value="">
                </form>



            </div>
            <div class="container-fluid ">
                <div class="add-name">
                    <span>Thêm sản phẩm</span>
                </div>
            </div>
            <div class="container ">
                <form class="input-from" action="../controllers/proAddAdCon.php" method="post"
                    enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control col" placeholder="product name">
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <input type="text" id="price" name="price" class="form-control col" placeholder="price">
                    </div>
                    <div class="mb-3 row">
                        <label for="descrip" class="col-sm-2 col-form-label">descrip</label>
                        <input type="text" id="descrip" name="descrip" class="form-control col" placeholder="descrip">
                    </div>
                    <div class="mb-3 row">
                        <label for="category" class="col-sm-2 col-form-label ">cate_id</label>
                        <div class="col">
                            <select class="form-select" aria-label="category" name="category">
                                <option selected>category</option>
                                <option value="1">Món nước</option>
                                <option value="2">Món khô</option>
                                <option value="3">Thức uống</option>
                                <option value="4">Tráng miệng</option>
                            </select>

                        </div>

                    </div>

                    <div class="mb-3 row">
                        <input class="form-control form-control-sm" id="file" type="file" name="file">
                    </div>
                    <input class="btn submit-add btn-secondary" type="submit" value="Thêm sản phẩm" name="submit">

                </form>


                <div class="modal fade" id="product-re" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="input-from" action="../controllers/proChgAdCon.php" method="post"
                                enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="mb-3 row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <input type="text" id="name" name="name" class="form-control col"
                                            placeholder="product name">
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                                        <input type="text" id="price" name="price" class="form-control col"
                                            placeholder="price">
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="descrip" class="col-sm-2 col-form-label">descrip</label>
                                        <input type="text" id="descrip" name="descrip" class="form-control col"
                                            placeholder="descrip">
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="category" class="col-sm-2 col-form-label ">cate_id</label>
                                        <div class="col">
                                            <select class="form-select" aria-label="category" name="category">
                                                <option selected>category</option>
                                                <option value="1">Món nước</option>
                                                <option value="2">Món khô</option>
                                                <option value="3">Thức uống</option>
                                                <option value="4">Tráng miệng</option>
                                            </select>

                                        </div>

                                    </div>
                                    <input type="hidden" id="id1" name="id1">

                                    <div class="mb-3 row">
                                        <input class="form-control form-control-sm" id="file" type="file" name="file">
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" type="submit" value="changes"
                                        name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>




</body>

</html>