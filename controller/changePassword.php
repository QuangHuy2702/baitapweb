<?php
$username = $oldpassword = $newpassword = $msg = $sql = '';

if(!empty($_POST)) {
    $username = getPost('username');
    $oldpassword = getPost('oldpassword');
    $newpassword = getPost('newpassword');

    $sql = "select * from student where username = '$username' and password = '$oldpassword'";

    $userExist = executeResult($sql);

    if($userExist == null) {
        $msg = "Tài khoản hoặc mật khẩu cũ không chính xác";
    }
    else{
        $sql = "update student set password = '$newpassword' where username = '$username'" ;
        execute($sql);
        $msg = "Đổi mật khẩu thành công";
    }
}
?>