<?php
include('connectdb.php');
$username = "";
$password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"])) {
        $username = $_POST['username'];
    }
    if (isset($_POST["password"])) {
        $password = $_POST['password'];
    }
    $sql = "SELECT * FROM user_guest WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkUsername = mysqli_num_rows($query);
    if ($checkUsername == 1) {
        $checkPass = password_verify($password, $data['password']);
        if ($checkPass) {
            $_SESSION['user'] = $data;
            header('location: ../');
        } else {
            echo '<script language="javascript">alert("Sai mật khẩu !!!"); window.location="signin.php";</script>';
        }
    } else {
        echo '<script language="javascript">alert("username không tồn tại !!!"); window.location="signin.php";</script>';
    }
}
?>
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
                                        <h4 class="mt-1 mb-3 pb-1">We are NDCAKE Team</h4>
                                    </div>
                                    <form method="post" class="form" id="form-1">
                                        <p class="text-center mb-5">LOGIN TO NDCAKE</p>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input name="username" type="text" class="form-control" id="username">
                                            <span class="form-message"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input name="password" type="password" class="form-control" id="password">
                                            <span class="form-message"></span>
                                        </div>
                                        <!-- <input type="checkbox" onclick="myFunction()">&nbsp;Show Password -->
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" onclick="myFunction()">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Show Password</label>
                                        </div>
                                        <div class="text-center mt-4 pt-1 mb-5 pb-1">
                                            <button class="btn btn-outline-danger fa-lg mb-3" type="submit">Đăng nhập</button><br>
                                            <a class="text-muted" href="request_reset_pass.php">Quên mật khẩu?</a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Bạn chưa có tài khoản?</p>
                                            <!-- <button onclick="location.href='signup.php'" type="submit" class="btn btn-outline-danger">Đăng ký ngay</button> -->
                                            <a href="signup.php" class="btn btn-outline-danger">Đăng ký ngay</a>
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
    <script src="../js/validateForm.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mong muốn của chúng ta
            Validator({
                form: '#form-1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#username', 'Vui lòng nhập username'),
                    Validator.isRequired('#password', 'Vui lòng nhập passwword'),
                    Validator.minLength('#username',1),
                    Validator.minLength('#password', 1),
                ],
            });
        });
    </script>
</body>

</html>