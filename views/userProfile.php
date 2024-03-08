<<<<<<< HEAD
<?php
require '../services/userService.php';

$userService = new UserService();
$sessionData = $userService->getSession();

if (!empty($sessionData)) {
    $userId = $sessionData['id'];

     
    // Lấy thông tin người dùng sau khi đã cập nhật (hoặc không)
    $user = $userService->getUserById($userId);

    if ($user) {
		$userId = $user->getId();
        $userName = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
		$role_id = $user->getRoleId();
    }
}
?>


=======
>>>>>>> ab3f16aaa61899c3234509c6e01df3b03dade6e5


<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../resource/static/css/userProfile.css">

	<title>Document</title>
</head>

<body>
	<div id="DIV_1">
		<div id="DIV_2">
			<div id="DIV_3">
				<div id="DIV_4">
					<div id="DIV_5">
						<h1 id="H1_6">
							Hồ sơ của tôi
						</h1>
						<div id="DIV_7">
							Quản lý thông tin hồ sơ để bảo mật tài khoản
						</div>
					</div>
					<div id="DIV_8">
						<div id="DIV_9">
						<form action="../controllers/userChgCon.php" method="post"enctype="multipart/form-data" id= "FORM_10">
								<table id="TABLE_11">
								<tr id="TR_19">
										<td id="TD_20">
											<label id="LABEL_21">
												User ID
											</label>
										</td>
										<td id="TD_22">
											<div id="DIV_23">
												<div id="DIV_24">
													<input type="text" value="<?php echo $userId; ?>" name ="id1" id="INPUT_25" readonly />
												</div>
											</div>
										</td>
									</tr>
									<tr id="TR_19">
										<td id="TD_20">
											<label id="LABEL_21">
												Tên
											</label>
										</td>
										<td id="TD_22">
											<div id="DIV_23">
												<div id="DIV_24">
													<input type="text" value="<?php echo $userName; ?>" name="name" id="INPUT_25" readonly />
												</div>
											</div>
										</td>
									</tr>
									<tr id="TR_26">
										<td id="TD_27">
											<label id="LABEL_28">
												Email
											</label>
										</td>
										<td id="TD_22">
											<div id="DIV_23">
												<div id="DIV_24">
													<input type="text" value="<?php echo $email; ?>" name="email" id="INPUT_25" />
												</div>
											</div>
										</td>
									</tr>
									<tr id="TR_33">
										<td id="TD_34">
											<label id="LABEL_35">
												Pass Word
											</label>
										</td>
										<td id="TD_22">
											<div id="DIV_23">
												<div id="DIV_24">
													<input type="password" value="<?php echo $password; ?>" name="password" id="INPUT_25" />
												</div>
											</div>
										</td>
									</tr>
									<tr id="TR_19">
										<td id="TD_20">
											<label id="LABEL_21">
												ROLE
											</label>
										</td>
										<td id="TD_22">
											<div id="DIV_23">
												<div id="DIV_24">
													<input type="text" value="<?php echo $role_id; ?>" name="role_id" id="INPUT_25" readonly />
												</div>
											</div>
										</td>
									</tr>
									<tr id="TR_87">
										<td id="TD_88">
											<label id="LABEL_89">
											</label>
										</td>
										<td id="TD_90">
        									<button type="submit">Lưu</button>
												
										</td>
									</tr>
								</table>
							</form>
						</div>
						<div id="DIV_92">
							<div id="DIV_93">
								<div id="DIV_94">
									<div id="DIV_95">
										<svg id="svg_96">
											<g id="g_97">
												<circle id="circle_98">
												</circle>
												<path id="path_99">
												</path>
											</g>
										</svg>
									</div>
								</div>
								<input type="file" accept=".jpg,.jpeg,.png" id="INPUT_100" />
								<button type="button" id="BUTTON_101">
									Chọn ảnh
								</button>
								<div id="DIV_102">
									<div id="DIV_103">
										Dụng lượng file tối đa 1 MB
									</div>
									<div id="DIV_104">
										Định dạng:.JPEG, .PNG
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

=======
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <style>
        .content{
            display: flex;
            justify-content: center;
        }
        .header{
            font-size: 26px;
            color: black;
            justify-content: center;
            align-items: center;
            display: flex;
            padding: 30px 20px;
            border-radius: 3px ;
            border-top: 3px solid tomato;
            border-bottom: 3px solid tomato;
            margin: 10px 20px;
            margin-left: 310px;
            width: 800px;
        }
        .form{
            width: 600px;
            height: 400px;
            border: 3px solid tomato;
            margin-right: 15px;
        }
        .avt_profile img{
            width: 250px;
            height: 150px;
        }
        .avt_profile{
            margin-left: 15px;
        }
    </style>
    <form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
    <div class="avt_profile">
        <img src="../resource/static/img/12.jpg" alt="avt">
        <span></span>
    </div>
    
</body>
>>>>>>> ab3f16aaa61899c3234509c6e01df3b03dade6e5
</html>