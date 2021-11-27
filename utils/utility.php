<?php

function getGet($key) {
    $value = '';
    if(isset($_GET[$key])) {
        $value = $_GET[$key];
    }
    return trim($value);
}

function getPost($key) {
    $value = '';
    if(isset($_POST[$key])) {
        $value = $_POST[$key];
    }
    return trim($value);
}

function validate() {
    if(isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    return null;
}

?>