<?php
include('insert_user_guest.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">
<style>
    html {
        font-size: 10px;
    }

    .btn-get {
        font-size: 1.8rem;
        font-family: "Quicksand", sans-serif;
        color: #fff !important;
        text-transform: capitalize;
        background-image: -webkit-gradient(linear, left top, right top, from(#b70b83), to(#33077f));
        background-image: linear-gradient(to right, #b70b83, #33077f);
        padding: 10px 20px 10px;
        position: relative;
        border: 0;
        border-radius: 5px;
        overflow: hidden;
        text-transform: capitalize !important;
    }

    .btn-get::before {
        position: absolute;
        content: '';
        top: 0;
        height: 100%;
        width: 0;
        left: 0;
        background-image: -webkit-gradient(linear, left top, right top, from(#33077f), to(#b70b83));
        background-image: linear-gradient(to right, #33077f, #b70b83);
        -webkit-transition: .5s ease-out;
        transition: .5s ease-out;
    }

    .btn-get:hover::before {
        width: 100%;
    }

    .btn-get span {
        position: relative;
        z-index: 2;
    }


    .main__form .form-group {
        position: relative;
        margin-bottom: 2rem;
    }

    .main__form .form-group label {
        font-family: "Quicksand", sans-serif;
        font-size: 1.6rem;
        color: #575757;
        padding: 0 2.5rem;
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        z-index: 0;
        -webkit-transition: .3s all;
        transition: .3s all;
    }

    .main__form .form-group input,
    .main__form .form-group textarea {
        font-size: 1.6rem;
        border-color: #f7f7f7;
        padding: 0 2.5rem;
        position: relative;
        z-index: 1;
        background: transparent;
    }

    .main__form .form-group input:not(:placeholder-shown)+label,
    .main__form .form-group textarea:not(:placeholder-shown)+label {
        top: 2%;
        background: #fff;
        z-index: 2;
        font-weight: 600;
    }

    .main__form .form-group input:focus,
    .main__form .form-group textarea:focus {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .main__form .form-group input:focus::-webkit-input-placeholder,
    .main__form .form-group textarea:focus::-webkit-input-placeholder {
        color: #999;
    }

    .main__form .form-group input:focus:-ms-input-placeholder,
    .main__form .form-group textarea:focus:-ms-input-placeholder {
        color: #999;
    }

    .main__form .form-group input:focus::-ms-input-placeholder,
    .main__form .form-group textarea:focus::-ms-input-placeholder {
        color: #999;
    }

    .main__form .form-group input:focus::placeholder,
    .main__form .form-group textarea:focus::placeholder {
        color: #999;
    }

    .main__form .form-group input:focus+label,
    .main__form .form-group textarea:focus+label {
        background: #fff;
        z-index: 2;
        top: 2%;
        font-weight: 600;
    }

    .main__form .form-group input::-webkit-input-placeholder,
    .main__form .form-group textarea::-webkit-input-placeholder {
        color: transparent;
    }

    .main__form .form-group input:-ms-input-placeholder,
    .main__form .form-group textarea:-ms-input-placeholder {
        color: transparent;
    }

    .main__form .form-group input::-ms-input-placeholder,
    .main__form .form-group textarea::-ms-input-placeholder {
        color: transparent;
    }

    .main__form .form-group input::placeholder,
    .main__form .form-group textarea::placeholder {
        color: transparent;
    }

    .main__form .form-group input {
        height: 6rem;
    }

    .main__form .form-group.form-message label {
        font-family: "Quicksand", sans-serif;
        font-size: 1.6rem;
        color: #575757;
        padding: 2.5rem;
        position: absolute;
        top: -5%;
        -webkit-transform: unset;
        transform: unset;
        z-index: 0;
        -webkit-transition: .3s all;
        transition: .3s all;
    }

    .main__form .form-group.form-message textarea {
        padding: 2.5rem;
    }

    .main__form .form-group.form-message textarea:not(:placeholder-shown)+label {
        top: -8% !important;
        background: #fff;
        z-index: 2;
        font-weight: 600;
        padding: 0 2.5rem !important;
    }

    .main__form .form-group.form-message textarea:focus {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .main__form .form-group.form-message textarea:focus::-webkit-input-placeholder {
        color: #999;
    }

    .main__form .form-group.form-message textarea:focus:-ms-input-placeholder {
        color: #999;
    }

    .main__form .form-group.form-message textarea:focus::-ms-input-placeholder {
        color: #999;
    }

    .main__form .form-group.form-message textarea:focus::placeholder {
        color: #999;
    }

    .main__form .form-group.form-message textarea:focus+label {
        background: #fff;
        z-index: 2;
        top: -8% !important;
        font-weight: 600;
        padding: 0 2.5rem !important;
    }

    .main__form label.btn-attached {
        background: #b30b83;
        padding: 11px 42px;
        border-radius: 3px;
        color: #fff;
        font-size: 1.6rem;
        -webkit-transition: .3s all;
        transition: .3s all;
    }

    .main__form label.btn-attached:hover {
        cursor: pointer;
        background: #33077f;
    }

    .main__form .form-groups.form-check {
        margin: 1.5rem 0;
    }

    .main__form .form-groups.form-check input {
        position: relative;
    }

    .main__form .form-groups.form-check label {
        font-size: 1.4rem;
        color: #718399;
    }

    .main__form button.btn.btn-get {
        position: relative;
        top: 0px;
        margin: 0 0 -80px;
        font-size: 20px;
    }


    .project__form {
        font-size: 1.6rem;
    }

    .project__form h3 {
        font-family: "Quicksand", sans-serif;
        ;
        font-size: 4.1rem;
        color: #272727;
        line-height: 8.8rem;
        color: #fff;
    }

    .project__form::before {
        display: none;
    }

    .ready__started {
        background: linear-gradient(150deg, #b70b83, #33077f);
        background-size: 200% 200%;
        -webkit-animation: AnimationGradient 5s ease infinite;
        animation: AnimationGradient 5s ease infinite;
        padding: 0rem 0 5rem;
        position: relative;
    }

    .ready__started::before {
        background: url(../images/dot-back.png) no-repeat bottom right/contain;
        content: '';
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100%;
        top: 0;
    }

    .ready__started p {
        color: #fff;
    }

    .ready__started-box {
        background: #fff;
        padding: 15rem;
        border-radius: 5px;
        margin-top: 0rem;
    }

    .ready__started-box h3 {
        font-size: 5rem;
        font-family: "Quicksand", sans-serif;
        font-weight: 900;
    }

    .ready__started-box p {
        color: #272727;
        font-size: 2.2rem;
        font-family: "Quicksand", sans-serif;
    }

    @-webkit-keyframes AnimationGradient {
        0% {
            background-position: 26% 0%;
        }

        50% {
            background-position: 75% 100%;
        }

        100% {
            background-position: 26% 0%;
        }
    }

    @keyframes AnimationGradient {
        0% {
            background-position: 26% 0%;
        }

        50% {
            background-position: 75% 100%;
        }

        100% {
            background-position: 26% 0%;
        }
    }

    section.ready__started.project__form {
        margin-bottom: 40rem;
    }

    section.ready__started.project__form .ready__started-box {
        position: relative;
        margin-bottom: -40rem;
        -webkit-box-shadow: 0 3px 3.2rem rgba(0, 0, 0, 0.08);
        box-shadow: 0 3px 3.2rem rgba(0, 0, 0, 0.08);
    }

    .nav-link {
        color: #000;
    }

    .nav-link:hover {
        color: #fff;
    }

    .nav-item {
        position: absolute;
        /* bottom: 0; */
        left: -15px;
        /* bottom: 0; */
    }
</style>
<section class="ready__started project__form">
    <div class="col-md-1 nav-item">
        <a href="../">
            <button type="button" class="btn btn-outline-light">
                <<< Quay l???i trang ch???</button>
        </a>
    </div>
    <div class="container">
        <h3 class="text-center">NDMOONCAKE - ????ng k?? t??i kho???n</h3>
        <div class="ready__started-box">
            <form method="post" class="main__form" name="myForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="fullname" aria-describedby="fullname" placeholder="Nguy???n V??n A" required name="fullname">
                            <label for="fullname">H??? v?? t??n</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="xxx-xxx-xxxx" required name="phone">
                            <label for="phone">S??? ??i???n tho???i</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="example@gmail.com" required name="email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="address" type="text" class="form-control" id="address" aria-describedby="address" placeholder="S??? ... Ng??/Ng??ch ... ???????ng ... Ph?????ng ... T???nh ..." required>
                            <label for="address">?????a ch???</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" id="username" aria-describedby="username" placeholder="username" required>
                            <label for="username">T??n ????ng nh???p</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="**************" required>
                            <label for="password">M???t Kh???u</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span>B???n ???? c?? t??i kho???n ?</span> <a href="signin.php">????ng nh???p ngay !</a>
                </div>
                <br>
                <div class="text-center">
                    <button onclick="ValidateEmail(document.myForm.email)" type="submit" class="btn btn-get"><span>????ng k??</span></button>
                </div>
            </form>
        </div>
    </div>
</section>