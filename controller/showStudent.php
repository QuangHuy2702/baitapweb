<?php
    require_once('../database/dbhelper.php');

    $sql = "select * from student where role = 0";
    
    $studentList = executeResult($sql);
    $index = 1;
    $str = '';
    foreach($studentList as $student) {
        $sql1 = "select * from class where id = ".$student['id_class']."";
        $class = executeResult($sql1);
        $str .= '<tr>
                <th scope="row">'.($index++).'</th>
                <td>'.$student['student_id'].'</td>
                <td>'.$student['fullname'].'</td>
                <td>'.$class[0]['class_id'].'</td>
                <td>
                    <button type="button" class="btn btn-primary" onclick=\'window.open("studentInfoForm.php?id='.$student['id'].'","_self")\'>Xem thông tin</button>
                    <button type="button" class="btn btn-danger" onclick=\'window.open("editStudentForm.php?id='.$student['id'].'","_self")\'>Sửa</button>
                    <button type="button" class="btn btn-secondary delete_student" value="'.$student['id'].'">Xóa</button>
                </td>
            </tr>';
    } 
    echo $str;
?>