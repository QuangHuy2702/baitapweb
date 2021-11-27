<?php
    require_once('../database/dbhelper.php');
    require_once('../utils/utility.php');

    $aspiration = $id_company = $id_student = $sql = '';

    if(!empty($_POST)) {
        $aspiration = getPost('aspiration');
        $id_student = getPost('id_student');
        $id_company = getPost('id_company');

        //Chưa nhập nguyện vọng
        if($aspiration == null) {
            echo 'Bạn chưa nhập nguyện vọng';
            return;
        }

        //Kiểm tra nguyện vọng đã được sử dụng chưa
        $sql = "select * from apply where aspiration = '$aspiration' and id_student = '$id_student'";
        $applyExist = executeResult($sql);
        if(!empty($applyExist)) {
            echo 'Nguyện vọng này đã được sử dụng';
            return;
        }

        //Kiểm tra đã tồn tại đăng kí chưa
        $sql = "select * from apply where id_student = '$id_student' and id_company = '$id_company'";
        $applyExist1 = executeResult($sql);
        if(!empty($applyExist1)) {
            $sql = "update apply set aspiration = '$aspiration' where id_student = '$id_student' and id_company = '$id_company'";
        }
        else {
            $sql = "insert into apply (aspiration, id_student, id_company) values ('$aspiration', '$id_student', '$id_company')";
        }
        execute($sql);

        echo 'Ứng tuyển thành công';
    }
    
?>
