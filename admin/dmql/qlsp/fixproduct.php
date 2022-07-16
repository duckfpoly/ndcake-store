<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
    $name = "";
    $price = "";
    $fill = "";
    $mota = "";
    $image = "";
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
    $idprd = $_GET['idprd'];
    if (!empty($idprd)) {
        $sql = "UPDATE products SET name = '{$name}',price = '{$price}', fill = '{$fill}', mota = '{$mota}' , image = '{$image}' WHERE id = {$idprd}";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            echo '<script language="javascript">alert("Sửa sản phẩm thành công !!!"); window.location="index_admin.php?module=qlsp";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
}
$conn->close();
?>
<div class="banner">
    <div class="title">
        <p>Sửa Sản phẩm</p>
    </div>
    <img src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg" alt="">
</div>
<div class="addprd">
    <?php
        $username = "root";
        $password = "";
        $server = "localhost";
        $dbname = "storemooncake";
        $conn = new mysqli($server, $username, $password, $dbname);
        $idprd = $_GET['idprd'];
        if (!empty($idprd)) {
            $dsprd = "SELECT products.id, products.name , products.price , products.fill , products.mota , products.image  FROM products  WHERE products.id = {$idprd}";
            $data = mysqli_query($conn,$dsprd);
        } 
    ?>
    <form method="post">
        <?php foreach ( $data as $item ) { ?>
        <div class="form-group">
            <label for="name">Tên</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="name" value="<?php echo $item['name'] ?>">
        </div>
        <div class="form-group">
            <label for="price">Giá</label>
            <input name="price" type="text" class="form-control" id="price" aria-describedby="price" value="<?php echo $item['price'] ?>">
        </div>
        <div class="form-group">
            <label for="fill">Nhân</label>
            <input name="fill" type="text" class="form-control" id="fill" aria-describedby="fill" value="<?php echo $item['fill'] ?>">
        </div>
        <div class="form-group">
            <label for="mota">Mô tả</label>
            <input name="mota" type="text" class="form-control" id="mota" aria-describedby="mota" value="<?php echo $item['mota'] ?>">
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label><br>
            <input name="image" type="text" class="form-control" id="image" aria-describedby="image" placeholder="nhập đường dẫn url" value="<?php echo $item['image'] ?>">
        </div>
            <button name="submit" type="submit" class="btn btn-primary">Sửa</button>
            <?php } ?>
    </form>
</div>
