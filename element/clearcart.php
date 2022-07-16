<?php 
    include('connectdb.php');
    unset($_SESSION['cart']);
    header('location: ?page=ordersucces.php')
?>