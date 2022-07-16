<?php
$id_user = $_GET['id_user'];
$fullname = "";
$username = "";
$address = "";
$email = "";
$phone = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["fullname_update"])) {
        $fullname = $_POST['fullname_update'];
    }
    if (isset($_POST["username_update"])) {
        $username = $_POST['username_update'];
    }
    if (isset($_POST["address_update"])) {
        $address = $_POST['address_update'];
    }
    if (isset($_POST["email_update"])) {
        $email = $_POST['email_update'];
    }
    if (isset($_POST["phone_update"])) {
        $phone = $_POST['phone_update'];
    }
    if (!empty($id_user)) {
        $sql = "UPDATE user_guest SET fullname = '{$fullname}',username = '{$username}', address = '{$address}', email = '{$email}' , phone = '{$phone}' WHERE id = {$id_user}";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo '<script language="javascript">alert("Sửa thông tin thành công !!!"); window.location="?page=profile_guest&id='.$id_user.'";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
// $conn->close();
?>
    <form method="post">
        <?php  
            $sql_user = "SELECT * FROM user_guest WHERE user_guest.id = {$id_user}";
            $query_user = mysqli_query($conn,$sql_user);
            foreach($query_user as $user):
        ?>
        <div class="container" style="margin-top: 150px;">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="<?php echo $user['url_image'] ?>" alt="img_user">
                                    </div>
                                    <h5 class="user-name"><?php echo $user['fullname'] ?></h5>
                                    <!-- <h6 class="user-email">yuki@Maxwell.com</h6> -->
                                </div>
                                <!-- <div class="about">
                            <h5>About</h5>
                            <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input name="fullname_update" type="text" class="form-control" id="fullName" placeholder="Enter full name" value="<?php echo $user['fullname'] ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input name="email_update" type="email" class="form-control" id="eMail" placeholder="Enter email ID" value="<?php echo $user['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input name="phone_update" type="text" class="form-control" id="phone" placeholder="Enter phone number" value="<?php echo $user['phone'] ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input name="username_update"  type="text" class="form-control" id="username" placeholder="Enter username" value="<?php echo $user['username'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <!-- <label for="zIp">Zip Code</label> -->
                                        <input name="address_update" type="text" class="form-control" id="address" placeholder="Enter address" value="<?php echo $user['address'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-secondary" onclick="location.href='?page=profile_guest&id=<?php echo $id_user ?>'">Hủy</button>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>
<style>
    body {
        margin: 0;
        padding-top: 40px;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }

    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }

    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }
</style>