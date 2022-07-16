<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
include('connectdb.php');
include "sendmail/PHPMailer-master/src/PHPMailer.php";
include "sendmail/PHPMailer-master/src/Exception.php";
include "sendmail/PHPMailer-master/src/OAuth.php";
include "sendmail/PHPMailer-master/src/POP3.php";
include "sendmail/PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$error="";
if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
   $email = $_POST["email"];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $email = filter_var($email, FILTER_VALIDATE_EMAIL);
   if (!$email) {
      $error .= "<p>Địa chỉ email không hợp lệ, vui lòng nhập một địa chỉ email hợp lệ!</p>";
   } else {
      $sel_query = "SELECT * FROM `user_guest` WHERE email='" . $email . "'";
      $results = mysqli_query($conn, $sel_query);
      $row = mysqli_num_rows($results);
      if ($row == "") {
         $error .= "<p>Không có người dùng nào được đăng ký với địa chỉ email này!</p>";
      }
   }
   if ($error != "") {
      echo "<div class='error'>" . $error . "</div>
   <br /><a href='javascript:history.go(-1)'>Go Back</a>";
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
      $output .= '<p>Vui lòng nhấp vào liên kết sau để đặt lại mật khẩu của bạn.</p>';
      $output .= '<p>-------------------------------------------------------------</p>';
      $output .= '<p><a href="resetpass.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">localhost/ndcake/element/resetpass.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
      $output .= '<p>-------------------------------------------------------------</p>';
      $output .= '<p>Hãy đảm bảo sao chép toàn bộ liên kết vào trình duyệt của bạn.
Liên kết sẽ hết hạn sau 1 ngày vì lý do bảo mật.</p>';
      $output .= '<p>Nếu bạn không yêu cầu email quên mật khẩu này, không có hành động nào
là cần thiết, mật khẩu của bạn sẽ không được đặt lại. Tuy nhiên, bạn có thể muốn đăng nhập vào
tài khoản của bạn và thay đổi mật khẩu bảo mật của bạn như ai đó có thể đã đoán ra.</p>';
      $output .= '<p>Thanks,</p>';
      $output .= '<p>ADMIN Team NDCAKE</p>';
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
         echo "<div class='error'>
<p>Một email đã được gửi cho bạn với hướng dẫn về cách đặt lại mật khẩu của bạn.</p>
</div><br /><br /><br />";
      }
   }
} else {
?>
   <!-- 
<form method="post" action="" name="reset"><br /><br />
<label><strong>Enter Your Email Address:</strong></label><br /><br />
<input type="email" name="email" placeholder="username@email.com" />
<br /><br />
<input type="submit" value="Reset Password"/>
</form> -->
   <div class="container padding-bottom-3x mb-2 mt-5">
      <div class="row justify-content-center">
         <div class="col-lg-8 col-md-10">
            <div class="forgot">
               <h2>Forgot your password?</h2>
               <p>Thay đổi mật khẩu của bạn trong ba bước đơn giản. Điều này sẽ giúp bạn bảo mật mật khẩu của mình!</p>
               <ol class="list-unstyled">
                  <li><span class="text-primary text-medium">1. </span>Nhập địa chỉ email của bạn dưới đây.</li>
                  <li><span class="text-primary text-medium">2. </span>Hệ thống của chúng tôi sẽ gửi cho bạn một liên kết tạm thời</li>
                  <li><span class="text-primary text-medium">3. </span>Sử dụng liên kết để đặt lại mật khẩu của bạn</li>
               </ol>
            </div>
            <form method="post" action="" name="reset" class="card mt-4">
               <div class="card-body">
                  <div class="form-group">
                     <label for="email-for-pass">Nhập địa chỉ email của bạn</label>
                     <input type="email" class="form-control" name="email" placeholder="username@email.com" />
                     <small class="form-text text-muted">Nhập địa chỉ email bạn đã sử dụng trong quá trình đăng ký trên http://ndcake.epizy.com/. Sau đó, chúng tôi sẽ gửi một liên kết đến địa chỉ này qua email.</small>
                  </div>
               </div>
               <div class="card-footer">
                  <button class="btn btn-outline-danger">Quay lại đăng nhập</button>
                  <button class="btn btn-success" value="Reset Password" type="submit">Lấy mật khẩu mới</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
<?php } ?>


<style>
   .forgot {
      background-color: #fff;
      padding: 12px;
      border: 1px solid #dfdfdf;
   }

   .padding-bottom-3x {
      padding-bottom: 72px !important;
   }

   .card-footer {
      background-color: #fff;
   }

   .btn {

      font-size: 13px;
   }

   .form-control:focus {
      color: #495057;
      background-color: #fff;
      border-color: #76b7e9;
      outline: 0;
      box-shadow: 0 0 0 0px #28a745;
   }
</style>