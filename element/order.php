<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<form method="post">
    <div class="px-4 px-lg-0">
        <div class="pb-5" style="margin-top:200px;">
            <section>
                <div class="container">
                    <div class="row w-100">
                        <div class="col-lg-12 col-md-12 col-12">
                            <h3 class="display-5 mb-2 text-center">Đơn hàng</h3>
                            <p class="mb-5 text-center">
                                <i class="text-info font-weight-bold"><?php echo count($_SESSION['cart']) ?></i> sản phẩm
                            </p>
                            <table id="shoppingCart" class="table table-condensed table-responsive">
                                <thead>
                                    <tr>
                                        <th style="width:40%">Sản phẩm</th>
                                        <th style="width:12%">Giá</th>
                                        <th style="width:10%">Số lượng</th>
                                        <th style="width:10%">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody class="myList">
                                    <?php
                                    if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
                                    ?>
                                        <?php
                                        $ids = "0";
                                        $tongtien = $ship = 0;
                                        foreach (array_keys($_SESSION['cart']) as $key) :
                                            $ids .= "," . $key;
                                        endforeach;
                                        $query = "SELECT * FROM products WHERE products.id in($ids) ";
                                        $result = $conn->query($query);
                                        if (mysqli_num_rows($result) > 0) :
                                            foreach ($result as $items) :
                                        ?>
                                                <tr>
                                                    <td data-th="Product">
                                                        <div class="row">
                                                            <div class="col-md-3 text-left">
                                                                <img src="<?= $items['image'] ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                                            </div>
                                                            <div class="col-md-9 text-left mt-sm-2">
                                                                <h4>Bánh trung thu</h4>
                                                                <p class="font-weight-light">Nhân: <?= $items['fill'] ?></p>
                                                                <p class="font-weight-light">Khối lượng: 150gram</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-th="Price"><?= $items['price'] ?>.000 vnđ</td>
                                                    <td class="row" data-th="Quantity">
                                                        <input onchange="countCost()" readonly type="number" class="form-control form-control-sm text-center" min=1 name="<?= $items['id'] ?>" value="<?= $_SESSION['cart'][$items['id']] ?>">
                                                    </td>
                                                    <td data-th="Quantity">
                                                        <span><?= $items['price'] * $_SESSION['cart'][$items['id']] ?></span><span>.000 <span>VNĐ</s></span>
                                                    </td>
                                                </tr>
                                </tbody>
                                <?php
                                                $tongtien = ($tongtien + ($items['price'] * $_SESSION['cart'][$items['id']]))
                                ?>
                    <?php

                                            endforeach;
                                        endif;
                                    } else {
                                        echo "<tr><th><h2>Giỏ hàng trống</h2></th></tr>";
                                    }
                                    $ship = 20;
                                    $tt = $tongtien + $ship;
                    ?>
                    <tr>
                        <th colspan="3">Tổng tiền</th>
                        <?php if (isset($tongtien)) { ?>
                            <th><strong><span><?php echo $tongtien ?></span>.000 VNĐ</strong></th>
                        <?php } else { ?>
                            <th><span>......</span></th>
                        <?php } ?>
                    </tr>
                    <tfoot>
                        <tr>
                            <th colspan="3">Phí ship</th>
                            <th><span><?php echo $ship ?></span>.000 VNĐ</th>
                        </tr>
                        <tr>
                            <th colspan="3">Số tiền thanh toán</th>
                            <th><strong><span><?php echo $tt ?></span>.000 VNĐ</strong></th>
                        </tr>
                    </tfoot>
                            </table>
                        </div>
                    </div>
            </section>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
                $id_guest = $user['id'];
                $ordermethod = $_POST['httt'];
                $note = $_POST['gopy'];
                $sql = "INSERT INTO orders (id_guest,ordermethod,orderDate,note,status)
            VALUES ('$id_guest','$ordermethod',now(),'$note','Đơn hàng mới ! - Chờ duyệt')";
                $data_prd = mysqli_query($conn, $sql);
                $order = mysqli_fetch_array($conn->query("SELECT id FROM orders ORDER BY id DESC LIMIT 1"));
                $orderid = $order['id'];
                foreach (array_keys($_SESSION['cart']) as $id) {
                    $quantity = $_SESSION['cart'][$id];
                    $product = mysqli_fetch_array($conn->query("SELECT products.price FROM products WHERE id = $id"));
                    $price = $product['price'];
                    $conn->query("INSERT INTO ordersdetail VALUES ('$orderid','$id','$quantity','$price')");
                }
                unset($_SESSION['cart']);
                $query = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
                $result = $conn->query($query);
                foreach ($result as $idOder) {
                    echo '<script language="javascript">window.location="?page=ordersucces";</script>';
                }
            }
            $conn->close();
            ?>
            <div class="container">
                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-6">
                        <!-- <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Mã giảm giá</div>
            <div class="p-4">
                <p class="font-italic mb-4">Nếu bạn đang có mã khuyến mãi, hãy nhập vào ô dưới để được giảm giá</p>
                <div class="input-group mb-4 border rounded-pill p-2">
                    <input type="text" placeholder="nhập mã" aria-describedby="button-addon3" class="form-control border-0">
                    <div class="input-group-append border-0">
                        <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Áp dụng</button>
                    </div>
                </div>
            </div> -->
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">GHI CHÚ CHO NGƯỜI BÁN</div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Nếu bạn có một số thông tin cho người bán, bạn có thể để lại trong hộp bên dưới</p>
                            <textarea name="gopy" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Hình thức thanh toán</div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Bạn vui lòng chọn hình thức thanh toán</p>
                            <select class="form-control" name="httt" id="" required>
                                <option value="" disabled selected>Hình thức thanh toán</option>
                                <!-- <option value="" disabled>Thanh toán qua tài khoản ngân hàng</option> -->
                                <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Thông tin người nhận </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Bạn vui lòng xem lại thông tin</p>
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
                            </ul>
                            <!-- <a href="#" onclick="alert('Chức năng đang bảo trì !!!')" class="btn btn-dark btn-sm rounded-pill py-2 btn-block">Cập nhật lại thông tin</a> -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger rounded-pill py-2 btn-block">Đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>