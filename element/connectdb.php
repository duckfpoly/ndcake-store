<?php 
    $username = "root";
    $password = "";
    $server = "localhost";
    $dbname = "storemooncake";
    $conn = new mysqli($server, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối lỗi:" . $conn->connect_error);
        exit();
    }
    session_start();
?>