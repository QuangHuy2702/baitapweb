<?php
    require_once('../database/dbhelper.php');
    $id = $sql = '';

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    $sql = "delete from apply where id_student = '$id'";

    execute($sql);

    $sql = "delete from student where id = '$id'";

    execute($sql);
?>