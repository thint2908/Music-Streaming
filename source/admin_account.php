<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- CSS only -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
			crossorigin="anonymous" />
		<link rel="stylesheet" href="css/responsive.css" />
		<link rel="stylesheet" href="css/admin_account.css" />
		<link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" />
		<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
		<title>Admin-Account</title>
	</head>
    <body>
		<div class="row">
			<div class="col-lg-3">
				<div class="sidenav">
					<h1 class="admin">ADMIN</h1>
					
					<a class="option" href="admin_song.php">Songs</a>
					<a class="option" href="admin_singer.php">Singers</a>
					<a class="option" href="admin_account.php">Accounts</a>
					
					
					<a class="logout" href="#contact">Log out ></a>
				</div>
			</div>
			<div class="col-lg">
				<div class="col-lg-10 text-center title">Account Manager</div>
					

					<div class="row">
						<div class="col-lg-11">
							<table class="table table-striped">                     
								<div class="table responsive">
								  	<thead>
										<tr>
											<th>ID tài khoản</th>
											<th>Tên tài khoản</th>
											<th>Mật khẩu</th>
											<th>Email</th>
											<th>Tên người dùng</th>
											<th>Thao tác</th>
										</tr>
								  	</thead>
								  	<tbody>
										<tr>
											<td>1</td>
											<td>abc</td>
											<td>123</td>
											<td>abc@gmail.com</td>
											<td>Nguyễn Văn A</td>
											<td><a href="">chỉnh sửa</a> <a href="">xóa</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>abc</td>
											<td>123</td>
											<td>abc@gmail.com</td>
											<td>Nguyễn Văn A</td>
											<td><a href="">chỉnh sửa</a> <a href="">xóa</a></td>
										</tr>
								  	</tbody>
								</div>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
