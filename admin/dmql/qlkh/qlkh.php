<?php
$data = "SELECT count(id) as total FROM user_guest";
$result = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['view']) ? $_GET['view'] : 1;
$limit = 10;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;
$data = "SELECT 
    * FROM user_guest 
	LIMIT $start, $limit";
    $result = mysqli_query($conn, $data);
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#listSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myList tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<div class="content_ql">
    <div class="banner">
        <div class="title">
            <p>Hệ thống Client</p>
        </div>
        <img src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="">
    </div>
    <div class="container mt-5">
        <input class="form-control" id="listSearch" type="text" placeholder="Tìm kiếm đơn hàng">
    </div>
    <table>
        
    </table>
    <table class="table table-hover d-flex flex-column justify-content-center align-items-center">
        <thead class="text-center">
            <tr>
                <td>ID khách hàng</td>
                <td>Tên khách hàng</td>
                <td>Username</td>
                <td></td>
            </tr>
        </thead>
        <tbody class="list-group" id="myList">
            <?php
            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $items) :
            ?>
                    <tr>
                        <td>NDCAKE-GUEST-N<?php echo $items['id'] ?></td>
                        <td><?php echo $items['fullname'] ?></td>
                        <td><?php echo $items['username'] ?></td>
                        <td><a href="?module=khdetail&userId=<?php echo $items['id'] ?>">Chi tiết</a></td>
                    </tr>
            <?php
                endforeach;
            } else {
                echo '
                    <tr class="list-group-item">
                        <td>Không có đơn hàng nào !</td>
                    </tr>
                ';
            }
            ?>
        </tbody>
        
    </table>

    <div class="showlistproduct">
        <?php
        if ($current_page > 1 && $total_page > 1) {
            echo '<a href="index_admin.php?module=qldh&view=' . ($current_page - 1) . '"><</a>  ';
        }
        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $current_page) {
                echo '<span>' . $i . '</span>  ';
            } else {
                echo '<a href="index_admin.php?module=qldh&view=' . $i . '">' . $i . '</a>  ';
            }
        }
        if ($current_page < $total_page && $total_page > 1) {
            echo '<a href="index_admin.php?module=qldh&view=' . ($current_page + 1) . '">></a>  ';
        }
        ?>
    </div>
</div>
<style>
    .showlistproduct {
        width: 100%;
        height: auto;
        margin-top: 64px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .showlistproduct a {
        width: 50px;
        color: #ccc;
        margin: 3px;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 10px;
        text-align: center;
        /* font-weight: bold; */
    }

    .showlistproduct a:hover {
        color: #000;
        border: 1px solid black;
    }

    .showlistproduct span {
        width: 50px;
        color: red;
        border: 1px solid red;
        margin: 3px;
        padding: 10px;
        text-align: center;
        border-radius: 10px;
        font-weight: bold;
        box-shadow: 0 0 5px 0 red;
    }
    table tr td 
    ,table tr th {
        border-top: none;
    }
</style>