<?php
$data = "SELECT 
        orders.id,user_guest.fullname,orders.orderDate,orders.status,orders.received_date
        FROM orders,user_guest
        WHERE orders.id_guest = user_guest.id
    ";
$result = mysqli_query($conn, $data);
?>
<table id="example" class="table table-striped" style="width:100%;padding:50px;">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày đặt</th>
            <th>Trạng thái </th>
            <th>Xem chi tiết</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $items) :
        ?>
                <tr>
                    <td>NDCAKE-DHBTT-N<?php echo $items['id'] ?></td>
                    <td><?php echo $items['fullname'] ?></td>
                    <td><?php echo $items['orderDate'] ?></td>
                    <td><?php echo $items['status'] ?></td>
                    <td><a href="?module=detail&orderId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                </tr>
        <?php
            endforeach;
        } else {
            echo '
                <tr>
                    <td>Không có đơn hàng nào !</td>
                </tr>
            ';
        }
        ?>

    </tbody>
</table>
