<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lalezar&display=swap" rel="stylesheet">
	<!-- EXTERNAL CSS -->
	<link rel="stylesheet" href="assets/css/homepage.css">
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	    	<!-- <img src="/assets/img/logo_ctu.gif" alt="logo" style="height: 2rem"> -->
	    	Quản lý đào tạo
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

	      <div class="collapse navbar-collapse" id="collapsibleNavbar">
	      	<ul class="navbar-nav ml-auto">
	      	  <li class="nav-item active">
	      	  <!--<li class="nav-item">
	      	    <a class="nav-link" href="#"><i class="fa fa-globe"></i> vi</a>
	      	  </li> -->
	      	    <a class="nav-link" href="#">Trang chủ</a>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="#footer-link">Liên hệ</a>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="./views/program_list.php">Chương trình đào tạo</a>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="./views/register.php">Đăng ký học</a>
	      	  </li>
	      	  <li class="nav-item">
	      	    <a class="nav-link" href="./views/login.php">Đăng nhập</a>
	      	  </li>
	      	</ul>
	      </div>
	  </div>
	</nav>

	<!-- Page Content -->
	<div class="container-fluid">
	  <!-- <h1 class="mt-4" style="font-family: sans-serif;">Hệ thống quản lý đào tạo</h1> -->
	  <div class="row">
	  	<div class="col-md-12 p-0">
	  		<div id="main-carousel" class="carousel slide" data-ride="carousel" data-interval="2500" data-pause="false">
	  		  <ul class="carousel-indicators">
	  		    <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
	  		    <li data-target="#main-carousel" data-slide-to="1"></li>
	  		    <li data-target="#main-carousel" data-slide-to="2"></li>
	  		  </ul>
			  	<div id="btn-register" class="btn text-white font-weight-bold border pb-4">
			  		<div id="central-name" class="">Trung tâm đào tạo Lập trình viên PTST</div>
			  		<a href="views/register.php" id="carouse-link" class="btn btn-lg btn-success">Đăng ký ngay !</a>
			  	</div>
	  		  <div class="carousel-inner">
	  		    <div class="carousel-item active">
	  		      <img src="/assets/img/office-desk.jpg" alt="Los Angeles" width="1100" height="500">
	  		      <div class="carousel-caption">
	  		        <h3>Chất lượng</h3>
	  		        <p>Là mục tiêu hoạt động của chúng tôi !</p>
	  		      </div>   
	  		    </div>
	  		    <div class="carousel-item">
	  		      <img src="/assets/img/keyboard.jpg" alt="Chicago" width="1100" height="500">
	  		      <div class="carousel-caption">
	  		        <h3>Kiến thức</h3>
	  		        <p>Là những gì chúng tôi muốn đem đến cho bạn !</p>
	  		      </div>   
	  		    </div>
	  		    <div class="carousel-item">
	  		      <img src="/assets/img/graduation.jpg" alt="New York" width="1100" height="500">
	  		      <div class="carousel-caption">
	  		        <h3 class="text">Thành công</h3>
	  		        <p>Là những gì chúng tôi tin ở bạn !</p>
	  		      </div>   
	  		    </div>
	  		  </div>
	  		  <a class="carousel-control-prev" href="#main-carousel" data-slide="prev">
	  		    <span class="carousel-control-prev-icon"></span>
	  		  </a>
	  		  <a class="carousel-control-next" href="#main-carousel" data-slide="next">
	  		    <span class="carousel-control-next-icon"></span>
	  		  </a>
	  		</div>
	  	</div>
	  </div>
	  <!-- END CAROUSEL -->
	  <div class="row my-4 px-md-5">
	  	<div class="col-md-4">
	  		<div class="card shadow">
	  		    <img class="card-img-top" src="assets/img/lang_php.png" alt="Lập trình viên PHP">
	  		    <div class="card-body bg-light">
	  		      <h4 class="card-title">Lập trình viên PHP</h4>
	  		      <p class="card-text">Ngôn ngữ lập trình phía server phổ biến trên các hệ thống máy chủ hiện nay !</p>
	  		      <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> Đăng ký học</a>
	  		    </div>
	  		  </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="card shadow">
	  		    <img class="card-img-top border-bottom" src="assets/img/lang_nodejs.png" alt="Lập trình viên NodeJs">
	  		    <div class="card-body bg-light">
	  		      <h4 class="card-title">Lập trình viên NodeJs</h4>
	  		      <p class="card-text">Ngôn ngữ cực kỳ mạnh mẽ, thích hợp cho các hệ thống real-time tương tác cao.</p>
	  		      <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> Đăng ký học</a>
	  		    </div>
	  		  </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="card shadow">
	  		    <img class="card-img-top border" src="assets/img/lang_python.gif" alt="Lập trình viên Python">
	  		    <div class="card-body bg-light">
	  		      <h4 class="card-title">Lập trình viên Python</h4>
	  		      <p class="card-text">Ngôn ngữ thích hợp cho các hệ thống lớn, Machine learning, Deep learning và AI.</p>
	  		      <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> Đăng ký học</a>
	  		    </div>
	  		  </div>
	  	</div>
	  </div>
	  <div class="row px-md-5 pb-md-4 pt-md-2">
	  	<div class="col-md-4">
	  		<div class="card shadow">
	  		    <img class="card-img-top border-bottom" src="assets/img/lang_web.png" alt="Lập trình viên Front end">
	  		    <div class="card-body bg-light">
	  		      <h4 class="card-title">Lập trình viên Frontend</h4>
	  		      <p class="card-text">Tạo ra giao diện tương tác cho các trang web, thiết kế và đánh giá UX/UI.</p>
	  		      <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> Đăng ký học</a>
	  		    </div>
	  		  </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="card shadow">
	  		    <img class="card-img-top" src="assets/img/lang_android.png" alt="Lập trình viên Android">
	  		    <div class="card-body bg-light">
	  		      <h4 class="card-title">Lập trình viên Android</h4>
	  		      <p class="card-text">Tạo ra các ứng dụng, trò chơi trên hệ điều hành Android - Hệ điều hành phổ biến nhất hiện nay.</p>
	  		      <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> Đăng ký học</a>
	  		    </div>
	  		  </div>
	  	</div>
	  	<div class="col-md-4">
	  		<div class="card shadow">
	  		    <img class="card-img-top" src="assets/img/lang_reactjs.png" alt="Lập trình viên ReactJs">
	  		    <div class="card-body bg-light">
	  		      <h4 class="card-title">Lập trình viên ReactJs</h4>
	  		      <p class="card-text">Một Frontend Framework giúp tăng nhanh tốc độ phát triển và trải nghiệm người dùng.</p>
	  		      <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> Đăng ký học</a>
	  		    </div>
	  		  </div>
	  	</div>
	  </div>
	  <!-- FOOTER -->
	  <div class="row bg-dark text-white" id="footer-link">
	  	<footer class="col pt-0">
	  		<p class="text-center" id="center-name">Trung tâm đào tạo lập trình viên PTST&reg;</p>
	  		<hr class="mt-0">
	  		<div class="row text-left" id="contact-info">
	  			<div class="col-md-4">
	  				<p><i class="fa fa-map-marker fa-fw fa-lg mr-1"></i> Quận Ninh Kiều, Cần Thơ</p>
	  				<p><i class="fa fa-phone fa-fw fa-lg mr-1"></i> 01234xxxxxx</p>
	  			</div>
	  			<div class="col-md-4">
	  				<p><i class="fa fa-envelope-o fa-fw fa-lg mr-1"></i> ptst-training@gmail.com</p>
	  				<p><i class="fa fa-globe fa-fw fa-lg mr-1"></i> ptst-training.com</p>
	  			</div>
	  			<div class="col-md-4">
	  				<p><i class="fa fa-facebook-official fa-fw fa-lg mr-1"></i> facebook.com/ptsttraining</p>
	  				<p><i class="fa fa-youtube fa-fw fa-lg mr-1"></i> youtube.com/ptsttraining</p>
	  			</div>
	  		</div>
	  		<hr class="mt-0">
	  		<p id="copyright" class="text-center text-white">Copyright 2019 &copy; - Powered by PTST&reg;</p>
	  	</footer>
	  </div>
	</div>
	<!-- /.container -->
</body>
</html>