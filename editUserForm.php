<?php
    session_start();

    require_once('./utils/utility.php');
    require_once('./database/dbhelper.php');

    $user = validate();
    if($user == null) {
        header('Location: loginForm.php');
        die();
    }

    $sql = "select * from student where role = 1 and id = '".$user['id']."'";
    $admin = executeResult($sql);
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
     <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <i class="fas fa-user fa-2x ml-5 mt-2 mb-2 text-light"></i>
            <a class="navbar-brand ml-3" href="#" style="font-weight:700;"><?=$admin[0]['username']?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-5">
                        <a class="nav-link text-light" href="logout.php"><i class="fas fa-sign-out-alt"></i><span class="ml-1">Đăng xuất</span></a>
                    </li>
                </ul>
            </div>
        </nav>
     </header>
     <main>
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-3 bg-dark">
                     <ul class="mt-2" style="list-style-type:none;">
                        <li class="p-2" style="border-bottom:1px solid black;">
                            <a href="admin.php" class="text-light">Danh sách sinh viên</a>
                        </li>
                        <li class="p-2" style="border-bottom:1px solid black;">
                            <a href="classForm.php" class="text-light">Danh sách lớp học</a>
                        </li>
                        <li class="p-2" style="border-bottom:1px solid black;">
                            <a href="departmentForm.php" class="text-light">Danh sách ngành học</a>
                        </li>
                        <li class="p-2" style="border-bottom:1px solid black;">
                            <a href="resultForm.php" class="text-light">Thống kê học lực</a>
                        </li>
                        <li class="p-2" style="border-bottom:1px solid black;">
                            <a href="applyResultForm.php" class="text-light">Danh sách tuyển dụng</a>
                        </li>
                        <li class="p-2">
                            <a href="editUserForm.php" class="text-light"> Sửa thông tin cá nhân</a>
                        </li>
                     </ul>
                 </div>
                 <div class="col-md-9">
                    <h3 class="text-center mb-3 mt-5">Thông tin cá nhân</h3>
                    <form style="width: 500px;margin-left:300px;" method="post">
                        <div class="form-group">
                            <label for="fullname">Họ và tên</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$admin[0]['fullname']?>">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Ngày sinh</label>
                            <input type="date" class="form-control" id="birthday" aria-describedby="birthday" name="birthday" value=<?=$admin[0]['dob']?>>
                        </div>
                        <fieldset class="form-group">
                            <legend class="col-form-label">Giới tính:</legend>
                            <div class="form-check">
                                <input class="form-check-input" required="true" type="radio" name="gender" value="Nam">
                                <label class="form-check-label" for="gridRadios1">
                                    Nam 
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" required="true" type="radio" name="gender" value="Nữ">
                                <label class="form-check-label" for="gridRadios2">
                                    Nữ
                                </label>
                            </div>
                        </fieldset>
                        <div class="form-group mt-2">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" aria-describedby="address" name="address" value="<?=$admin[0]['address']?>">
                        </div>
                        <button type="button" class="btn btn-primary" id="edit_info">Cập nhật</button>
                    </form>
                 </div>
             </div>
         </div>
     </main>
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            setGender();
            function setGender() {
                var $radios = $('input:radio[name=gender]');
                if($radios.is(':checked') === false) {
                    $radios.filter('[value=<?=$admin[0]['gender']?>]').prop('checked', true);
                }
            }
            $('#edit_info').click(function() {
            var id = <?=$user['id']?>;
            var fullname = $('#fullname').val();
            var birthday = $('#birthday').val();
            var gender = $("input[type='radio'][name='gender']:checked").val();
            var address = $('#address').val();
            $.post('./controller/editUser.php', 
                    {'id':id,'fullname':fullname, 'birthday':birthday, 'gender':gender, 'address':address},
                    function(data) {
                        alert('Cập nhật thông tin thành công');
                    })
            })
        })
    </script>
</body>
</html>