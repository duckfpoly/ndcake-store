<?php 
    include('connectdb.php');
    unset($_SESSION['user']);
    unset($_SESSION['cart']);
    header('location: ../index.php')
?>