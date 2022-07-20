<?php 
    $orderId = $_GET['orderId'];
    if(isset($orderId)){
        $sql = "SELECT 
        orders.id,
        user_guest.fullname,
        user_guest.phone,
        user_guest.address,
        orders.orderDate,
        orders.status,
        orders.note
        FROM orders,user_guest
        WHERE orders.id = $orderId
        AND orders.id_guest = user_guest.id
        ";  
        $result = mysqli_query($conn,$sql);
    }
?>
<div class="container">
    <article class="card">
        <header class="card-header"> Đơn hàng </header>
        <div class="card-body">
            <?php foreach($result as $items): ?>
            <h6>Mã đơn hàng: <strong>NDCAKE-DHBTT-N<?php echo $items['id'] ?></strong></h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Thời gian đặt hàng:</strong> <br><br><?php echo $items['orderDate'] ?></div>
                    <div class="col"> <strong>Người nhận hàng:</strong> <br><br><?php echo $items['fullname'] ?>
                    <br>
                    <i class="fa fa-phone mt-3"></i>&emsp;<?php echo $items['phone'] ?></div>
                    <div class="col"> <strong>Địa chỉ giao hàng:</strong><br> <br><?php echo $items['address'] ?></div>
                    <div class="col"> <strong>Trạng thái:</strong> <br> <br>
                    <?php 
                        $status = "";
                        $orderId = $_GET['orderId'];
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(isset($_POST['status'])){
                            $status = $_POST['status'];
                        }
                        $sql = "UPDATE orders SET status = '{$status}' WHERE id = {$orderId}";
                        $query = mysqli_query($conn,$sql);
                        if ($query) {
                            echo '<script language="javascript">window.location="index_admin.php?module=orderDetail&orderId='. $orderId.'";</script>';
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                    ?>
                    <form method="post">
                        <?php if($items['status'] == 'Đơn hàng bị hủy' || $items['status'] == 'Đã nhận được hàng') { ?>
                        <?php 
                            echo '
                            <input class ="form-control" type="text" readonly value="'.$items['status'].'">
                            </div>
                            <div class="col text-center">
                                <br>
                                <br>
                                <button disabled type="submit" class="btn btn-outline-danger" style="margin-left: 5px;">Không thể đổi trạng thái</button>
                            </div>
                        ';
                        }
                        else {
                            echo'
                            <select class="form-control" name="status" id="">
                            <optgroup>
                                <option value="'.$items['status'].'">'.$items['status'].'</option>
                            </optgroup>
                            <optgroup>
                                <option value="Đơn hàng mới ! - Chờ duyệt">Đơn hàng mới ! - Chờ duyệt</option>
                                <option value="Đang chuẩn bị đơn hàng">Đang chuẩn bị đơn hàng</option>
                                <option value="Lấy hàng thành công">Lấy hàng thành công</option>
                                <option value="Đang giao">Đang giao</option>
                                <option value="Đơn hàng bị hủy bởi admin">Đơn hàng bị hủy bởi admin</option>
                            </optgroup>
                        </select>
                        </div>
                            <div class="col text-center">
                                <br>
                                <br>
                                <button type="submit" class="btn btn-outline-danger" style="margin-left: 5px;">Đổi trạng thái</button>
                            </div>
                            ';
                        }
                        ?>
                </form>
                </div>
            </article>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Khách ghi chú đơn hàng:</strong> <br><br><?php echo $items['note'] ?></div>
                </div>
            </article>
            <?php endforeach; ?>
            <hr>
            <ul class="row">
            <?php 
                $orderId = $_GET['orderId'];
                if(isset($orderId)){
                    $sql = "SELECT 
                    products.image,
                    products.name,
                    products.price,
                    ordersdetail.quantity,
                    ordersdetail.price
                    FROM orders,ordersdetail,products
                    WHERE orders.id = $orderId
                    AND orders.id = ordersdetail.orderid
                    AND ordersdetail.id_prd = products.id
                    ";  
                    $result = mysqli_query($conn,$sql);
                }
            ?>
            <?php foreach($result as $data): ?>
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="<?php echo $data['image'] ?>" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title"> <strong><?php echo $data['name'] ?></strong><br> Số lượng: <?php echo $data['quantity'] ?> cái</p> <span class="text-muted">Thành tiền: <?php echo ($data['price']*$data['quantity']) ?>.000 VNĐ </span>
                        </figcaption>
                    </figure>
                </li>
            <?php endforeach; ?>
            </ul>
            <hr>
            <a href="?module=qldh" class="btn btn-outline-dark" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>  
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    }

    .container {
        margin-top: 50px;
        margin-bottom: 50px
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
        border-radius: 0.10rem
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
        margin-top: 50px
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
        background: #FF5722
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
        background: #ee5435;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
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
        color: #212529
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