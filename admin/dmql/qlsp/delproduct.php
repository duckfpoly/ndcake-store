<?php
    $idprd = $_GET['idprd'];
    if (!empty($idprd)) {
        $sql = "DELETE FROM products WHERE id = {$idprd}";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            echo '<script language="javascript">alert("Xóa thành công !!!"); window.location="index_admin.php?module=qlsp";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
?>