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




<!DOCTYPE html>
<html lang="en">

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

</html>