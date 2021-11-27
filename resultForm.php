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
                        THỐNG KÊ HỌC LỰC
                    </h5>
                    <table class="table mx-auto" style="width: 90%;">
                        <thead class="thead-dark" style="height:50px;">
                            <tr>
                                <th scope="col" style="width: 5%;">STT</th>
                                <th scope="col" style="width: 18%;">LOẠI HỌC LỰC</th>
                                <th scope="col" style="width: 27%;">SỐ LƯỢNG</th>
                                <th scope="col" style="width: 27%;">DANH SÁCH SINH VIÊN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "select * from student where role = 0";
                                $index = 1;
                                $studentList = executeResult($sql);
                                $gioi = $kha = $trungbinh = $yeu = 0;
                                foreach($studentList as $student) {
                                    if($student['gpa'] >= 3.2 & $student['gpa'] <= 4.0) {
                                        $gioi++;
                                    }
                                    else if($student['gpa'] >= 2.5 & $student['gpa'] <= 3.19) {
                                        $kha++;
                                    }
                                    else if($student['gpa'] >= 2.0 & $student['gpa'] <= 2.49) {
                                        $trungbinh++;
                                    }
                                    else if($student['gpa'] >= 0 & $student['gpa'] <= 1.99) {
                                        $yeu++;
                                    }
                                } 
                                echo '<tr>
                                        <th scope="row">'.($index++).'</th>
                                        <td>Giỏi</td>
                                        <td>'.$gioi.'</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick=\'window.open("resultInfoForm.php?min=3.2&max=4.0&name=Giỏi","_self")\'>Xem danh sách</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">'.($index++).'</th>
                                        <td>Khá</td>
                                        <td>'.$kha.'</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick=\'window.open("resultInfoForm.php?min=2.5&max=3.19&name=Khá","_self")\'>Xem danh sách</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">'.($index++).'</th>
                                        <td>Trung bình</td>
                                        <td>'.$trungbinh.'</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick=\'window.open("resultInfoForm.php?min=2.0&max=2.49&name=Trung bình","_self")\'>Xem danh sách</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">'.($index++).'</th>
                                        <td>Yếu</td>
                                        <td>'.$yeu.'</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick=\'window.open("resultInfoForm.php?min=0&max=1.99&name=Yếu","_self")\'>Xem danh sách</button>
                                        </td>
                                    </tr>';
                            ?>
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
</body>
</html>