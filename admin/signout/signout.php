<?php 
    include('../../element/connectdb.php');
    session_start();
    unset($_SESSION['user_admin']);
    header('location: ../index_admin.php');
?>
