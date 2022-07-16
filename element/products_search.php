<?php 
    if (isset($_POST["search"])) {
        $key = $_POST['key'];
    }
    $sql = "SELECT * FROM products WHERE products.name LIKE '%".$key."%'";
    $query = mysqli_query($conn, $sql);
?>
<div class="new_arrivals">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="product-grid " id="myList" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                            <?php foreach ($query as $item) { ?>
                                <div class="product-item items">
                                    <a href="?page=product_detail&id=<?php echo $item['id'] ?>">
                                        <div class="product">
                                            <!-- product_filter -->
                                            <div class="product_image">
                                                <img src="<?php echo $item['image'] ?>" alt="">
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="?page=product_detail&id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h6>
                                                <div class="product_price"><?php echo $item['price'] . ".000 vnđ" ?></div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="?page=spc&action=add&id=<?php echo $item['id'] ?>">Thêm vào giỏ hàng</a></div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>