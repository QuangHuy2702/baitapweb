<?php
require_once('config.php');

function execute($sql) {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf-8');

    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

function executeResult($sql) {
    $data = [];

    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf-8');

    $result = mysqli_query($conn, $sql);
    while(($row = mysqli_fetch_array($result, 1)) != null) {
        $data[] = $row;
    }

    mysqli_close($conn);

    return $data;
}

?>