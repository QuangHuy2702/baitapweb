<?php
$username = $password = $msg = '';

if(!empty($_POST)) {
    $username = getPost('username');
    $password = getPost('password');

    $sql = "select * from student where username = '$username' and password = '$password'";

    $userExist = executeResult($sql);

    if($userExist == null) {
        $msg = 'Tài khoản hoặc mật khẩu không chính xác';
    }
    else{
        $_SESSION['user'] = $userExist[0];
        if($userExist[0]['role'] == 1) {
            header('Location: /baitapweb/admin.php');
            die();
        }
        else {
            header('Location: /baitapweb/user.php');
            die();
        }
    }
}
?>