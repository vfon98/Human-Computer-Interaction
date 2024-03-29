<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div class="container mt-5">
    <div class="jumbotron">
        <div class="text-center text-success" id="icon"><i class="fa fa-5x fa-check-circle"></i></div>
        <h1 class="text-center text-success" id="banner">Đăng ký thành công !</h1>
        <p class="text-center">Vui lòng chờ người quản lý CTDT xét duyệt đơn đăng ký trước khi sử dụng hệ thống</p>
        <p class="text-center"><a class="btn btn-primary" href="/"><i class="fa fa-home"></i> Trang chủ</a></p>
    </div>
</div>

<script>
	$(document).ready(function() {
		$('#icon').animate({zoom: '140%'}, "slow");
		$('#banner').hide(0).show(1000);
	});
</script>