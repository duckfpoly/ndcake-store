<?php 
    $iduser = $_GET['id'];
    $sql = "SELECT 
    orders.id,user_guest.fullname,orders.orderDate,orders.received_date,orders.status
    FROM orders,user_guest
    WHERE orders.id_guest = {$iduser}
    ";  
    $result = mysqli_query($conn,$sql);
?>
<style>
	@import url('styles/categories_style.css');
	@import url('styles/categories_responsive.css');
</style>
<div class="wrapper" style="width:90%;margin:0px auto;">
    <div class="breadcrumbs d-flex flex-row align-items-center mb-5" style="margin:0px auto;margin-top:150px;">
        <ul>
            <li><a href="?page=home">Trang chủ</a></li>
            <li class="active"><a href="?page=myorder"><i class="fa fa-angle-right" aria-hidden="true"></i>Đơn mua</a></li>
        </ul>
    </div>
    <h2 class="text-center mb-5">ĐƠN MUA</h2>
        <table border="1" class="table table-hover text-center">
            <thead class="text-center">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Ngày nhận</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($result as $items): ?>
                <tr onclick="location.href='?page=myordetail&orderId=<?php echo $items['id'] ?>'">
                    <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                    <td><?php echo $items['orderDate'] ?></td>
                    <td><?php echo $items['received_date'] ?></td>
                    <td><?php echo $items['status'] ?></td>
                    <td><a href="?page=myordetail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>