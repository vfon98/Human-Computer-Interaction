<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div class="container mt-5">
    <div class="jumbotron">
        <div class="text-center text-danger" id="icon"><i class="fa fa-5x fa-frown-o"></i></div>
        <h1 class="text-center">Khoan đã !!!<p> </p>
          <p><small class="text-center">Bạn chỉ có thể đăng ký thêm tối đa 1 CTDT tại một thời điểm</small></p>
        </h1>
        <p class="text-center">Vui lòng chờ xét duyệt chương trình hiện tại trước khi đăng ký mới !</p>
        <p class="text-center"><a class="btn btn-success" href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i class="fa fa-reply"></i> Trở về</a></p>
    </div>
</div>

<script>
	$(document).ready(function() {
		// $('#icon').fadeOut(0).fadeIn(1500);
		$('#icon').animate({zoom: '150%'}, "slow");
	});
</script>