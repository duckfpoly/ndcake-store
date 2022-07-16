<?php
    include('../../element/connectdb.php');
    $usernameadmin= "";
    $password= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["usernameadmin"])) {
            $usernameadmin = $_POST['usernameadmin'];
        }
        if (isset($_POST["password"])) {
            $password = $_POST['password'];
        }
        $sql = "SELECT * FROM employee WHERE usernameadmin = '$usernameadmin'";
        $query = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($query);
        $checkUsername = mysqli_num_rows($query);
        if($checkUsername == 1){
            $checkPass = password_verify($password, $data['password']);
            if($checkPass){
                $_SESSION['user_admin'] = $data;
                header('location: ../index_admin.php?module=dashboard');
            }
            else {
                echo '<script language="javascript">alert("Sai mật khẩu !");</script>';
            }
        }
        else {
            echo '<script language="javascript">alert("Username không tồn tại !");</script>';
        }
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style_login.css"/>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
      .eula a {
        text-decoration: none;
        color: cadetblue;
      }
      .eula a:hover {
        color: red;
      }
    </style>
</head>
<body>
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login admin</div>
      <!-- <div class="eula">ADMIN</div> -->
      <div class="eula">Chưa có tài khoản ?<br><br><a  href="https://mail.google.com/mail/u/0/#inbox?compose=new">Gửi yêu cầu tạo tài khoản! </a></div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form">
        <form method="post">
          <label for="usernameadmin">Email</label>
          <input name="usernameadmin" type="text" class="form-control" id="usernameadmin" aria-describedby="username"  required>
          <label for="password">Password</label>
          <input name="password" type="password" class="form-control" id="password" aria-describedby="password" required>
          <input type="submit" id="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.js" integrity="sha512-E378bwaeZf1nwXeJGIwTB58A5gPt5jFU3u6aTGja4ZdRFJeo/N/REKnBgNZOZlH6JdnOPO98vg2AnSGaNfCMFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="main.js"></script>
</body>
</html>