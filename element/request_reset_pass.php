<!DOCTYPE html>
<html lang="en">

<head>
   <title>NDCAKE - SUPPORT</title>
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

      .g-0 {
         box-shadow: 0 0 30px 0 #fff;
      }
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

   </style>
</head>
<body>
   <?php
   include('connectdb.php');
   include "sendmail/PHPMailer-master/src/PHPMailer.php";
   include "sendmail/PHPMailer-master/src/Exception.php";
   include "sendmail/PHPMailer-master/src/OAuth.php";
   include "sendmail/PHPMailer-master/src/POP3.php";
   include "sendmail/PHPMailer-master/src/SMTP.php";
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   $error = "";
   if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
      $email = $_POST["email"];
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      if (!$email) {
         $error .= "Địa chỉ email không hợp lệ, vui lòng nhập một địa chỉ email hợp lệ! Vui lòng thử lại !";
      } else {
         $sel_query = "SELECT * FROM `user_guest` WHERE email='" . $email . "'";
         $results = mysqli_query($conn, $sel_query);
         $row = mysqli_num_rows($results);
         if ($row == "") {
            $error .= "Không có người dùng nào được đăng ký với địa chỉ email này! Vui lòng thử lại !";
         }
      }
      if ($error != "") {
         echo '<script language="javascript">alert("'. $error .' !!!"); window.location="request_reset_pass.php";</script>';
      } else {
         $expFormat = mktime(
            date("H"),
            date("i"),
            date("s"),
            date("m"),
            date("d") + 1,
            date("Y")
         );
         $expDate = date("Y-m-d H:i:s", $expFormat);
         $key = md5((2418 * 2) + $email);
         $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
         $key = $key . $addKey;
         // Insert Temp Table
         mysqli_query(
            $conn,
            "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
            VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');"
         );
         $output = '<p>Dear user,</p>';
         $output .= '<p>Vui lòng click vào liên kết sau để đặt lại mật khẩu của bạn.</p>';
         $output .= '<p>-------------------------------------------------------------</p>';
         $output .= '<p><a href="resetpass.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">Đặt lại mật khẩu</a></p>';
         $output .= '<p>-------------------------------------------------------------</p>';
         $output .= '<p>Hãy đảm bảo sao chép toàn bộ liên kết vào trình duyệt của bạn.
                  Liên kết sẽ hết hạn sau 1 ngày vì lý do bảo mật.</p>';
         $output .= '<p>Nếu bạn không yêu cầu email quên mật khẩu này, không có hành động nào
                  là cần thiết, mật khẩu của bạn sẽ không được đặt lại. Tuy nhiên, bạn có thể muốn đăng nhập vào
                  tài khoản của bạn và thay đổi mật khẩu bảo mật của bạn như ai đó có thể đã đoán ra.</p>';
         $output .= '<p>Thanks,</p>';
         $output .= '<p>ADMIN TEAM NDCAKE</p>';
         $body = $output;
         $subject = "Password Recovery - NDCAKE STORE";
         $email_to = $email;
         require("sendmail/PHPMailer-master/PHPMailerAutoload.php");
         $mail = new PHPMailer();
         $mail->IsSMTP();
         $mail->Host = "smtp.gmail.com"; // Enter your host here
         $mail->SMTPAuth = true;
         $mail->Username = "ndcake.store@gmail.com"; // Enter your email here
         $mail->Password = "mswwgrjitnohamff"; //Enter your password here
         $mail->Port = 587;
         $mail->IsHTML(true);
         $mail->setFrom('ndcake.store@gmail.com', 'NDCAKE STORE');
         $mail->Subject = $subject;
         $mail->Body = $body;
         $mail->AddAddress($email_to);
         if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            echo '<script language="javascript">alert("Một email đã được gửi cho bạn với hướng dẫn về cách đặt lại mật khẩu của bạn."); window.location="https://mail.google.com/";</script>';
         }
      }
   } else {
   ?>
      <section class="h-100 gradient-form" style="margin-top: -20px;">
         <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col-xl-12 col-md-10">
                  <div class="card rounded-3 text-black">
                     <div class="row g-0">
                        <div class="col-lg-6">
                           <div class="card-body p-md-5 mx-md-4">
                              <div class="text-center">
                                 <img src="https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/img2.png?v=1656818794378" style="width: 185px;" alt="logo">
                                 <h4 class="mt-1 mb-3 pb-1">NDCAKE SUPPORT</h4>
                              </div>
                              <form method="post">
                                 <p class="text-center mb-5">Bạn quên mật khẩu?</p>
                                 <div class="form-group">
                                    <label for="email">Nhập Email của bạn</label>
                                    <input type="email" class="form-control" name="email" required />
                                 </div>
                                 <div class="text-center mt-4 pt-1 mb-4 pb-1">
                                    <button class="btn btn-success" value="Reset Password" type="submit">Lấy mật khẩu mới</button>
                                 </div>
                                 <div class="d-flex align-items-center justify-content-center pb-4">
                                    <a href="dangnhap.php" class="btn btn-outline-danger">Quay lại đăng nhập</a>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="col-lg-5 mt-5 ml-2">
                           <h4 class="text-center mb-4">Lấy lại mật khẩu dễ dàng</h4>
                           <p>Thay đổi mật khẩu của bạn trong ba bước đơn giản. Điều này sẽ giúp bạn bảo mật mật khẩu của mình!</p>
                           <ol class="list-unstyled">
                              <li><span class="text-primary text-medium">1. </span>Nhập địa chỉ email của bạn dưới đây.</li>
                              <li><span class="text-primary text-medium">2. </span>Hệ thống của chúng tôi sẽ gửi cho bạn một liên kết tạm thời</li>
                              <li><span class="text-primary text-medium">3. </span>Sử dụng liên kết để đặt lại mật khẩu của bạn</li>
                           </ol>
                           <br>
                           <small class="form-text text-muted"><strong>Lưu ý:</strong> Nhập địa chỉ email bạn đã sử dụng trong quá trình đăng ký trên http://bom.to/ndcake_store. Sau đó, chúng tôi sẽ gửi một liên kết đến địa chỉ email.</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <?php } ?>
   <div class="mt-5"></div>
</body>

</html>