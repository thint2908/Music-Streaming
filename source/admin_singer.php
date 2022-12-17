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
		<link rel="stylesheet" href="css/admin_singer.css" />
		<link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" />
		<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
		<title>Admin-Singer</title>
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
				<div class="col-lg-10 text-center title">Singer Manager</div>
					<div class="row">
						<div class="col-lg-3"></div>
						<div class="col-lg-5"> 
							<form>
								<div class="col-lg">
					  				<label class="form-label">ID ca sĩ</label>
					  				<input type="text" class="form-control" id="input-singer-id">
								</div>
								<div class="col-lg">
									<label class="form-label">Tên ca sĩ</label>
									<input type="password" class="form-control" id="input-singer-name">
								</div>
								<br>
								<button type="submit" class="btn btn-primary">Thêm</button>
							</form>
						</div>
					</div>
				  	<div class="col-lg-3"></div>

					<div class="row">
						<div class="col-lg-11">
							<table class="table table-striped">                     
								<div class="table responsive">
								  	<thead>
										<tr>
											<th>ID ca sĩ</th>
											<th>Tên ca sĩ</th>
											<th>Vote</th>
											<th>Lượt theo dõi</th>
											<th>Thao tác</th>
										</tr>
								  	</thead>
								  	<tbody>
										<tr>
											<td>1</td>
											<td>Vũ.</td>
											<td>5/5</td>
											<td>5000000</td>
											<td><a href="">chỉnh sửa</a> <a href="">xóa</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Vũ.</td>
											<td>5/5</td>
											<td>5000000</td>
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