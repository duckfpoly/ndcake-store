<?php
include('../element/connectdb.php');
header('Content-Type: text/html; charset=UTF-8');
$user = (isset($_SESSION['user_admin'])) ? $_SESSION['user_admin'] : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style_admin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <div class="wrapper">
    <?php if (isset($user['usernameadmin'])) { ?>
      <aside class="sidebar">
        <div class="user">
          <div class="image_user">
            <img src="<?php echo $user['image'] ?>" alt="">
          </div>
          <div class="name_user">
            <p><?php echo $user['usernameadmin'] ?></p>
            <a href="./signout/signout.php">Sign Out</a>
          </div>
        </div>
        <div id="leftside-navigation" class="nano">
          <ul class="nano-content">
            <li>
              <a href="?module=dashboard"><i class="fa fa-dashboard"></i><span>Tổng quan</span></a>
            </li>
            <li class="sub-menu">
              <a href="javascript:void(0);"><i class="fa fa-cogs"></i><span>Danh Mục Quản lý</span><i class="arrow fa fa-angle-right pull-right"></i></a>
              <ul>
                <li>
                  <a href="?module=qlsp">Quản lý sản phẩm</a>
                </li>
                <li>
                  <a href="?module=qldh">Quản lý đơn hàng</a>
                </li>
                <li>
                  <a href="?module=qlhd">Quản lý hóa đơn</a>
                </li>
                <li>
                  <a href="?module=qlkh">Quản lý Client</a>
                </li>
                <li>
                  <a href="?module=qltt">Quản lý tin tức</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </aside>
    <?php } else { ?>
      <div class="card-body col-12 text-center">
        <h5 class="card-title">Vui Lòng đăng nhập !</h5>
        <p class="card-text">Cần đăng nhập để sử dụng chức năng quản lý</p>
        <a href="./login/login_admin.php" class="btn btn-primary">Đăng nhập</a>
      </div>
    <?php } ?>
    <section class="content">
      <div class="show">
        <?php
        include('dieuhuong.php');
        ?>
      </div>
    </section>
  </div>
  <script>
    $("#leftside-navigation .sub-menu > a").click(function(e) {
      $("#leftside-navigation ul ul").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),
        e.stopPropagation()
    })
  </script>
