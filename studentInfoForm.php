<?php
    session_start();
    require_once('./utils/utility.php');
    require_once('./database/dbhelper.php');

    $user = validate();
    if($user == null) {
        header('Location: loginForm.php');
        die();
    }

    $id = $sql = $link = '';

    if(!empty($_GET)) {
        $id = getGet('id');
    }

    $sql = "select * from student where id = '$id'";

    $student = executeResult($sql);

    $class_id = $student[0]['id_class'];

    $sql = "select * from class where id = '$class_id'";

    $class = executeResult($sql);

    if($user['role'] == 1) {
        $link = 'admin.php';
    }
    else if($user['role'] == 0) {
        $link = 'user.php';
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
    <div class="container mt-5">
        <h3 class="text-center mb-3">Thông tin sinh viên</h3>
        <form style="width: 500px;margin-left:300px;" method="post">
            <div class="form-group">
                <label for="studentid">Mã sinh viên</label>
                <input disabled="true" type="text" class="form-control" id="studentid" aria-describedby="studentid" name="studentid" value="<?=$student[0]['student_id']?>">
            </div>
            <div class="form-group">
                <label for="fullname">Tên sinh viên</label>
                <input disabled="true" type="text" class="form-control" id="fullname" name="fullname" value="<?=$student[0]['fullname']?>">
            </div>
            <div class="form-group">
                <label for="birthday">Ngày sinh</label>
                <input disabled="true" type="date" class="form-control" id="birthday" aria-describedby="birthday" name="birthday" value=<?=$student[0]['dob']?>>
            </div>
            <div class="form-group">
                <label for="birthday">Giới tính</label>
                <input disabled="true" type="text" class="form-control" id="birthday" aria-describedby="birthday" name="birthday" value="<?=$student[0]['gender']?>">
            </div>
            <div class="form-group mt-2">
                <label for="address">Địa chỉ</label>
                <input disabled="true" type="text" class="form-control" id="address" aria-describedby="address" name="address" value="<?=$student[0]['address']?>">
            </div>
            <div class="form-group">
                <label for="class">Lớp</label>
                <input disabled="true" type="text" class="form-control" id="class" aria-describedby="class" name="class" value="<?=$class[0]['class_name']?>">
            </div>
            <div class="form-group">
                <label for="gpa">GPA</label>
                <input disabled="true" type="text" class="form-control" id="gpa" aria-describedby="gpa" name="gpa" value="<?=$student[0]['gpa']?>">
            </div>
            <button type="button" class="btn btn-primary" onclick="window.open('<?=$link?>', '_self')">Quay lại</button>
        </form>
    </div>
</body>
</html>