<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- LOG OUT -->
<?php
    session_start();
    session_unset();
    session_destroy();
?>

<div class="container mt-5">
    <div class="jumbotron">
        <div class="text-center text-success" id="icon"><i class="fa fa-5x fa-check-circle"></i></div>
        <h1 class="text-center">Đổi mật khẩu thành công !!!<p> </p>
          <p><small class="text-center">Vui lòng đăng nhập lại để cập nhật thay đổi</small></p>
        </h1>
        <p class="text-center"><a class="btn btn-primary" href="../login.php"><i class="fa fa-user"></i> Đăng nhập</a></p>
    </div>
</div>

<script>
	$(document).ready(function() {
		// $('#icon').fadeOut(0).fadeIn(1500);
		$('#icon').animate({zoom: '150%'}, "slow");
	});
</script>