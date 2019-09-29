<?php
	session_start();
	// CHECK LOGGED STATUS
	if (isset($_SESSION['logged_role'])) {
		switch ($_SESSION['logged_role']) {
			case 'student':
				header('location: student');
				break;
			case 'teacher':
				header('location: teacher');
				break;
			case 'manager':
				header('location: manager');
				break;
			case 'admin':
				header('location: admin');
				break;
		}
	}
	// IF FIRST SIGN IN
	$pass_error = '';
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn-login'])
		&& isset($_POST['username']) && isset($_POST['pass'])) {
		require_once '../php/connection.php';
		$username = trim($_POST['username']);
		$pass = md5($_POST['pass']);
		$sql = "SELECT id, username, role FROM accounts WHERE username='$username' AND password='$pass'";
		$result = $conn->query(htmlspecialchars($sql));
		$row = $result->fetch_assoc();
		$role = $row['role'];
		if ($result && $result->num_rows == 1) {
			// SET SESSION FOR LOGGED ACCOUNT
			$_SESSION['logged_role'] = $role;
			$_SESSION['logged_user'] = $row['username'];
			$_SESSION['logged_id'] = $row['id'];
			// AUTHORIZATION
			if ($role == 'student') {
				header('location: student');
			}
			if ($role == 'teacher') {
				header('location: teacher');
			}
			if ($role == 'manager') {
				header('location: manager');
			}
			if ($role == 'admin') {
				header('location: admin');
			}
		}
		else {
			$pass_error = 'Tài khoản hoặc mật khẩu không đúng !';
		}
	}
?>

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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script>
		// TOASTR CONFIG
		$(document).ready(function() {
			toastr.options = {
			  "closeButton": true,
			  "newestOnTop": true,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": true,
			  "showDuration": "1000",
			  "hideDuration": "1500",
			  "timeOut": "2000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "slideDown",
			  "hideMethod": "slideToggle",
			  "tapToDismiss": true			}
		});
	</script>
	<style>
		.container{
		      border:2px solid grey;
		      text-align:center;
		      
		      height:440px;
		      width:400px;
		      border-radius: 1em;
		  }
		  body{
		      padding:70px;
		      background-image: url('../assets/img/login_bg.jpg');
			  background-size: cover;                      /* <------ */
	          background-repeat: no-repeat;
	          /*background-position: center center; */
		  }
		  h1{
		      margin:auto;
		  }
		  .row{
		      height:90px;
		      width:396px;
		      background-color:paleturquoise;
		      border-radius: 1em 1em 0 0;
		  }
		  #toast-container > div {
		      opacity:1;
		  }
	</style>
</head>
<body>
	<div class="container shadow bg-light" id="login-div">
		<div class="row">
			<h1><i class="fa fa-lock" aria-hidden="true"></i> Login</h1>

		</div><br /><br />


		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
				</div>
				<input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required autofocus />
			</div><br />
			
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-key fa-fw"></i></span>
				</div>
				<input type="password" name="pass" class="form-control" placeholder="Mật khẩu" required/>
			</div><br />
			<div class="text-danger mt-n3 mb-2"><?php echo $pass_error; ?></div>
			<button type="submit" name="btn-login" class="btn btn-success btn-lg btn-block">Đăng nhập</button>
		</form>

		<hr>
		<div class="footer">
			<p>Chưa đăng ký học? <a href="/views/register.php">Đăng ký ngay ! <i class="fa fa-hand-o-left"></i></a></p>
			<p><a href="/"><i class="fa fa-home fa-lg"></i> Trở về trang chủ </a></p>
		</div>

	</div>
	<script>
		$(document).ready(function() {
			if (performance && performance.navigation.type !== 0) {
			<?php
				if (isset($_GET['m'])) {
					$method = $_GET['m'];
					if ($method == 'outted') {
						echo 'toastr.success("Đăng xuất thành công !", "Thông báo");';
					}
				}
			?>
			}
			$('#login-div').animate({
				marginTop: '-250px'
			}, 0).animate({marginTop: 0}, 1000);
		});
	</script>
</body>
</html>