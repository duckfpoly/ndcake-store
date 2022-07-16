<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
$name = "";
$price = "";
$filling = "";
$describe = "";
$image = "";
$id_cate = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"])) {
        $name = $_POST['name'];
    }
    if (isset($_POST["price"])) {
        $price = $_POST['price'];
    }
    if (isset($_POST["fill"])) {
        $fill = $_POST['fill'];
    }
    if (isset($_POST["mota"])) {
        $mota = $_POST['mota'];
    }
    if (isset($_POST["image"])) {
        $image = $_POST['image'];
    }
    $sql = "INSERT INTO products (name, price, fill, mota, image) 
                        VALUES ('{$name}','{$price}','{$fill}','{$mota}','{$image}')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo '<script language="javascript">alert("Thêm thành công !!!"); window.location="index_admin.php?module=qlsp";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<div class="banner">
    <div class="title">
        <p>Thêm Sản phẩm</p>
    </div>
    <img src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="">
</div>
<div class="addprd">
    <form method="post">
        <div class="form-group">
            <label for="name">Tên</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="name" required>
        </div>
        <div class="form-group">
            <label for="price">Giá</label>
            <input name="price" type="text" class="form-control" id="price" aria-describedby="price" required>
        </div>
        <div class="form-group">
            <label for="fill">Nhân</label>
            <select name="fill" class="form-control" id="fill" aria-describedby="fill" required>
                <option value="" disabled selected>Chọn nhân bánh</option>
                <option value="Thập cẩm gà quay">Thập cẩm gà quay</option>
                <option value="Mơ tây cao cấp">Mơ tây cao cấp</option>
                <option value="Cốm dừa">Cốm dừa</option>
                <option value="Hạt sen long nhãn">Hạt sen long nhãn</option>
                <option value="Hồng trà phô mai">Hồng trà phô mai</option>
                <option value="Đậu xanh">Đậu xanh</option>
                <option value="Trà xanh">Trà xanh</option>
                <option value="Khoai môn">Khoai môn</option>
                <option value="Sầu riêng">Sầu riêng</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mota">Mô tả</label>
            <input name="mota" type="text" class="form-control" id="mota" aria-describedby="mota" required>
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label><br>
            <input name="image" type="text" class="form-control" id="image" aria-describedby="image" placeholder="nhập đường dẫn url" required>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>