</body>
</html>
<style>
  @import url('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
  @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
  @import url('https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css');

  @font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 300;
    font-stretch: normal;
    src: url(https://fonts.gstatic.com/s/opensans/v29/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsiH0B4gaVc.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 400;
    font-stretch: normal;
    src: url(https://fonts.gstatic.com/s/opensans/v29/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsjZ0B4gaVc.ttf) format('truetype');
  }

  @font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 700;
    font-stretch: normal;
    src: url(https://fonts.gstatic.com/s/opensans/v29/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsg-1x4gaVc.ttf) format('truetype');
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .wrapper {
    width: 100%;
    height: auto;
    display: flex;
    justify-content: space-between;
  }

  .sidebar-toggle {
    margin-left: -240px;
  }

  .sidebar {
    position: fixed;
    top: 0;
    width: 15%;
    height: 100vh;
    background: #293949;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    z-index: 100;
  }

  .sidebar #leftside-navigation ul,
  .sidebar #leftside-navigation ul ul {
    margin: 0;
    padding: 0;
  }

  .sidebar #leftside-navigation ul li {
    list-style-type: none;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  }

  .sidebar #leftside-navigation ul li.active>a {
    color: #1abc9c;
  }

  .sidebar #leftside-navigation ul li.active ul {
    display: block;
  }

  .sidebar #leftside-navigation ul li a {
    color: #aeb2b7;
    text-decoration: none;
    display: block;
    padding: 18px 0 18px 25px;
    font-size: 12px;
    outline: 0;
    -webkit-transition: all 200ms ease-in;
    -moz-transition: all 200ms ease-in;
    -o-transition: all 200ms ease-in;
    -ms-transition: all 200ms ease-in;
    transition: all 200ms ease-in;
  }

  .sidebar #leftside-navigation ul li a:hover {
    color: #1abc9c;
  }

  .sidebar #leftside-navigation ul li a span {
    display: inline-block;
  }

  .sidebar #leftside-navigation ul li a i {
    width: 20px;
  }

  .sidebar #leftside-navigation ul li a i .fa-angle-left,
  .sidebar #leftside-navigation ul li a i .fa-angle-right {
    padding-top: 3px;
  }

  .sidebar #leftside-navigation ul ul {
    display: none;
  }

  .sidebar #leftside-navigation ul ul li {
    background: #23313f;
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
    border-bottom: none;
  }

  .sidebar #leftside-navigation ul ul li a {
    font-size: 12px;
    padding-top: 13px;
    padding-bottom: 13px;
    color: #aeb2b7;
  }

  .user {
    width: 100%;
    height: 100px;
    background-color: cadetblue;
    display: flex;
  }

  .image_user {
    width: 50%;
    height: 100px;
    /* text-align: center; */
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .image_user img {
    width: 70%;
    border-radius: 50%;
    /* padding: 5px; */
  }

  .name_user {
    width: 50%;
    height: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .name_user p {
    color: #fff;
    font-weight: bold;
    font-size: 14px;
  }

  .name_user a {
    text-decoration: none;
    color: black;
    padding-top: 12px;
  }

  .name_user a:hover {
    color: #fff;
  }

  .content {
    width: 85%;
    height: auto;
    margin-left: 15%;
  }

  .content_ql {
    width: 100%;
    height: auto;
    margin-bottom: 100px;
  }

  .banner {
    width: 100%;
    height: 200px;
    position: relative;
    text-align: center;
  }

  .banner img {
    width: 100%;
    height: 200px;
  }

  .banner .title {
    width: 50%;
    height: 200px;
    line-height: 200px;
    position: absolute;
    color: #fff;
    left: 50%;
    transform: translateX(-50%);
    font-size: 50px;
    font-weight: bold;
  }

  .filterandaddproduct {
    width: 100%;
    height: 60px;
    margin-top: 20px;
    margin-bottom: 64px;
    position: relative;
  }

  .filter {
    width: 300px;
    height: 50px;
    position: absolute;
    left: 50px;
  }

  .filter input {
    padding: 10px 100px 10px 10px;
  }

  .cta {
    position: absolute;
    right: 50px;
    width: 200px;
    height: 50px;
    display: flex;
    padding: 10px 45px;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: white;
    background: #fff;
    transition: 1s;
    box-shadow: 6px 6px 0 black;
    transform: skewX(-15deg);
    color: #000;
    border: 1px solid black;
  }

  .cta:focus {
    outline: none;
  }

  .cta:hover {
    transition: 0.5s;
    box-shadow: 10px 10px 0 cadetblue;
    text-decoration: none;
  }

  .cta span:nth-child(2) {
    transition: 0.5s;
    margin-right: 0px;
  }

  .cta:hover span:nth-child(2) {
    transition: 0.5s;
    margin-right: 45px;
  }

  @keyframes color_anim {
    0% {
      fill: white;
    }

    50% {
      fill: cadetblue;
    }

    100% {
      fill: white;
    }
  }

  .statistics {
    width: 95%;
    height: auto;
    margin: 0px auto;
    margin-bottom: 64px;
  }

  .statistics p {
    width: 500px;
    height: 50px;
    border-bottom: 3px solid #ccc;
    font-size: 30px;
  }

  .statistics .box {
    width: 100%;
    height: auto;
    display: flex;
    justify-content: space-around;
  }

  .statistics_products {
    width: 250px;
    height: 100px;
    border: 1px solid black;
    border-radius: 20px;
    text-align: center;
    margin-top: 20px;
  }

  .statistics_products h3 {
    height: 50px;
    line-height: 50px;
    background-color: cadetblue;
    border-radius: 20px 20px 0px 0px;
    color: #fff;
  }

  .statistics_products h4 {
    height: 50px;
    line-height: 50px;
  }

  .showlistcategory {
    width: 95%;
    height: auto;
    margin: 0px auto;
  }

  .showlistcategory p {
    width: 500px;
    height: 50px;
    border-bottom: 3px solid #ccc;
    font-size: 30px;
  }

  table {
    width: 100%;
    height: auto;
    margin-top: 32px;
    border-collapse: collapse;
  }

  table thead td {
    width: 300px;
    height: 50px;
    text-align: center;
    font-weight: bold;
  }

  tbody td {
    width: 300px;
    height: auto;
    text-align: center;
  }

  td img {
    width: 100%;
  }

  button {
    background: none;
    border: none;
  }

  .addprd {
    width: 70%;
    height: auto;
    margin: 0px auto;
  }

  form {
    margin-top: 20px;
  }
</style>