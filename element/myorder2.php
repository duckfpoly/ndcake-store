<?php
include('connectdb.php');
?>
    <style>
        @import url('styles/categories_style.css');
        @import url('styles/categories_responsive.css');
        #content-nav-tab {
            width: 100%;
            height: 60px;
            overflow: auto;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="wrapper" style="width:90%;margin:0px auto;">
        <div class="breadcrumbs d-flex flex-row align-items-center mb-5" style="margin:0px auto;margin-top:150px;">
            <ul>
                <li><a href="?page=home">Trang chủ</a></li>
                <li class="active"><a href="?page=myorder"><i class="fa fa-angle-right" aria-hidden="true"></i>Đơn mua</a></li>
            </ul>
        </div>
        <section>
            <h2 class="text-center mb-5">ĐƠN MUA</h2>
            <nav>
                <div class="nav d-flex flex-column" id="content-nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-value-tab" data-toggle="tab" href="#nav-value" role="tab" aria-controls="nav-value" aria-selected="true">Tất cả đơn hàng</a>
                    <a class="nav-link " id="nav-value1-tab" data-toggle="tab" href="#nav-value1" role="tab" aria-controls="nav-value1" aria-selected="false">Chờ lấy hàng</a>
                    <a class="nav-link" id="nav-value2-tab" data-toggle="tab" href="#nav-value2" role="tab" aria-controls="nav-value2" aria-selected="false">Đang chuẩn bị đơn hàng</a>
                    <a class="nav-link" id="nav-value3-tab" data-toggle="tab" href="#nav-value3" role="tab" aria-controls="nav-value3" aria-selected="false">Đã chuyển hàng cho ship</a>
                    <a class="nav-link" id="nav-value4-tab" data-toggle="tab" href="#nav-value4" role="tab" aria-controls="nav-value4" aria-selected="false">Đang giao</a>
                    <a class="nav-link" id="nav-value5-tab" data-toggle="tab" href="#nav-value5" role="tab" aria-controls="nav-value5" aria-selected="false">Đã nhận hàng</a>
                    <a class="nav-link" id="nav-value6-tab" data-toggle="tab" href="#nav-value6" role="tab" aria-controls="nav-value6" aria-selected="false">Đơn hàng hủy bởi bạn</a>
                    <a class="nav-link" id="nav-value7-tab" data-toggle="tab" href="#nav-value7" role="tab" aria-controls="nav-value7" aria-selected="false">Đơn hàng hủy bởi admin</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active table-responsive" id="nav-value" role="tabpanel" aria-labelledby="nav-value-tab">
                    <?php
                    $sql = "SELECT 
                            orders.id,user_guest.fullname,orders.orderDate,orders.received_date,orders.destroyDate,orders.status
                            FROM orders
                            INNER JOIN user_guest ON orders.id_guest = user_guest.id";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <table border="1" class=" table text-center mt-5">
                        <thead class="text-center">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th>Thời gian hủy đơn</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_fetch_array($result)) {
                                foreach ($result as $items) :
                            ?>
                                    <tr onclick="location.href='?page=myordetail&orderId=<?php echo $items['id'] ?>'">
                                        <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                                        <td><?php echo $items['orderDate'] ?></td>
                                        <td><?php echo $items['received_date'] ?></td>
                                        <td><?php echo $items['destroyDate'] ?></td>
                                        <td><?php echo $items['status'] ?></td>
                                        <td ><a href="?page=myordetail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">Chưa có đơn hàng nào của bạn !</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-value1" role="tabpanel" aria-labelledby="nav-value1-tab">
                    <?php
                    $sql = "SELECT 
                            orders.id,user_guest.fullname,orders.orderDate,orders.received_date,orders.destroyDate,orders.status
                            FROM orders
                            INNER JOIN user_guest ON orders.id_guest = user_guest.id 
                            WHERE orders.status = 'Đơn hàng mới ! - Chờ duyệt'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <table border="1" class="table table-hover text-center mt-5">
                        <thead class="text-center">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th>Thời gian hủy đơn</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_fetch_array($result)) {
                                foreach ($result as $items) :
                            ?>
                                    <tr onclick="location.href='?page=myordetail&orderId=<?php echo $items['id'] ?>'">
                                        <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                                        <td><?php echo $items['orderDate'] ?></td>
                                        <td><?php echo $items['received_date'] ?></td>
                                        <td><?php echo $items['destroyDate'] ?></td>
                                        <td><?php echo $items['status'] ?></td>
                                        <td><a href="?page=myordetail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">Chưa có đơn hàng nào của bạn !</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-value2" role="tabpanel" aria-labelledby="nav-value2-tab">
                    <?php
                    $sql = "SELECT 
                            orders.id,user_guest.fullname,orders.orderDate,orders.received_date,orders.destroyDate,orders.status
                            FROM orders
                            INNER JOIN user_guest ON orders.id_guest = user_guest.id 
                            WHERE orders.status = 'Đang chuẩn bị đơn hàng'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <table border="1" class="table table-hover text-center mt-5">
                        <thead class="text-center">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th>Thời gian hủy đơn</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_fetch_array($result)) {
                                foreach ($result as $items) :
                            ?>
                                    <tr onclick="location.href='?page=myordetail&orderId=<?php echo $items['id'] ?>'">
                                        <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                                        <td><?php echo $items['orderDate'] ?></td>
                                        <td><?php echo $items['received_date'] ?></td>
                                        <td><?php echo $items['destroyDate'] ?></td>
                                        <td><?php echo $items['status'] ?></td>
                                        <td><a href="?page=myordetail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">Chưa có đơn hàng nào của bạn !</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-value3" role="tabpanel" aria-labelledby="nav-value3-tab">
                    <?php
                    $sql = "SELECT 
                            orders.id,user_guest.fullname,orders.orderDate,orders.received_date,orders.destroyDate,orders.status
                            FROM orders
                            INNER JOIN user_guest ON orders.id_guest = user_guest.id 
                            WHERE orders.status = 'Lấy hàng thành công'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <table border="1" class="table table-hover text-center mt-5">
                        <thead class="text-center">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th>Thời gian hủy đơn</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_fetch_array($result)) {
                                foreach ($result as $items) :
                            ?>
                                    <tr onclick="location.href='?page=myordetail&orderId=<?php echo $items['id'] ?>'">
                                        <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                                        <td><?php echo $items['orderDate'] ?></td>
                                        <td><?php echo $items['received_date'] ?></td>
                                        <td><?php echo $items['destroyDate'] ?></td>
                                        <td><?php echo $items['status'] ?></td>
                                        <td><a href="?page=myordetail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">Chưa có đơn hàng nào của bạn !</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-value4" role="tabpanel" aria-labelledby="nav-value4-tab">
                    <?php
                    $sql = "SELECT 
                            orders.id,user_guest.fullname,orders.orderDate,orders.received_date,orders.destroyDate,orders.status
                            FROM orders
                            INNER JOIN user_guest ON orders.id_guest = user_guest.id 
                            WHERE orders.status = 'Đang giao'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <table border="1" class="table table-hover text-center mt-5">
                        <thead class="text-center">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th>Thời gian hủy đơn</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_fetch_array($result)) {
                                foreach ($result as $items) :
                            ?>
                                    <tr onclick="location.href='?page=myordetail&orderId=<?php echo $items['id'] ?>'">
                                        <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                                        <td><?php echo $items['orderDate'] ?></td>
                                        <td><?php echo $items['received_date'] ?></td>
                                        <td><?php echo $items['destroyDate'] ?></td>
                                        <td><?php echo $items['status'] ?></td>
                                        <td><a href="?page=myordetail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">Chưa có đơn hàng nào của bạn !</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-value5" role="tabpanel" aria-labelledby="nav-value5-tab">
                    <?php
                    $sql = "SELECT 
                            orders.id,user_guest.fullname,orders.orderDate,orders.received_date,orders.destroyDate,orders.status
                            FROM orders
                            INNER JOIN user_guest ON orders.id_guest = user_guest.id 
                            WHERE orders.status = 'Đã nhận được hàng'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <table border="1" class="table table-hover text-center mt-5">
                        <thead class="text-center">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th>Thời gian hủy đơn</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_fetch_array($result)) {
                                foreach ($result as $items) :
                            ?>
                                    <tr onclick="location.href='?page=myordetail&orderId=<?php echo $items['id'] ?>'">
                                        <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                                        <td><?php echo $items['orderDate'] ?></td>
                                        <td><?php echo $items['received_date'] ?></td>
                                        <td><?php echo $items['destroyDate'] ?></td>
                                        <td><?php echo $items['status'] ?></td>
                                        <td><a href="?page=myordetail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">Chưa có đơn hàng nào của bạn !</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-value6" role="tabpanel" aria-labelledby="nav-value6-tab">
                    <?php
                    $sql = "SELECT 
                            orders.id,user_guest.fullname,orders.orderDate,orders.received_date,orders.destroyDate,orders.status
                            FROM orders
                            INNER JOIN user_guest ON orders.id_guest = user_guest.id 
                            WHERE orders.status = 'Đơn hàng bị hủy'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <table border="1" class="table table-hover text-center mt-5">
                        <thead class="text-center">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th>Thời gian hủy đơn</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_fetch_array($result)) {
                                foreach ($result as $items) :
                            ?>
                                    <tr onclick="location.href='?page=myordetail&orderId=<?php echo $items['id'] ?>'">
                                        <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                                        <td><?php echo $items['orderDate'] ?></td>
                                        <td><?php echo $items['received_date'] ?></td>
                                        <td><?php echo $items['destroyDate'] ?></td>
                                        <td><?php echo $items['status'] ?></td>
                                        <td><a href="?page=myordetail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">Chưa có đơn hàng nào của bạn !</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-value7" role="tabpanel" aria-labelledby="nav-value7-tab">
                    <?php
                    $sql = "SELECT 
                            orders.id,user_guest.fullname,orders.orderDate,orders.received_date,orders.destroyDate,orders.status
                            FROM orders
                            INNER JOIN user_guest ON orders.id_guest = user_guest.id 
                            WHERE orders.status = 'Đơn hàng bị hủy bởi admin'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <table border="1" class="table table-hover text-center mt-5">
                        <thead class="text-center">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th>Thời gian hủy đơn</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_fetch_array($result)) {
                                foreach ($result as $items) :
                            ?>
                                    <tr onclick="location.href='?page=myordetail&orderId=<?php echo $items['id'] ?>'">
                                        <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                                        <td><?php echo $items['orderDate'] ?></td>
                                        <td><?php echo $items['received_date'] ?></td>
                                        <td><?php echo $items['destroyDate'] ?></td>
                                        <td><?php echo $items['status'] ?></td>
                                        <td><a href="?page=myordetail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">Chưa có đơn hàng nào của bạn !</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
