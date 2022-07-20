
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NDCAKE - ĐĂNG NHẬP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .gradient-custom-2 {
            background: url('https://i.pinimg.com/originals/ba/f0/34/baf034187ca3ab2f48b3552209f52ae2.png') 100% no-repeat;
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }

        .form-group.invalid .form-control {
            border-color: #f33a58;
        }

        .form-group.invalid .form-message {
            color: #f33a58;
        }
    </style>
</head>
<body>
<?php
include('connectdb.php');
if (
  isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
  && ($_GET["action"] == "reset") && !isset($_POST["action"])
) {
  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $query = mysqli_query(
    $conn,
    "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';"
  );
  $row = mysqli_num_rows($query);
  if ($row == "") {
    $error .= '<h2>Liên kết không hợp lệ</h2>
<p>Liên kết không hợp lệ / hết hạn. Hoặc bạn đã không sao chép đúng liên kết
từ email hoặc bạn đã sử dụng khóa trong trường hợp đó
đã ngừng hoạt động.</p>
<p><a href="http://storendcake.000webhostapp.com/element/request_reset_pass.php">
Click here</a> to reset password.</p>';
  } else {
    $row = mysqli_fetch_assoc($query);
    $expDate = $row['expDate'];
    if ($expDate >= $curDate) {
?>

    <!-- start -->
    <section class="h-100 gradient-form content">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body  p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/img2.png?v=1656818794378" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-3 pb-1">NDCAKE SUPPORT</h4>
                                    </div>
                                    <form method="post" class="form" id="form-1">
                                        <p class="text-center mb-5">RESET PASSWORD</p>
                                        <div class="form-group">
                                            <label for="password">Mật khẩu mới</label>
                                            <input name="password" type="password" class="form-control" id="password">
                                            <span class="form-message"><br></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="repassword">Nhập lại mật khẩu mới</label>
                                            <input name="repassword" type="password" class="form-control" id="repassword">
                                            <span class="form-message"><br></span>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" onclick="showpassword()">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Show Password</label>
                                        </div>
                                        <div class="text-center mt-5 pt-1 mb-5 pb-1">
                                            <button class="btn btn-outline-danger fa-lg mb-3" type="submit">Lưu mật khẩu</button><br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4 text-center" style="margin-top:100px ;">MID-AUTUMN FESTIVAL</h4>
                                    <p class="small mb-0 text-center">Tết Trung Thu người người phương xa trở về vui đoàn tụ <br>
                                        Rằm tháng tám rước khách láng giềng họp mặt kết thiện duyên
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    } else {
      $error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
    }
  }
  if ($error != "") {
    echo "<div class='error'>" . $error . "</div><br />";
  }
} // isset email key validate end
if (
  isset($_POST["email"]) && isset($_POST["action"]) &&
  ($_POST["action"] == "update")
) {
  $error = "";
  $pass1 = mysqli_real_escape_string($conn, $_POST["password"]);
  $pass2 = mysqli_real_escape_string($conn, $_POST["repassword"]);
  $email = $_POST["email"];
  $curDate = date("Y-m-d H:i:s");
  if ($pass1 != $pass2) {
    $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
  }
  if ($error != "") {
    echo "<div class='error'>" . $error . "</div><br />";
  } else {
    // $pass1 = md5($pass1);
    $pass1 = password_hash($$pass1, PASSWORD_DEFAULT);
    mysqli_query(
      $conn,
      "UPDATE `user_guest` SET `password`='$pass1' WHERE `email`='$email';"
    );

    mysqli_query($conn, "DELETE FROM `password_reset_temp` WHERE `email`='" . $email . "';");

    echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="signin.php">
Click here</a> to Login.</p></div><br />';
  }
}
?>
    <script src="../js/validateForm.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mong muốn của chúng ta
            Validator({
                form: '#form-1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#password', 'Vui lòng nhập passwword'),
                    Validator.isRequired('#repassword', 'Vui lòng nhập lại passwword'),
                    Validator.minLength('#password',6),
                    Validator.minLength('#repassword',6),
                    Validator.isConfirmed('#repassword', function () {
                    return document.querySelector('#form-1 #password').value;
                    }, 'Mật khẩu nhập lại không chính xác')
                ],
            });
        });
    </script>
</body>

</html>
