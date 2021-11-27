<?php
    require_once('../utils/utility.php');
    require_once('../database/dbhelper.php');
    $fullname = $birthday = $gender = $address = $classid = $gpa = $msg = $sql = '';

    if(!empty($_POST)) {
        $id = getPost('id');
        $fullname = getPost('fullname');
        $birthday = getPost('birthday');
        $gender = getPost('gender');
        $address = getPost('address');
        $classid = getPost('class');
        $gpa = getPost('gpa');

        $password = str_replace('-', '', $birthday);

        $sql = "select * from class where class_id = '$classid'";

        $existClass = executeResult($sql);

        if(empty($existClass)) {
            echo 'Lớp không tồn tại';
            return 0;
        }

        $classid = $existClass[0]['id'];

        $sql = "update student set password='$password', fullname='$fullname', dob='$birthday', gender='$gender', address='$address', gpa='$gpa', id_class='$classid' where id='$id'";

        execute($sql);

        echo 'Sửa thông tin thành công';
    }
?>