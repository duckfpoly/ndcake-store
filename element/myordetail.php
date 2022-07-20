<?php
    if(isset($user['id'])){
        $id_user = $user['id'];
        $idDh = $_GET['orderId'];
        $sql = "SELECT 
            orders.id,
            user_guest.fullname,
            user_guest.phone,
            user_guest.address,
            orders.orderDate,
            orders.status,
            orders.received_date
            FROM orders
            INNER JOIN user_guest ON orders.id_guest = user_guest.id
            WHERE orders.id = $idDh
            AND user_guest.id = $id_user
            ";
    $result = mysqli_query($conn, $sql);
?>
<style>
	@import url('styles/categories_style.css');
	@import url('styles/categories_responsive.css');
</style>
<div class="breadcrumbs d-flex flex-row align-items-center" style="width:90%;margin:0px auto;margin-top:150px;">
    <ul>
        <li><a href="?">Trang chủ </a> </li>
        <li><a href="?page=myorder"><i class="fa fa-angle-right" aria-hidden="true"></i> Đơn mua</a></li>
        <li class="active"><a href="?page=myordetail"><i class="fa fa-angle-right" aria-hidden="true"></i>Chi tiết đơn mua</a></li>
    </ul>
</div>
<h2 class="text-center mt-5 mb-5">CHI TIẾT ĐƠN MUA</h2>
<div class="wrapper">
    <article class="card">
        <header class="card-header"> Đơn hàng </header>
        <div class="card-body">
            <?php foreach ($result as $items) : ?>
                <h6>Mã đơn hàng: <strong>NDCAKE-DHBTT-N<?php echo $items['id'] ?></strong></h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col-md-2"> <strong>Thời gian đặt hàng:</strong> <br><br><?php echo $items['orderDate'] ?></div>
                        <div class="col-md-2"> <strong>Thời gian đã nhận được hàng:</strong> <br><br><?php echo $items['received_date'] ?></div>
                        <div class="col-md-2"> <strong>Người nhận hàng:</strong> <br><br><?php echo $items['fullname'] ?>
                            <br>
                            <i class="fa fa-phone mt-3"></i>&emsp;<?php echo $items['phone'] ?>
                        </div>
                        <div class="col-md-2"> <strong>Địa chỉ giao hàng:</strong><br> <br><?php echo $items['address'] ?></div>
                        <div class="col-md-2"> <strong>Trạng thái:</strong> <br> <br>
                            <label for="" class="form-control">
                                <?php echo $items['status'] ?>
                            </label>
                        </div>
                        <div class="col-md-2 text-center">
                            <br>
                            <br>
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (isset($_POST["success"])) {
                                    $sql = "UPDATE orders SET status = 'Đã nhận được hàng', received_date = now() WHERE id = {$idDh}";
                                    $query = mysqli_query($conn, $sql);
                                    if ($query) {
                                        echo '<script language="javascript">window.location="?page=myordetail";</script>';
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                } elseif (isset($_POST["destroy"])) {
                                    $sql = "UPDATE orders SET status = 'Đơn hàng bị hủy', destroyDate = now() WHERE id = {$idDh}";
                                    $query = mysqli_query($conn, $sql);
                                    if ($query) {
                                        echo '<script language="javascript">window.location="?page=myordetail";</script>';
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                }
                            }
                            ?>
                            <form method="post">
                                <?php
                                $sql = "SELECT orders.status FROM orders WHERE id = {$idDh}";
                                $query = mysqli_query($conn, $sql);
                                ?>
                                <?php foreach ($result as $tracking) :
                                    if ($tracking['status'] == 'Đơn hàng mới ! - Chờ duyệt') {
                                        echo '
                                    <button type="submit" name="destroy" class="btn btn-outline-danger" style="margin-left: 5px;">Hủy đơn hàng</button>
                            ';
                                    }
                                    if ($tracking['status'] == 'Đang giao') {
                                        echo '
                                    <button type="button" name="success" class="btn btn-outline-success" style="margin-left: 5px;">Đã nhận được hàng</button>
                            ';
                                    }
                                    if ($tracking['status'] == 'Đơn hàng bị hủy bởi admin') {
                                        echo '
                                    <button disabled class="btn btn-outline-danger" style="margin-left: 5px;">Đơn hàng bị hủy</button>
                            ';
                                    }
                                endforeach;
                                ?>
                            </form>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
            <?php
            $sql = "SELECT orders.status FROM orders WHERE id = {$idDh}";
            $query = mysqli_query($conn, $sql);
            ?>
            <?php foreach ($result as $tracking) :
                if ($tracking['status'] == 'Đơn hàng mới ! - Chờ duyệt') {
                    echo '
                        <div class="track" style="background-color:yellowgreen;">
                            <div class="step active"> <span class="icon" style="background-color:yellowgreen; color:#fff;"> <i class="fa fa-clock-o" ></i> </span> <span class="text">Chờ duyệt</span> </div>
                        </div>
                    ';
                }
                if ($tracking['status'] == 'Đang chuẩn bị đơn hàng') {
                    echo '
                        <div class="track" style="background-color:#00DD00;">
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Đã duyệt</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text"></span>Đang chuẩn bị đơn hàng</div>
                        </div>
                    ';
                }
                if ($tracking['status'] == 'Lấy hàng thành công') {
                    echo '
                        <div class="track" style="background-color:#00DD00;">
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Đã duyệt</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text"></span>Đã chuẩn bị đơn hàng</div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Lấy hàng thành công</span> </div>
                        </div>
                    ';
                }
                if ($tracking['status'] == 'Đang giao') {
                    echo '
                        <div class="track" style="background-color:#00DD00;">
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Đã duyệt</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text"></span>Đang chuẩn bị đơn hàng</div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Lấy hàng thành công</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Đang giao</span> </div>
                        </div>
                    ';
                }
                if ($tracking['status'] == 'Giao hàng thành công') {
                    echo '
                    <div class="track" style="background-color:#00DD00;">
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Đã duyệt</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text"></span>Đang chuẩn bị đơn hàng</div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Lấy hàng thành công</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Đang giao</span> </div>
                    </div>
                    ';
                }
                if ($tracking['status'] == 'Đã nhận được hàng') {
                    echo '
                    <div class="track" style="background-color:#00DD00;">
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Đã duyệt</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"></span>Đã xử lý - Tiếp nhận đơn hàng </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text"></span>Đang chuẩn bị đơn hàng</div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Đang giao</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-warning"></i> </span> <span class="text">Đã nhận được hàng</span> </div>
                    </div>
                    ';
                }
                if ($tracking['status'] == 'Đơn hàng bị hủy bởi admin') {
                    echo '
                    <div class="track" style="background-color:red;">
                        <div class="step active"> <span class="icon" style="background-color:red;"> <i class="fa fa-warning" ></i> </span> <span class="text">Đơn hàng bị hủy bởi admin do thông tin không hợp lệ !!!</span> </div>
                    </div>
                    
                        ';
                }
            endforeach;
            ?>
            <hr>
            <ul class="row">
                <?php
                $tongtien = 0;
                $ship = 20;
                if (isset($idDh)) {
                    $sql = "SELECT 
                    products.image,
                    products.name,
                    products.price,
                    ordersdetail.quantity,
                    ordersdetail.price
                    FROM orders,ordersdetail,products
                    WHERE orders.id = $idDh
                    AND orders.id = ordersdetail.orderid
                    AND ordersdetail.id_prd = products.id
                    AND orders.id_guest = $id_user
                    ";
                    $result = mysqli_query($conn, $sql);
                }
                ?>
                <?php foreach ($result as $data) :
                ?>
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="<?php echo $data['image'] ?>" class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class="title"> <strong><?php echo $data['name'] ?></strong><br> Số lượng: <?php echo $data['quantity'] ?> cái</p> <span class="text-muted">Thành tiền: <?php echo $data['quantity'] * $data['price'] ?>.000 VNĐ </span>
                            </figcaption>
                        </figure>
                    </li>
                <?php
                    $tongtien = ($tongtien + ($data['quantity'] * $data['price']));
                    $tt = $tongtien + $ship;
                endforeach;
                ?>
            </ul>
            <hr>
            <div class="row-md-12">
                <?php if (isset($tt)) { ?>
                    <p>Phí ship: <?php echo $ship ?>.000 VNĐ</p>
                <?php } ?>
            </div>
            <hr>
            <div class="row-md-12 text-center">
                <?php if (isset($tt)) { ?>
                    <h3>Tổng tiền: <?php echo $tt ?>.000 VNĐ</h3>
                <?php } ?>
            </div>
        </div>
    </article>
</div>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    .wrapper {
        width: 90%;
        margin: 0px auto;
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem;
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px;
    }

    @media (max-width:640px) {
        .track {
            margin-bottom: 140px;
        }
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        /* background-color: #00DD00; */
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #00DD00;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: red;
        color: #fff;
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: #ee5435;
        border-color: #ee5435;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }
</style>
<?php } 
    else {

    }
?>