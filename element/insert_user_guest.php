<?php
    include('connectdb.php');
    $fullname = "";
    $username= "";
    $password= "";
    $phone= "";
    $email= "";
    $address= "";
    $url_image = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["fullname"])) {
            $fullname = $_POST['fullname']; 
        }
        if (isset($_POST["username"])) {
            $username = $_POST['username'];
        }
        if (isset($_POST["password"])) {
            $password = $_POST['password'];
            $pass = password_hash($password,PASSWORD_DEFAULT);
        }
        if (isset($_POST["phone"])) {
            $phone = $_POST['phone'];
        }
        if (isset($_POST["email"])) {
            $email= $_POST["email"];
        }
        if (isset($_POST["address"])) {
            $address = $_POST['address'];
        }
        if (isset($_POST["url_image"])) {
            $url_image = $_POST['url_image'];
        }
        $sql = "SELECT * FROM user_guest WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0)
        {
            echo '<script language="javascript">alert("Username đã tồn tại !!!"); window.location="signup.php";</script>';
            die ();
        }
        else {
            $sql = "INSERT INTO user_guest (fullname,username,password,phone,email,address,url_image) 
                            VALUES ('{$fullname}','{$username}','{$pass}','{$phone}','{$email}','{$address}','https://www.pngitem.com/pimgs/m/576-5768680_avatar-png-icon-person-icon-png-free-transparent.png')";
            $query = mysqli_query($conn,$sql);
            if ($query){
                echo '<script language="javascript">alert("Đăng ký thành công !"); window.location="dangnhap.php";</script>';
            }
            else {
                echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="signup.php";</script>';
            }
        }
    }
    $conn->close();
?>
