<?php
    include('insert_user_guest.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NDCAKE - ĐĂNG KÝ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    body {
        background-color: #aaa;
    }
    ::-webkit-scrollbar {
    width: 1px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #f1f1f1;

    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: #f1f1f1;
    border-radius: 5px;
    
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #f1f1f1;
    }
    .g-0 {
        box-shadow: 0 0 100px 0 #fff;
    }
    
    .form-group.invalid .form-control {
        border-color: #f33a58;
    }
    .form-group.invalid .form-message {
        color: #f33a58;
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
    @media (min-width: 990px) {
        .box_content {
            width: 100%;
            text-align: center;
            margin-top: -300px;
        }
        .col-lg-6 {
        height: 90vh;
        overflow: auto;
        }
        .g-0 {
        height: 90vh;
        }
    }
    .gradient-custom-2 {
        background: url('https://tmdl.edu.vn/wp-content/uploads/2022/07/hinh-nen-tet-trung-thu-dep-nhat-40.jpg') 100%;
    }
    .form-check-input:checked {
        background-color: cadetblue;
        border-color: cadetblue;
    }
</style>
</head>
<body>
        <!-- start -->
        <section class="h-100 gradient-form content">
            <div class="container  h-100">
                <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="col-lg-6 gradient-custom-2 d-flex align-items-center justify-content-center">
                                    <div class="card-body p-md-5 mx-md-4  mb-2">
                                        <div class="text-center content-left">
                                            <div class="box_content">
                                                <img src="https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/img2.png?v=1656818794378" style="width: 185px;" alt="logo">
                                                <h2 style="color:#fff ;" class="mt-1 mb-3 pb-1">WE ARE NDCAKE TEAM</h2>
                                                <p style="color:#fff;" class="text-center mb-5">REGISTER TO NDCAKE</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form method="post" class="p-3 form" id="form-1">
                                        <div class="form-group">
                                            <label for="fullname">Họ và tên</label>
                                            <input name="fullname" type="text" class="form-control" id="fullname">
                                            <span class="form-message"><br></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input name="phone" type="text" class="form-control" id="phone">
                                            <span class="form-message"><br></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input name="email" type="text" class="form-control" id="email">
                                            <span class="form-message"><br></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Địa chỉ</label>
                                            <input name="address" type="text" class="form-control" id="address">
                                            <span class="form-message"><br></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input name="username" type="text" class="form-control" id="username">
                                            <span class="form-message"><br></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input name="password" type="password" class="form-control" id="password">
                                            <span class="form-message"><br></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="repassword">Nhập lại password</label>
                                            <input name="repassword" type="password" class="form-control" id="repassword">
                                            <span class="form-message"><br></span>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" onclick="showpassword()">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Show Password</label>
                                        </div>
                                        <div class="text-center mt-5 mb-5 pt-1">
                                            <button class="btn btn-outline-secondary btn-block fa-lg mb-3" name="register" type="submit">Đăng ký</button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mb-5">
                                            <p class="mb-0 me-2">Bạn đã có tài khoản!</p>
                                            <!-- <button onclick="location.href='dangnhap.php'" class="btn btn-outline-danger">Đăng nhập ngay</button> -->
                                            <a href="dangnhap.php" class="btn btn-outline-danger">Đăng nhập ngay</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="../js/validateForm.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mong muốn của chúng ta
            Validator({
                form: '#form-1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#fullname', 'Vui lòng nhập đầy đủ họ tên'),
                    Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
                    Validator.isPhone('#phone'),
                    Validator.isRequired('#email', 'Vui lòng nhập email'),
                    Validator.isEmail('#email'),
                    Validator.isRequired('#address', 'Vui lòng nhập địa chỉ'),
                    Validator.isRequired('#username', 'Vui lòng nhập username'),
                    Validator.isRequired('#password', 'Vui lòng nhập passwword'),
                    Validator.isRequired('#repassword', 'Vui lòng nhập lại passwword'),
                    Validator.minLength('#username',6),
                    Validator.minLength('#password',6),
                    Validator.isConfirmed('#repassword', function () {
                    return document.querySelector('#form-1 #password').value;
                    }, 'Mật khẩu nhập lại không chính xác')
                ],
            });
        });
    </script>
    </body>
</html>