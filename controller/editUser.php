<?php
    require_once('../database/dbhelper.php');
    require_once('../utils/utility.php');
    $id = $fullname = $birthday = $gender = $address = $sql = '';

    if(!empty($_POST)) {
        $id = getPost('id');
        $fullname = getPost('fullname');
        $birthday = getPost('birthday');
        $gender = getPost('gender');
        $address = getPost('address');

        $sql = "update student set fullname='$fullname', dob='$birthday', gender='$gender', address='$address' where id='$id'";

        execute($sql);
    }
?>