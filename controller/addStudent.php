<?php
    require_once('../utils/utility.php');
    require_once('../database/dbhelper.php');
    $studentid = $fullname = $birthday = $gender = $address = $class = $gpa = $msg = $msg1 = $sql = '';

    if(!empty($_POST)) {
        $studentid = getPost('studentid');
        $fullname = getPost('fullname');
        $birthday = getPost('birthday');
        $gender = getPost('gender');
        $address = getPost('address');
        $class = getPost('class');
        $gpa = getPost('gpa');

        $password = str_replace('-', '', $birthday);

        $sql = "select * from student where student_id = '$studentid'";

        $existStudent = executeResult($sql);

        if(!empty($existStudent)) {
            echo 'Mã sinh viên đã tồn tại';
            return 0;
        }

        $sql = "select * from class where class_id = '$class'";

        $existClass = executeResult($sql);

        if(empty($existClass)) {
            echo 'Lớp không tồn tại';
            return 0;
        }

        $classid = $existClass[0]['id'];

        $sql = "insert into student (student_id, username, password, fullname, dob, gender, address, gpa, role, id_class) values ('$studentid', '$studentid', '$password', '$fullname', '$birthday', '$gender', '$address', '$gpa', 0, '$classid')";

        execute($sql);

        echo 'Thêm sinh viên thành công';
    }
?>