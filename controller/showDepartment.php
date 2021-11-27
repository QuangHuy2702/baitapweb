<?php
    require_once('../database/dbhelper.php');

    $sql = "select * from department";
    
    $departmentList = executeResult($sql);
    $index = 1;
    $str = '';
    foreach($departmentList as $department) {
        $str .= '<option value="'.$department['id'].'">'.$department['department_name'].'</option>';
    } 
    echo $str;
?>