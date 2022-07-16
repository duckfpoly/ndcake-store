<?php
if (isset($_GET['module'])) {
    switch ($_GET['module']) {
        case "dashboard":
            include('./dmql/dashboard.php');
            break;
        case "qlsp":
            include('./dmql/qlsp/qlsp.php');
            break;
        case "qldh":
            include('./dmql/qldh/qldh.php');
            break;
        case "qlhd":
            include('./dmql/qlhd/qlhd.php');
            break;
        case "qlkh":
            include('./dmql/qlkh/qlkh.php');
            break;
        case "khdetail":
            include('./dmql/qlkh/khdetail.php');
            break;
        case "qltt":
            include('./dmql/qltt/qltt.php');
            break;
        case "addproduct":
            include('./dmql/qlsp/addproduct.php');
            break;
        case "fixproduct":
            include('./dmql/qlsp/fixproduct.php');
            break;
        case "delproduct":
            include('./dmql/qlsp/delproduct.php');
            break;
       case "addcate":
            include('./dmql/qldm/addcate.php');
            break;
        case "fixcate":
            include('./dmql/qldm/fixcate.php');
            break;
        case "delcate":
            include('./dmql/qldm/delcate.php');
            break;
        case "orderDetail":
            include('./dmql/qldh/orderDetail.php');
    }
}
