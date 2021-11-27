<?php
    require_once('./utils/utility.php');
    require_once('./database/dbhelper.php');

    $id = $sql = '';

    if(!empty($_GET)) {
        $id = getGet('id');
    }

    $sql = "select * from apply where id_company = '$id'";

    $applyList = executeResult($sql);

    $studentList = [];

    foreach($applyList as $apply) {
        $sql = "select * from student where role = 0 and id = ".$apply['id_student']."";
        $student = executeResult($sql);
        $student[0]['aspiration'] = $apply['aspiration'];
        array_push($studentList, $student[0]);
    }

    usort($studentList, function($a, $b) {
        if($a['gpa'] < $b['gpa']) {
            return true;
        }
        else if($a['gpa'] == $b['gpa']) {
            if($a['aspiration'] > $b['aspiration']) {
                return true;
            }
            return false;
        }
        return false;
    })

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
        <h3 class="text-center mb-3">Danh sách trúng tuyển</h3>
        <table class="table mx-auto" style="width: 90%;">
            <thead class="thead-dark" style="height:50px;">
                <tr>
                    <th scope="col" style="width: 5%;">STT</th>
                    <th scope="col" style="width: 20%;">MÃ SINH VIÊN</th>
                    <th scope="col" style="width: 30%;">TÊN SINH VIÊN</th>
                    <th scope="col" style="width: 5%;">GPA</th>
                    <th scope="col" style="width: 5%;">NGUYỆN VỌNG</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "select * from company where id = '$id'";
                    $company = executeResult($sql);
                    $index = 1;
                    $count = 0;
                    foreach($studentList as $student) {
                        if($student['gpa'] >= $company[0]['standard_gpa']) {
                            $count++;
                            echo '<tr>
                                <th scope="row">'.($index++).'</th>
                                <td>'.$student['student_id'].'</td>
                                <td>'.$student['fullname'].'</td>
                                <td>'.$student['gpa'].'</td>
                                <td>'.$student['aspiration'].'</td>
                            </tr>';
                        }
                        if($count == $company[0]['quantity']){
                            break;
                        }
                    } 
                ?>
            </tbody>
        </table> 
    </div>
</body>
</html>