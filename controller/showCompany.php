<?php
    require_once('../database/dbhelper.php');

    if(isset($_POST['id']) && $_POST['id'] != '') {
        $sql = "select * from company where id_department = '".$_POST['id']."'";
    }
    else {
        return;
    }
    
    $companyList = executeResult($sql);
    $index = 1;
    $str = '';
    foreach($companyList as $company) {
        $sql1 = "select * from department where id = ".$_POST['id']."";
        $department = executeResult($sql1);
        $str .= '<tr>
                <th scope="row">'.($index++).'</th>
                <td>'.$company['name'].'</td>
                <td>'.$company['standard_gpa'].'</td>
                <td>'.$company['quantity'].'</td>
                <td>'.$department[0]['department_name'].'</td>
                <td>
                    <button type="button" class="btn btn-primary get-company" value="'.$company['id'].'" data-toggle="modal" data-target="#exampleModal">
                        Ứng tuyển
                    </button>
                </td>
            </tr>';
    } 
    echo $str;
?>