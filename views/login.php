<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.container{
		      border:2px solid blue;
		      text-align:center;
		      
		      height:440px;
		      width:400px;
		  }
		  body{
		      padding:70px;
		  }
		  h1{
		      margin:auto;
		  }
		  .row{
		      height:90px;
		      width:396px;
		      background-color:paleturquoise;
		  }
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1><i class="fa fa-lock" aria-hidden="true"></i> Đăng nhập</h1>

		</div><br /><br />


		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-user pr-1"></i></span>
			</div>
			<input type="text" name="" class="form-control" placeholder="username"/>
		</div><br />

		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-key"></i></span>
			</div>
			<input type="Password" name="" class="form-control" placeholder="password"/>
		</div><br />
		<button type="submit" class="btn btn-success btn-lg btn-block">Login</button>

		<hr>
		<div class="footer">
			<p>Chưa đăng ký học? <a href="#">Đăng ký ngay !</a></p>
			<p><a href="/"><i class="fa fa-home"></i> Trở về trang chủ </a></p>
		</div>

	</div>
</body>
</html>