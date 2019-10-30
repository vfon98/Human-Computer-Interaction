<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title i18n lang-key="homepage">Trang chủ</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/img/PTST-logo-white.png" alt="logo" width="50" class="my-n3 mx-n1 ml-n2">
            <span i18n lang-key="eduMgr">Quản lý đào tạo</span>
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
                <a class="nav-link" href="#" i18n lang-key="homepage">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#footer-link" i18n lang-key="contact">Liên hệ</a>
              </li>
              <li class="nav-item dropdown text-left">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
                    <i class="fa fa-globe"></i> <span id="js-cur-lang">Tiếng Việt</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item m-0 btn" id="btn-change-lang"><i class="fa fa-fw fa-language mx-2"></i> <span id="js-toggle-lang">English</span>
                    </a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./views/program_list.php" i18n lang-key="proList">Chương trình đào tạo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./views/register.php" i18n lang-key="register">Đăng ký học</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./views/login.php" i18n lang-key="login">Đăng nhập</a>
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
                    <div id="central-name" i18n lang-key="homeBanner">Trung tâm đào tạo Lập trình viên PTST</div>
                    <a href="views/register.php" id="carouse-link" class="btn btn-lg btn-success" i18n lang-key="regNow">Đăng ký ngay !</a>
                </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="/assets/img/office-desk.jpg" alt="Los Angeles" width="1100" height="500">
                  <div class="carousel-caption">
                    <h3 i18n lang-key="carTitle1">Chất lượng</h3>
                    <p i18n lang-key="carDetail1">Là mục tiêu hoạt động của chúng tôi !</p>
                  </div>   
                </div>
                <div class="carousel-item">
                  <img src="/assets/img/keyboard.jpg" alt="Chicago" width="1100" height="500">
                  <div class="carousel-caption">
                    <h3 i18n lang-key="carTitle2">Kiến thức</h3>
                    <p i18n lang-key="carDetail2">Là những gì chúng tôi muốn đem đến cho bạn !</p>
                  </div>   
                </div>
                <div class="carousel-item">
                  <img src="/assets/img/graduation.jpg" alt="New York" width="1100" height="500">
                  <div class="carousel-caption">
                    <h3 class="text" i18n lang-key="carTitle3">Thành công</h3>
                    <p i18n lang-key="carDetail3">Là những gì chúng tôi tin ở bạn !</p>
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
      <!-- BEGIN IMAGES SECTOR -->
      <div class="row my-4 px-md-5">
        <div class="col-md-6 col-lg-4 mb-md-4">
            <div class="card shadow">
                <img class="card-img-top img-fluid" src="assets/img/lang_php.png" alt="Lập trình viên PHP">
                <div class="card-body bg-light">
                  <h4 class="card-title" i18n lang-key="phpTitle">Lập trình viên PHP</h4>
                  <p class="card-text" i18n lang-key="phpDetail">Ngôn ngữ lập trình phía server phổ biến trên các hệ thống máy chủ hiện nay !</p>
                  <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> <span i18n lang-key="regNow">Đăng ký học</span></a>
                </div>
              </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-md-4">
            <div class="card shadow">
                <img class="card-img-top img-fluid border-bottom" src="assets/img/lang_nodejs.png" alt="Lập trình viên NodeJs">
                <div class="card-body bg-light">
                  <h4 class="card-title" i18n lang-key="nodeTitle">Lập trình viên NodeJs</h4>
                  <p class="card-text" i18n lang-key="nodeDetail">Ngôn ngữ cực kỳ mạnh mẽ, thích hợp cho các hệ thống real-time tương tác cao.</p>
                  <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> <span i18n lang-key="regNow">Đăng ký học</span></a>
                </div>
              </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-md-4">
            <div class="card shadow">
                <img class="card-img-top img-fluid border" src="assets/img/lang_python.gif" alt="Lập trình viên Python">
                <div class="card-body bg-light">
                  <h4 class="card-title" i18n lang-key="pyTitle">Lập trình viên Python</h4>
                  <p class="card-text" i18n lang-key="pyDetail">Ngôn ngữ thích hợp cho các hệ thống lớn, Machine learning, Deep learning và AI.</p>
                  <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> <span i18n lang-key="regNow">Đăng ký học</span></a>
                </div>
              </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-md-4">
            <div class="card shadow">
                <img class="card-img-top img-fluid border-bottom" src="assets/img/lang_web.png" alt="Lập trình viên Front end">
                <div class="card-body bg-light">
                  <h4 class="card-title" i18n lang-key="frontTitle">Lập trình viên Frontend</h4>
                  <p class="card-text" i18n lang-key="frontDetail">Tạo ra giao diện tương tác cho các trang web, thiết kế và đánh giá UX/UI.</p>
                  <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> <span i18n lang-key="regNow">Đăng ký học</span></a>
                </div>
              </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-md-4">
            <div class="card shadow">
                <img class="card-img-top img-fluid" src="assets/img/lang_android.png" alt="Lập trình viên Android">
                <div class="card-body bg-light">
                  <h4 class="card-title" i18n lang-key="androidTitle">Lập trình viên Android</h4>
                  <p class="card-text" i18n lang-key="androidDetail">Tạo ra các ứng dụng, trò chơi trên hệ điều hành Android - Hệ điều hành phổ biến nhất hiện nay.</p>
                  <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> <span i18n lang-key="regNow">Đăng ký học</span></a>
                </div>
              </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-md-4">
            <div class="card shadow">
                <img class="card-img-top img-fluid" src="assets/img/lang_reactjs.png" alt="Lập trình viên ReactJs">
                <div class="card-body bg-light">
                  <h4 class="card-title" i18n lang-key="reactTitle">Lập trình viên ReactJs</h4>
                  <p class="card-text" i18n lang-key="reactDetail">Một Frontend Framework giúp tăng nhanh tốc độ phát triển và trải nghiệm người dùng.</p>
                  <a href="views/register.php" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> <span i18n lang-key="regNow">Đăng ký học</span></a>
                </div>
              </div>
        </div>
      </div>
      <!-- FOOTER -->
      <div class="row bg-dark text-white mt-n3" id="footer-link">
        <footer class="col pt-0">
            <p class="text-center" id="center-name" i18n lang-key="homeBanner">Trung tâm đào tạo lập trình viên PTST&reg;</p>
            <hr class="mt-0">
            <div class="row text-left" id="contact-info">
                <div class="col-md-6 col-lg-4">
                    <p><i class="fa fa-map-marker fa-fw fa-lg mr-1"></i> <span i18n lang-key="centerAddress">Quận Ninh Kiều, Cần Thơ</span></p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <p><i class="fa fa-globe fa-fw fa-lg mr-1"></i> ptst-training.com</p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <p><i class="fa fa-facebook-official fa-fw fa-lg mr-1"></i> facebook.com/ptsttraining</p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <p><i class="fa fa-phone fa-fw fa-lg mr-1"></i> 01234xxxxxx</p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <p><i class="fa fa-envelope-o fa-fw fa-lg mr-1"></i> ptst-training@gmail.com</p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <p><i class="fa fa-youtube fa-fw fa-lg mr-1"></i> youtube.com/ptsttraining</p>
                </div>
            </div>
            <hr class="mt-0">
            <p id="copyright" class="text-center text-white">Copyright 2019 &copy; - Powered by PTST&reg;</p>
        </footer>
      </div>
    </div>
    <!-- /.container -->
    <script src="/assets/js/i18n.js"></script>
</body>
</html>
