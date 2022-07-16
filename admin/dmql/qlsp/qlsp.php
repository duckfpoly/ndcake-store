<?php
    $conn = mysqli_connect('localhost', 'root', '', 'storemooncake');
    $data = "SELECT count(id) as total FROM products";
    $result = mysqli_query($conn, $data);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;
    $result = mysqli_query($conn, "SELECT products.id,products.image,products.name,products.fill
    FROM products
    LIMIT $start, $limit");

?> 
<div class="content_ql">
    <div class="banner">
        <div class="title">
            <p>Quản lý Sản phẩm</p>
        </div>
        <img src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="">
    </div>
    <div class="filterandaddproduct">
        <div class="filter">
            <input class="form-control" type="text" placeholder="Tìm kiếm ...">
        </div>
        <a class="cta" href="index_admin.php?module=addproduct">
            <span>Thêm sản phẩm</span>
        </a>
    </div>
    <?php 
        $code = "SELECT count(*) as total FROM products";
        $result2 = mysqli_query($conn, $code);
        $row_num = mysqli_fetch_assoc($result2);
        $total_number = $row_num['total'];
    ?>
    <div class="showlistcategory">
        <table class="text-center" border="1" style="margin-bottom:100px;" id="myTable">
            <tbody>
                <tr>
                    <th>Tổng số sản phẩm</th>
                    <th><?php echo $total_number ?></th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="showlistcategory">
        <p>Danh sách sản phẩm</p>
        <table border="1">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Ảnh</td>
                    <td>Tên</td>
                    <td>Nhân</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>

                        <td><img src="<?php echo $row['image'] ?>" alt=""></td>

                        <td><?php echo $row['name'] ?></td>

                        <td><?php echo $row['fill'] ?></td>

                        <td>
                            <button onclick="location.href='?module=fixproduct&idprd=<?php echo $row['id'] ?>';"><i class="fa-solid fa-wrench"></i></button> -
                            <button onclick="location.href='?module=delproduct&idprd=<?php echo $row['id'] ?>';"><i class="fa-solid fa-trash"></i></button>
        
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="showlistproduct">
        <?php
        if ($current_page > 1 && $total_page > 1) {
            echo '<a href="index_admin.php?module=qlsp&page=' . ($current_page - 1) . '"><</a>  ';
        }
        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $current_page) {
                echo '<span>' . $i . '</span>  ';
            } else {
                echo '<a href="index_admin.php?module=qlsp&page=' . $i . '">' . $i . '</a>  ';
            }
        }
        if ($current_page < $total_page && $total_page > 1) {
            echo '<a href="index_admin.php?module=qlsp&page=' . ($current_page + 1) . '">></a>  ';
        }
        ?>
    </div>
</div>
<style> 
	.showlistproduct {
		width: 100%;
		height: auto;
		margin-top: 32px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.showlistproduct a {
		width: 50px;
		color: #000;
		margin: 5px;
		border: 1px solid black;
		padding: 10px;
		border-radius: 10px;
		text-align: center;
		font-weight: bold;
	}
	.showlistproduct a:hover {
		color: red;
		border: 1px solid red;
		box-shadow: 0 0 5px 0 red;
        text-decoration: none;
	}
	.showlistproduct span {
		width: 50px;
		color: red;
		border: 1px solid red;
		margin: 5px;
		padding: 10px;
		text-align: center;
		border-radius: 10px;
		font-weight: bold;
		box-shadow: 0 0 5px 0 red;
	}
    #myTable th {
        padding: 20px;
    }
    #myTable td {
        padding: 20px;
    }
</style>