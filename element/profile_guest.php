<?php
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
if(isset($user['username'])):
?>
<div style="height: 150px;"></div>
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-12 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="<?php echo $user['url_image'] ?>" alt="Avatar" class="img-fluid my-5" style="width: 100px;border-radius:50%;" />
                            <h3 style="color:#fff;"><?php echo $user['fullname'] ?></h3>
                            <p style="color:#fff;font-size:20px;">Client </p>
                        </div>
                        <div class="col-md-8 ">
                            <div class="card-body content_user p-4">
                                <h6>Information | User ID: NDCAKE-GUEST-N<?php echo $user['id'] ?></h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted"><?php echo $user['email'] ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Số điện thoại</h6>
                                        <p class="text-muted"><?php echo $user['phone'] ?></p>
                                    </div>
                                </div>
                                <h6>Others</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-12 mb-12">
                                        <h6>Username</h6>
                                        <p class="text-muted"><?php echo $user['username'] ?></p>
                                    </div>
                                    <div class="col-12 mb-12">
                                        <h6>Địa chỉ</h6>
                                        <p class="text-muted"><?php echo $user['address'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<style>
    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }

    #row {
        display: none;
        animation: 0.3s show ease-in-out;
    }

    @keyframes show {
        0% {
            transform: translateY(-10%);
            opacity: 0;
        }

        100% {
            transform: translateY(0%);
            opacity: 1;
        }
    }

    .gradient-custom {
        /* fallback for old browsers */
        /* background: #f6d365; */
        /* background: rgba(0, 0, 0, 1); */
        background: url('https://cdn.dribbble.com/users/55063/screenshots/2266143/9_squares_dot.gif') 60%;
        /* Chrome 10-25, Safari 5.1-6 */
        /* background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1)); */

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        /* background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1)) */
    }
    .content_user {
        background: url('https://camo.githubusercontent.com/a5be49ffbdea09c4eb4c8a5aadf69f53d1f6be437247315b656757435371b645/687474703a2f2f7368616c6c6d656e746d6f2e6769746875622e696f2f696d616765732f6c696e652d646f742d6261636b67726f756e642e676966');
    }
</style>