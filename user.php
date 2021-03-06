<?php
    session_start();

    require_once('./utils/utility.php');
    require_once('./database/dbhelper.php');

    $user = validate();
    if($user == null) {
        header('Location: loginForm.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí sinh viên</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/ff5a45f6d9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <header style="margin-bottom:100px;">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
            <a class="navbar-brand ml-5" href="#">
                <img src="./assets/images/favicon.png" alt="Ptit Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                <li class="nav-item mr-2 ml-2">
                  <a class="nav-link text-light" href="user.php">TRANG CHỦ</a>
                </li>
                <li class="nav-item dropdown mr-2 ml-2">
                    <a class="nav-link text-light dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                      ĐÀO TẠO
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="">Đào tạo đại học</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="">Đào tạo sau đại học</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="">Đào tạo quốc tế</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="">Đào tạo ngắn hạn</a></li>
                    </ul>
                  </li>
                <li class="nav-item dropdown mr-2 ml-2">
                  <a class="nav-link text-light dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    NGÀNH HỌC
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="">Công nghệ thông tin</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">An toàn thông tin</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">Công nghệ đa phương tiện</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">Truyền thông đa phương tiện</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">Kế toán</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">Quản trị kinh doanh</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">Marketing</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">Điện tử - Viễn thông</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">Công nghệ Kỹ thuật điện, Điện tử</a></li>
                  </ul>
                </li>
                <li class="nav-item mr-2 ml-2">
                  <a class="nav-link text-light" href="">SINH VIÊN</a>
                </li>
                <li class="nav-item mr-2 ml-2">
                  <a class="nav-link text-light" href="">TUYỂN SINH</a>
                </li>
                <li class="nav-item dropdown mr-5 ml-2">
                    <a class="nav-link text-light dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user text-light"></i>
                        <span><?=$user['fullname']?></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="studentInfoForm.php?id=<?=$user['id']?>">Thông tin cá nhân</a></li>
                      <li><hr class="dropdown-divider" ></li>
                      <li><a class="dropdown-item" href="applyForm.php?id=<?=$user['id']?>">Đăng kí tuyển dụng</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                    </ul>
                  </li>
              </ul>
            </div>
        </nav>
        <div class="container-fluid pr-0 pl-0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./assets/images/slider1.png" style="width:100%;" alt="First Slide">
                  </div>
                  <div class="carousel-item">
                    <img src="./assets/images/slider2.png" style="width:100%;" alt="Second Slide">
                  </div>
                  <div class="carousel-item">
                    <img src="./assets/images/slider3.png" style="width:100%;" alt="Third Slide">
                  </div>
                  <div class="carousel-item">
                    <img src="./assets/images/slider4.png" style="width:100%;" alt="Fourth Slide">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </header>
    <main class="mt-5">
        <!--Giới thiệu-->
        <div class="container">
          <h4>Giới thiệu</h4>
          <div class="mb-4" style="background: url(./assets/images/home_bar.png); height: 3px;"></div>
          <div class="row mb-5">
            <div class="col-lg-6">
                <p>Học viện Công nghệ Bưu chính Viễn thông được thành lập theo quyết định số 516/TTg của Thủ tướng Chính phủ ngày 11 tháng 7 năm 1997
                  trên cơ sở sắp xếp lại 4 đơn vị thành viên thuộc Tổng Công ty Bưu chính Viễn thông Việt Nam, 
                  nay là Tập đoàn Bưu chính Viễn thông Việt Nam là Viện Khoa học Kỹ thuật Bưu điện, Viện Kinh tế Bưu điện, 
                  Trung tâm đào tạo Bưu chính Viễn thông 1 và 2. Các đơn vị tiền thân của Học viện là những đơn vị có bề dày 
                  lịch sử hình thành và phát triển với xuất phát điểm từ Trường Đại học Bưu điện 1953.
                </p><br/>
                <p>Từ ngày 1/7/2014, thực hiện Quyết định của Thủ tướng Chính phủ, Bộ trưởng Bộ Thông tin và Truyền thông đã ban hành Quyết
                    định số 878/QĐ-BTTTT điều chuyển quyền quản lý Học viện từ Tập đoàn Bưu chính Viễn thông Việt Nam
                    về Bộ Thông tin và Truyền thông. Học viện Công nghệ Bưu chính Viễn thông là đơn vị sự nghiệp trực
                    thuộc Bộ. Là trường đại học, đơn vị nghiên cứu, phát triển nguồn nhân lực trọng điểm của Ngành 
                    thông tin và truyền thông.
                </p>
            </div>
            <div class="col-lg-6">
              <img src="./assets/images/ptit.jpg" alt="PTIT Logo" style="width:100%;">
            </div>
          </div>
        </div>
        <!--Tin tức-->
        <div class="container">
            <h4>Tin tức</h4>
            <div class="mb-4" style="background: url(./assets/images/home_bar.png); height: 3px;"></div>
            <div class="row mb-3">
              <div class="col-sm-12 col-md-4 col-lg-4 mb-5">
                <div class="card" style="width: 100%;">
                    <img src="./assets/images/content-1.jpg" alt="Content 1" class="img-hover">
                    <div class="card-body">
                      <p>Tiếp cận công nghệ AI và cơ hội việc làm qua "AI Now: Academic & Career"</p>
                      <a href="./pages/news1.html" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4 mb-5">
                <div class="card" style="width: 100%;">
                    <img src="./assets/images/content-2.jpg" alt="Content 2" class="img-hover">
                    <div class="card-body">
                      <p>Gần 2700 cơ hội dành cho sinh viên PTIT tại tuần lễ tuyển dụng 2021</p>
                      <a href="./pages/news2.html" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4 mb-5">
                <div class="card" style="width: 100%;">
                    <img src="./assets/images/content-3.jpg" alt="Content 3" class="img-hover">
                    <div class="card-body">
                      <p>Sinh viên PTIT nhận được sự quan tâm lớn của cộng đồng doanh nghiệp số</p>
                      <a href="./pages/news3.html" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4 mb-5">
                <div class="card" style="width: 100%;">
                    <img src="./assets/images/content-4.jpg" alt="Content 4" class="img-hover">
                    <div class="card-body">
                      <p>Phiên họp thứ 6 của Hội đồng Học viện Công nghệ Bưu chính Viễn thông</p>
                      <a href="./pages/news4.html" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4 mb-5">
                <div class="card" style="width: 100%;">
                    <img src="./assets/images/content-5.jpg" alt="Content 5" class="img-hover">
                    <div class="card-body">
                      <p>Học viện Công nghệ Bưu chính Viễn thông hợp tác với Tập đoàn Công nghệ HCL</p>
                      <a href="./pages/news5.html" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4 mb-5">
                <div class="card" style="width: 100%;">
                    <img src="./assets/images/content-6.jpg" alt="Content 6" class="img-hover">
                    <div class="card-body">
                      <p>Năm học mới đặc biệt của Học viện Công nghệ Bưu chính Viễn thông</p>
                      <a href="./pages/news6.html" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
              </div>
            </div>
         </div>
         <!--Thông tin khác-->
         <div class="container">
           <div class="row mb-5">
            <div class="col-md-3">
              <h4>Đào tạo</h4>
              <div class="mb-4" style="background: url(./assets/images/home_bar.png) no-repeat left top;height:3px;"></div>
              <a href="./pages/educate1.html"><img src="./assets/images/daotao.png" alt="Đào tạo" style="width: 100%;" class="img-hover"></a>
            </div>
             <div class="col-md-3">
               <h4>Ngành học</h4>
               <div class="mb-4" style="background: url(./assets/images/home_bar.png) no-repeat left top;height:3px;"></div>
               <a href="./pages/major.html"><img src="./assets/images/nganhhoc.jpg" alt="Ngành học" style="width: 100%;" class="img-hover"></a>
             </div>
            <div class="col-md-3">
              <h4>Sinh viên</h4>
              <div class="mb-4" style="background: url(./assets/images/home_bar.png) no-repeat left top;height:3px;"></div>
              <a href="./pages/studentnews.html"><img src="./assets/images/sinhvien.png" alt="Sinh viên" style="width: 100%;" class="img-hover"></a>
            </div>
            <div class="col-md-3">
              <h4>Tuyển sinh</h4>
              <div class="mb-4" style="background: url(./assets/images/home_bar.png) no-repeat left top;height:3px;"></div>
              <a href="./pages/apply.html"><img src="./assets/images/tuyensinh.png" alt="Tuyển sinh" style="width: 100%;" class="img-hover"></a>
            </div>
           </div>
         </div>
         <!--Liên hệ-->
         <div class="container">
          <h4>Thông tin liên hệ</h4>
          <div class="mb-4" style="background: url(./assets/images/home_bar.png); height: 3px;"></div>
           <div class="row mb-5">
             <div class="col-md-6 col-lg-6">
               <p>Nếu bạn cần hỗ trợ, hãy gửi thông tin vào biểu mẫu dưới đây.<br/> 
                Chúng tôi sẽ cố gắng phản hồi sớm nhất !</p>
               <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Họ và tên:</label>
                  <input type="text" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email:</label>
                  <input type="email" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group mb-0">
                  <label for="description">Nội dung phản hồi:</label><br/>
                  <textarea id="description" name="description" class="form-control" style="width:100%;height:200px;"></textarea><br/><br/>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
                </div>
               </form>
              </div>
              <div class="col-md-6 col-lg-6 d-flex flex-column justify-content-center align-items-center">
                <h4 class="mb-3">Google Map:</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.3043616759333!2d105.78590074213736!3d20.980433283809457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135accdd8a1ad71%3A0xa2f9b16036648187!2zSOG7jWMgdmnhu4duIEPDtG5nIG5naOG7hyBCxrB1IGNow61uaCB2aeG7hW4gdGjDtG5n!5e0!3m2!1svi!2s!4v1632388472043!5m2!1svi!2s" 
                width="80%;" height="60%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
           </div>
         </div>
    </main>
    <footer style="background-color: black;">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3 text-light pt-5 pb-5">
            <p>Trụ sở chính:<br/>122 Hoàng Quốc Việt, Q.Cầu Giấy, Hà Nội.</p>
            <p>Cơ sở đào tạo tại Hà Nội:<br/>Km10, Đường Nguyễn Trãi, Q.Hà Đông, Hà Nội</p>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3 text-light pt-5 pb-5">
            <p>Học viện cơ sở tại TP. Hồ Chí Minh:<br/>11 Nguyễn Đình Chiểu, P. Đa Kao, Q.1 TP Hồ Chí Minh</p>
            <p>Cơ sở đào tạo tại TP Hồ Chí Minh:<br/>Đường Man Thiện, P. Hiệp Phú, Q.9 TP Hồ Chí Minh</p>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3 text-light pt-5 pb-5">
            <ul>
              <li><a href="" class="text-light">Tra cứu bằng tốt nghiệp</a></li>
              <li><a href="" class="text-light">Các đơn vị thành viên</a></li>
              <li><a href="" class="text-light">Tạp chí khoa học công nghệ</a></li>
              <li><a href="" class="text-light">Ba công khai</a></li>
            </ul>
            <div class="d-flex justify-content-around">
              <a href="" class="text-light"><i class="fab fa-facebook fa-2x"></i></a>
              <a href="" class="text-light"><i class="fab fa-facebook-messenger fa-2x"></i></a>
              <a href="" class="text-light"><i class="fas fa-phone fa-2x"></i></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3 text-light pt-5 pb-5">
            <span>Video:</span>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2TAib6Q5oiQ"></iframe>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>