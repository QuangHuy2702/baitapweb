<?php
    require_once('./utils/utility.php');
    require_once('./database/dbhelper.php');

    $id = $sql = '';

    if(!empty($_GET)) {
        $id = getGet('id');
    }

    $sql = "select * from student where role = 0 and id = '$id'";

    $student = executeResult($sql);

    $sql = "select * from apply where id_student = '".$student[0]['id']."'";
    $applyList = executeResult($sql);

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
        <h3 class="text-center mb-3">Danh sách ứng tuyển: <?=$student[0]['fullname']?></h3>

        <table class="table mx-auto" style="width: 90%;">
            <thead class="thead-dark" style="height:50px;">
                <tr>
                    <th scope="col" style="width: 5%;">STT</th>
                    <th scope="col" style="width: 15%;">TÊN CÔNG TY</th>
                    <th scope="col" style="width: 10%;">NGUYỆN VỌNG</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index = 1;
                    foreach($applyList as $apply) {
                        $sql = "select * from company where id = ".$apply['id_company']."";
                        $company = executeResult($sql);
                        echo '<tr>
                                <th scope="row">'.($index++).'</th>
                                <td>'.$company[0]['name'].'</td>
                                <td>'.$apply['aspiration'].'</td>
                            </tr>';
                    } 
                ?>
            </tbody>
        </table>            
    </div>
</body>
</html>