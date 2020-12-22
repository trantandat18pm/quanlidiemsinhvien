<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đại Học An Giang</title>

  <!-- Bootstrap core CSS -->
  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="public/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
<!--   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300arial,400arial,700arial" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template -->
  <link href="public/css/landing-page.min.css" rel="stylesheet">
  <style type="text/css">
    
  </style>
 

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      
      <a class="navbar-brand" href="#">An Giang University</a>
        @guest
      <a class="btn btn-primary" href="{{ route('login') }}">Đăng Nhập</a>
      @else
            <a class="btn btn-success" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
              <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">@csrf</form>

      @endguest

    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">TRƯỜNG ĐẠI HỌC QUỐC GIA THÀNH PHỐ HỒ CHÍ MINH!</h1>
          <h3 class="mb-5">TRƯỜNG ĐẠI AN GIANG!</h3>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              @auth
              <div class="col-12 col-md-6 mb-2 mb-md-0">
<!--                <button type="submit" class="btn btn-block btn-lg btn-success">Tìm hiểu thêm</button>
 -->    
             <a class="btn btn-block btn-lg btn-success" href="https://www.agu.edu.vn/">Tìm hiểu thêm</a> 
           </div>
              <div class="col-12 col-md-6">
<!--                 <button type="submit" class="btn btn-block btn-lg btn-primary">Đăng Nhập</button>
 -->            
              <a class="btn btn-block btn-lg btn-info" href="{{ url('/trangchu') }}">Giao diện chức năng</a>
              </div>
                            @endauth  

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
              <i class="fas fa-user-graduate m-auto text-primary"></i>

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
              <i class="fas fa-chalkboard-teacher m-auto text-primary"></i>

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
              <i class="fas fa-award m-auto text-primary"></i>
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
<footer class="bg-white">
       <div class="container py-5">
           <div class="row py-3">
               <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                   <h6 class="text-uppercase font-weight-bold mb-4">About</h6>
                   <ul class="list-unstyled mb-0">
                       <li class="mb-2"><a href="#" class="text-muted">Contact Us</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">About Us</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Stories</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Press</a></li>
                   </ul>
               </div>
               <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                   <h6 class="text-uppercase font-weight-bold mb-4">Help</h6>
                   <ul class="list-unstyled mb-0">
                       <li class="mb-2"><a href="#" class="text-muted">Payments</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Shipping</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Cancellation</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Returns</a></li>
                   </ul>
               </div>
               <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                   <h6 class="text-uppercase font-weight-bold mb-4">Policy</h6>
                   <ul class="list-unstyled mb-0">
                       <li class="mb-2"><a href="#" class="text-muted">Return Policy</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Terms Of Use</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Security</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Privacy</a></li>
                   </ul>
               </div>
               <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                   <h6 class="text-uppercase font-weight-bold mb-4">Company</h6>
                   <ul class="list-unstyled mb-0">
                       <li class="mb-2"><a href="#" class="text-muted">Login</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Register</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Sitemap</a></li>
                       <li class="mb-2"><a href="#" class="text-muted">Our Products</a></li>
                   </ul>
               </div>
               <div class="col-lg-4 col-md-6 mb-lg-0">
                   <h6 class="text-uppercase font-weight-bold mb-4">Registered Office Address</h6>
                   <p class="text-muted mb-4">Địa chỉ:số 18, đường Ung Văn Khiêm, phường Đông Xuyên, thành phố Long Xuyên, tỉnh An Giang.</p>
                   <ul class="list-inline mt-4">
                       <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fab fa-2x fa-twitter"></i></a></li>
                       <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fab fa-2x fa-facebook-f"></i></a></li>
                       <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fab fa-2x fa-instagram"></i></a></li>
                       <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fab fa-2x fa-youtube"></i></a></li>
                       <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fab fa-2x fa-google"></i></a></li>
                   </ul>
               </div>
           </div>
       </div>
     <hr class="p-0 m-0 b-0">
     <div class="bg-light py-2">
         <div class="container text-center">
             <p class="text-muted mb-0 py-2">© 2020 Trần Tấn Đạt All risghts reserved.</p>
         </div>
     </div>
 </footer>
  </footer>



</body>

</html>
