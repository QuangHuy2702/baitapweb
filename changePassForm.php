<?php
    require_once('./utils/utility.php');
    require_once('./database/dbhelper.php');
    require_once('./controller/changePassword.php');
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
     <div class="container" style="height:470px;margin-top:100px;">
         <p class="mb-3 text-center text-danger"><?=$msg?></p>
         <div class="login-form" style="width:400px;height:100%;margin:auto">
             <div class="login-form-header">
                <div class="d-flex justify-content-center">
                    <img src="./assets/images/favicon.png" alt="" class="mt-3 mb-2">
                </div>
                <h4 class="text-center">Đổi mật khẩu</h4>
             </div>
             <div class="login-form-body d-flex justify-content-center mb-3">
                <form style="width: 80%;" method="post">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input required="true" type="text" class="form-control" id="username" name="username" value=<?=$username?>>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu cũ</label>
                        <input required="true" type="password" class="form-control" id="password" name="oldpassword" value=<?=$oldpassword?>>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu mới</label>
                        <input required="true" type="password" class="form-control" id="password" name="newpassword">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </div>
                </form>
              </div>
              <div class="login-form-footer">
                <hr class="mt-2 mb-2" style="background-color:#aaaaaa"/>
                <div class="d-flex justify-content-center mb-2">
                    <a href="loginForm.php">Quay lại trang Đăng nhập</a>
                </div>
              </div>
         </div>
     </div>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>