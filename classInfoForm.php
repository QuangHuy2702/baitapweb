<?php
    require_once('./utils/utility.php');
    require_once('./database/dbhelper.php');

    $id = $sql = '';

    if(!empty($_GET)) {
        $id = getGet('id');
    }

    $sql = "select * from class where id = '$id'";

    $class = executeResult($sql);

    $sql = "select * from student where role = 0 and id_class = '$id'";
    $studentList = executeResult($sql);

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
    <div class="container mt-5">
        <h3 class="text-center mb-3">Danh sách sinh viên lớp <?=$class[0]['class_name']?></h3>
        <h5 class="text-center mb-3">Sĩ số: <?=count($studentList)?></h5>
        <table class="table mx-auto" style="width: 90%;">
            <thead class="thead-dark" style="height:50px;">
                <tr>
                    <th scope="col" style="width: 5%;">STT</th>
                    <th scope="col" style="width: 20%;">MÃ SINH VIÊN</th>
                    <th scope="col" style="width: 30%;">TÊN SINH VIÊN</th>
                    <th scope="col" style="width: 5%;">GPA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index = 1;
                    foreach($studentList as $student) {
                        echo '<tr>
                                <th scope="row">'.($index++).'</th>
                                <td>'.$student['student_id'].'</td>
                                <td>'.$student['fullname'].'</td>
                                <td>'.$student['gpa'].'</td>
                            </tr>';
                    } 
                ?>
            </tbody>
        </table> 
        <button type="button" class="btn btn-primary ml-5 mb-5" onclick="window.open('classForm.php', '_self')">Quay lại</button>           
    </div>
</body>
</html>