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
     <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <i class="fas fa-user fa-2x ml-5 mt-2 mb-2 text-light"></i>
            <a class="navbar-brand ml-3" href="#" style="font-weight:700;"><?=$user['username']?></a>
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
                            <a href="editUserForm.php" class="text-light">Sửa thông tin cá nhân</a>
                        </li>
                     </ul>
                 </div>
                 <div class="col-md-9">
                    <h5 class="text-center mt-4 mb-4">
                        DANH SÁCH SINH VIÊN
                    </h5>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="search-student ml-5">
                            <form class="form-inline">
                                <div class="form-group mr-2 mb-3">
                                    <input type="text" class="form-control" id="search_name" placeholder="Nhập tên sinh viên" name="search">
                                </div>
                                <button type="button" class="btn btn-primary mb-3" id="search_student">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="add-student mr-5">
                            <button type="button" class="btn btn-primary" onclick="window.open('addStudentForm.php', '_self')">
                                Thêm sinh viên
                            </button>
                        </div>
                    </div>
                    <table class="table mx-auto" style="width: 90%;">
                        <thead class="thead-dark" style="height:50px;">
                            <tr>
                                <th scope="col" style="width: 5%;">STT</th>
                                <th scope="col" style="width: 18%;">MÃ SINH VIÊN</th>
                                <th scope="col" style="width: 27%;">TÊN SINH VIÊN</th>
                                <th scope="col" style="width: 18%;">LỚP</th>
                                <th scope="col" style="width: 32%;">LỰA CHỌN</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>            
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
            showData();
            //Show sinh viên
            function showData() {
                $.post('./controller/showStudent.php', function(data) {
                    $('#show_data').html(data);
                })
            }
            //Xóa sinh viên
            $(document).on('click', '.delete_student', function() {
                var option = confirm('Bạn có muốn xóa sinh viên này không?');
                if(!option) {
                    return;
                }
                var id = $(this).val();
                $.post('./controller/deleteStudent.php', {'id' : id}, function(data) {
                    showData();
                })
            })
            //Sửa sinh viên
            $("#search_student").click(function(){
                var name = $('#search_name').val();
                console.log(name);
                $.post('./controller/searchStudent.php', {'name' : name},function(data) {
                    $('#show_data').html(data);
                })
            })
        })
    </script>
</body>
</html>