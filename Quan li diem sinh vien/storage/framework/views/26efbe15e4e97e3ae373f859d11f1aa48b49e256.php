<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đại Học An Giang</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('public/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')); ?>">
  <link href="<?php echo e(asset('public/css/fontawesome.min.css')); ?>" rel="stylesheet" />
    <script src="<?php echo e(asset('public/js/popper.min.js')); ?>" defer></script>
  <script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>" defer></script>
  <!-- Custom fonts for this template -->
  <link href="<?php echo e(asset('public/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('public/vendor/simple-line-icons/css/simple-line-icons.css')); ?>" rel="stylesheet" type="text/css">

  <link href="<?php echo e(asset('public/css/landing-page.min.css')); ?>" rel="stylesheet">
<!--   
 <style type="text/css">
   .overlay{
   background-image: url("https://baoangiang.com.vn/image/fckeditor/upload/2020/20200124/images/anh-thanh-hung1.jpg");
   }
 </style> -->

</head>

<body>

  <!-- Navigation -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
          <?php if(auth()->guard()->guest()): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>"><i class="fal fa-sign-in-alt"></i> Đăng nhập</a></li>
            <?php if(Route::has('register')): ?>
              <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>"><i class="fal fa-user-plus"></i> Đăng ký</a></li>
            <?php endif; ?>
          <?php else: ?>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fal fa-user-circle"></i>  <span class="caret"></span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fal fa-sign-out"></i> Đăng xuất</a>
                <a class="dropdown-item" href=""data-target="#thongtintaikhoan" data-toggle="modal" ><i class="fal fa-sign-out"></i>Thông tin</a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" style="display: none;"><?php echo csrf_field(); ?></form>
               
              </div>
            </li>
          <?php endif; ?>
        </ul>

    <!-- SEARCH FORM -->
   </div>
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay" ></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">TRƯỜNG ĐẠI HỌC QUỐC GIA THÀNH PHỐ HỒ CHÍ MINH!</h1>
          <h3 class="mb-5">TRƯỜNG ĐẠI AN GIANG!</h3>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-6 mb-2 mb-md-0">
               <button type="submit" class="btn btn-block btn-lg btn-success">Tìm hiểu thêm</button>
              </div>
              <div class="col-12 col-md-6">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Đăng Nhập</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Số sinh viên</h3>
               <h3><span class="counter-count text-center">
                1003
              </span>
              </h3> 

          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Giảng viên</h3>
              <h3>
              <span class="counter-count text-center">
                815
              </span>
            </h3>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Chương trình đào tạo</h3>
             <h3>
              <span class="counter-count text-center">
                57
              </span>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://www.agu.edu.vn/sites/default/files/inline-images/Ky-niem-20-nam-thanh-lap-Truong-Dai-hoc-An-Giang.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text text-center">
         <i class='fas fa-thumbs-up text-primary' style='font-size:48px;'></i>
         <br> 
          <h2><a href="https://www.agu.edu.vn/10-ly-do-chon-truong-dai-hoc-giang">Lý do chọn Trường ĐHAG</a>
          </h2>
          <p class="lead mb-0">10 Lý do chọn Trường Đại học An Giang!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('https://www.agu.edu.vn/sites/default/files/poster.png');"></div>
        <div class="col-lg-6 my-auto showcase-text text-center">
          <i class='fas fa-book-open text-primary' style='font-size:48px;'></i>
          <h2><a href="https://www.agu.edu.vn/tuyensinh/dh2018_42018.php">Chương Trình Đào Tạo</a></h2>
          <p class="lead mb-0">Có 53 Chương Trình Đào Tạo</p>
          <p class="lead mb-0">(Thạc sĩ:03, Đại học:35, Cao đẳng:19)</p>
          
        </div>
      </div>
      <div class="row no-gutters text-center">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://baoangiang.com.vn/image/fckeditor/upload/2018/20181022/images/DSC_4181---A--.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <i class='fas fa-award text-primary' style='font-size:48px;'></i>
          <h2><a href="https://www.agu.edu.vn/dambaochatluong/vi.html">Đảm bảo chất lượng</a></h2>
          <p class="lead mb-0">Tiêu chuẩn đảm bảo chất lượng đào tạo trường đại học An Giang</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  

  <!-- Call to Action -->

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>



</body>

</html>
<?php /**PATH E:\wamp\www\TestTheme\Quan_Diem_SV - Loading\resources\views/TrangChu.blade.php ENDPATH**/ ?>