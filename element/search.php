<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="wrapper-2">
<br />
<br />
<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
        <form method="post" class="card card-sm" action="?page=search">
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i class="fas fa-search h4 text-body"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input name="key" class="form-control form-control-lg form-control-borderless" type="text" placeholder="Tìm kiếm nhân bánh ... ">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success" type="submit" name="search">Tìm</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>
    
    <!--end of col-->
</div>
<div class="content-search">
    <?php
    if (isset($_POST["search"])) {
        $key = $_POST['key'];
    }
    if (isset($key)) {
        $sql = "SELECT * FROM products WHERE products.name LIKE '%" . $key . "%'";
        $query = mysqli_query($conn, $sql);
    }
    ?>
    <div class="col-12 col-md-10 col-lg-8 mt-3" style="margin: 0px auto;">
        <?php if(isset($key)) { ?>
        <p>Từ khóa tìm kiếm: <strong><?php echo $key ?></strong></p> 
        <?php } ?>
    </div>
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
    <hr>
</div>
<style>
    .wrapper-2 {
        margin-top: 200px;
    }

    .content-search {
        margin-bottom: 65vh;
    }

    .form-control-borderless {
        border: none;
    }

    .form-control-borderless:hover,
    .form-control-borderless:active,
    .form-control-borderless:focus {
        border: none;
        outline: none;
        box-shadow: none;
    }

    .form-control-borderless {
        border: none;
    }

    .form-control-borderless:hover,
    .form-control-borderless:active,
    .form-control-borderless:focus {
        border: none;
        outline: none;
        box-shadow: none;
    }
</style>