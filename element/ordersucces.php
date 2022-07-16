<?php 
    $idOrder = $_GET['orderid'];
?>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
<style>
    @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
</style>
<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="px-4 px-lg-0">
    <div class="pb-5" style="margin-top:150px;">
        <div class="jumbotron text-center " style="margin-top:150px;">
            <h1 class="display-3">ĐẶT HÀNG THÀNH CÔNG !!!</h1>
            <p class="lead"><strong>Cảm ơn quý khách đã đặt hàng bên NDCAKE ❤❤❤ </strong>Thank you customers for ordering from NDCAKE.</p>
            <hr>
            <p>
                Nếu bạn đang có những ý kiến đóng góp ! <a href="">Xin hãy góp ý với chúng tôi</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="?page=home" role="button">Quay lại trang chủ</a>
            </p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5 bg-white rounded shadow-sm ">
                    <section class="vh-100">
                        <div class="container h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col">
                                    <p class="text-center"><span class="h2">Đơn hàng</span>
                                    <div class="card mb-4 ">
                                        <div class="card-body p-4">
                                        <?php 
                                            $tong = 0;
                                            $query = "SELECT products.image,products.name,products.fill,products.price,ordersdetail.quantity FROM ordersdetail 
                                            INNER JOIN products ON ordersdetail.id_prd = products.id
                                            INNER JOIN orders ON orders.id = ordersdetail.orderid
                                            WHERE orders.id = {$idOrder}
                                            ";
                                            $result = $conn->query($query);
                                            if (mysqli_num_rows($result) > 0) {
                                                foreach ($result as $items) {
                                        ?>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-2">
                                                    <img src="<?php echo $items['image'] ?>" class="img-fluid" alt="Generic placeholder image">
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-4 pb-2"><?php echo $items['name'] ?></p>
                                                        <p class="lead fw-normal mb-0"><?php echo $items['fill'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-4 pb-2">Khối lượng</p>
                                                        <p class="lead fw-normal mb-0"><i class="fa-solid fa-weight-hanging"></i>
                                                            150gr</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-4 pb-2">Số lượng</p>
                                                        <p class="lead fw-normal mb-0"><?php echo $items['quantity'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-4 pb-2">Price</p>
                                                        <p class="lead fw-normal mb-0"><?php echo $items['price'] ?>.000 VNĐ</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-4 pb-2">Tổng tiền</p>
                                                        <p class="lead fw-normal mb-0"><?php echo ($items['price'] * $items['quantity'])?>.000 VNĐ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                            $tong = ($tong + ($items['price'] * $items['quantity']));
                                                }
                                            }
                                        ?>
                                        <div class="col-md-6 d-flex justify-content-center">
                                            <div>
                                                <p class=" text-muted mb-1 pb-2">Tổng tiền thanh toán</p>
                                                <p class="lead fw-normal mb-0"><?php echo  $tong?>.000 VNĐ</p>
                                            </div>
                                            <div style="margin-left:100px ;">
                                                <p class=" text-muted mb-1 pb-2">Bạn có thể theo dõi đơn hàng</p>
                                                <a href="?page=myorder">Tại đây</a>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $query = "SELECT orders.id,orders.ordermethod,orders.orderDate 
                            FROM orders INNER JOIN user_guest ON orders.id_guest = user_guest.id 
                            WHERE orders.id = {$idOrder}
                            ";
                            $result = $conn->query($query);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $items) {
                        ?>
                        <div class="col-lg-12">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Thông tin khác </div>
                            <div class="p-4">
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Mã đơn hàng: <strong>NDCAKE-DHBTT-N<?php echo $items['id']?></strong></span></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><span span class="text-muted">Hình thức thanh toán: <strong><?php echo $items['ordermethod'] ?></strong></span></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Thời gian đặt hàng: <strong><?php echo $items['orderDate'] ?></strong></span></li>
                            </div>
                        </div>
                        <?php 
                                }
                            }
                        ?>         
                    </section>
                </div>
            </div>
            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Thông tin người gửi </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted"><strong>Shop Bánh trung thu NDCAKE</strong></span></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Address: <strong>Hoàng Quốc Việt - Phường Nghĩa Đô - Quận Cầu Giấy - Thành phố Hà Nội </strong></span></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Phone: <strong>082 3565 831</strong></span></li>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Thông tin người nhận </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                            <?php
                            $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
                            ?>
                            <?php if (isset($user['username'])) { ?>
                                <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Họ tên: <strong><?php echo $user['fullname'] ?></strong></span></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Địa chỉ giao hàng: <strong><?php echo $user['address'] ?></strong></span></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Số điện thoại: <strong><?php echo $user['phone'] ?></strong></span></li>
                            <?php } else { ?>
                                <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Họ tên: <strong>...</strong></span></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Địa chỉ giao hàng: <strong>...</strong></span></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><span class="text-muted">Số điện thoại: <strong>...</strong></span></li>
                            <?php } ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Thông tin thanh toán</div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                        <?php 
                            $ship = 20;
                            $tt = $tong + $ship;
                        ?>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tổng tiền đơn hàng: </strong><strong><?php echo  $tong?>.000 VNĐ</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Phí ship: </strong><strong>20.000 VNĐ</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Giảm giá: </strong><strong>0 VNĐ</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Thành tiền</strong>
                                <h5 class="font-weight-bold"><?php echo $tt?>.000 VNĐ</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include "sendmail/PHPMailer-master/src/PHPMailer.php";
    include "sendmail/PHPMailer-master/src/Exception.php";
    include "sendmail/PHPMailer-master/src/OAuth.php";
    include "sendmail/PHPMailer-master/src/POP3.php";
    include "sendmail/PHPMailer-master/src/SMTP.php";
     
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ndcake.store@gmail.com';           // SMTP username
    $mail->Password = 'mswwgrjitnohamff';                 // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('ndcake.store@gmail.com', 'NDCAKE STORE');

    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
    if (isset($user['username'])) { 
            $mail->addAddress(
            $user['email'],$user['fullname']
            );  
    }
    // Add a recipient
    //Content
    $mail->isHTML(true);     
    $mail->AddReplyTo('ndcake.store@gmail.com', 'NDCAKE STORE');                             // Set email format to HTML
    $mail->Subject = 'NDCAKE Store - Purchase order';
    $query = "SELECT 
        orders.id,orders.ordermethod,orders.orderDate
        FROM orders
        WHERE orders.id = {$idOrder}
    ";
    $result = $conn->query($query);
    if (mysqli_num_rows($result) > 0) :
        foreach ($result as $items) :
        $mail->Body = '
        <h1>Cảm ơn quý khách đã đặt hàng ❤❤❤</h1>
        <p>Chúng tôi xin được gửi 1 số thông tin của đơn hàng</p>
        <div>
            <div>
                <ul>
                    <li>Mã đơn hàng: <strong>NDCAKE-DHBTT-N'. $items['id'] .'</strong></span></li>
                    <li><span span class="text-muted">Hình thức thanh toán: <strong>'.$items['ordermethod'] .'</strong></span></li>
                    <li><span class="text-muted">Thời gian đặt hàng: <strong>'. $items['orderDate'] .'</strong></span></li>
                </ul>
            </div>
        </div>
        <p>Để xem chi tiết đơn hàng, quý khách vui lòng click vào link sau : https://www.youtube.com/watch?v=-lg7fOU8Hro</p>
        ';
        endforeach;
    endif;
    $mail->send();
    echo 'Chúc bạn một ngày tốt lành !';
} catch (Exception $e) {
    echo 'Cảm ơn quý khách !', $mail->ErrorInfo;
}
?>

