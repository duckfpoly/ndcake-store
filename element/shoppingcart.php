<?php
if (empty($_SESSION['cart'])) {
    $_SESSION['cart']  = array();
}
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            if (isset($_SESSION['user'])) {
                $id = $_GET['id'];
                if (array_key_exists($id, $_SESSION['cart'])) {
                    if (isset($_POST['number'])) {
                        $_SESSION['cart'][$id] += $_POST['number'];
                    } else {
                        $_SESSION['cart'][$id]++;
                    }

                } else {
                    if (isset($_POST['number'])) {
                        $_SESSION['cart'][$id] = $_POST['number'];
                    } else {
                        $_SESSION['cart'][$id] = 1;
                    }

                }
                echo '<script language="javascript"> alert("Đã thêm sản phẩm vào giỏ hàng !"); window.location="?page=products";</script>';
            } else {
                echo '<script language="javascript"> alert("Bạn chưa đăng nhập !");  window.location="./element/signin.php";</script>';
            }
            break;
            
        case 'del':
            $id = $_GET['id'];
            unset($_SESSION['cart'][$id]);
            echo '<script language="javascript">window.location="?page=spc";</script>';
            break;
        case 'delAll':
            unset($_SESSION['cart']);
            echo '<script language="javascript">window.location="?page=spc";</script>';
            break;
        case 'updatePrd':
            foreach (array_keys($_SESSION['cart']) as $key) :
                $_SESSION['cart'][$key] = $_POST[$key];
            endforeach;
            echo '<script language="javascript">window.location="?page=spc";</script>';
            break;
    }
}
?>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="px-4 px-lg-0">
    <div class="pb-5" style="margin-top:150px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5 bg-white rounded shadow-sm ">
                    <section>
                        <div class="container">
                            <div class="row w-100">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <h3 class="display-5 mb-2 text-center">Giỏ hàng</h3>
                                    
                                   
                                            <?php
                                            if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
                                            ?>
                                                <?php
                                                $ids = "0";
                                                $tongtien = $ship = 0;
                                                $ship = 30;
                                                foreach (array_keys($_SESSION['cart']) as $key) :
                                                    $ids .= "," . $key;
                                                endforeach;
                                                $query = "SELECT * FROM products WHERE products.id in($ids) ";
                                                $result = $conn->query($query);
                                                if (mysqli_num_rows($result) > 0) :
                                                    foreach ($result as $items) :
                                                ?>
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
                                                            <th style="width:9%">Tùy chọn</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="myList">
                                                        <form method="post" action="?page=spc&action=updatePrd&id=<?php echo $items['id'] ?>">
                                                            <tr>
                                                                <td data-th="Product">
                                                                    <div class="row">
                                                                        <div class="col-md-3 text-left">
                                                                           <a href="?page=product_detail&id=<?php echo $items['id'] ?>"><img src="<?= $items['image'] ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow "></a> 
                                                                        </div>
                                                                        <div class="col-md-9 text-left mt-sm-2">
                                                                            <a href="?page=product_detail&id=<?php echo $items['id'] ?>"><h4><?= $items['name'] ?></h4></a>
                                                                            <p class="font-weight-light">Type: <?= $items['fill'] ?></p>
                                                                            <p class="font-weight-light"><?= $items['type'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td data-th="Price"><?= $items['price'] ?>.000 vnđ</td>
                                                                <td class="row" data-th="Quantity">
                                                                    <input type="number" class="form-control form-control-sm text-center" min=1 name="<?= $items['id'] ?>" value="<?= $_SESSION['cart'][$items['id']] ?>">
                                                                </td>
                                                                <td data-th="Quantity">
                                                                    <span><?= $items['price'] * $_SESSION['cart'][$items['id']] ?></span><span>.000 <span>VNĐ</s></span>
                                                                </td>
                                                                <td class="actions" data-th="">
                                                                    <div class="text-right">
                                                                        <button type="submit" class="btn btn-white border-secondary bg-white btn-md mb-2"> <i class="fas fa-sync"></i></button>
                                                                        <a class="btn btn-white border-secondary bg-white btn-md mb-2" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')" href="?page=spc&action=del&id=<?php echo $items['id'] ?>">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </div>
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
                                    echo "<div class='text-center mt-5'><img width='50%'src='https://bizweb.dktcdn.net/100/368/179/themes/738982/assets/empty-cart.png?1609300798440' alt=''></div>";
                                }
                            ?>
                            <tfoot>
                            <tr>
                                    <?php if (isset($tongtien)) { ?>
                                        <th colspan="3">Thành tiền</th>
                                        <th><p><span><?php echo $tongtien ?></span>.000 VNĐ</p></th>
                                    <?php } else { ?>
                                        <th><span></span></th>
                                    <?php } ?>
                                </tr>
                            <tr>
                                <?php if (isset($tongtien)) { ?>
                                    <th colspan="3">Phí ship</th>
                                    <th><p><span><?php echo $ship ?></span>.000 VNĐ</p></th>
                                <?php } else { ?>
                                    <th><span></span></th>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php if (isset($tongtien)) { ?>
                                    <th colspan="3">Tổng tiền đơn hàng</th>
                                    <th><p><span><?php echo $ship + $tongtien ?></span>.000 VNĐ</p></th>
                                <?php } else { ?>
                                    <th><span></span></th>
                                <?php } ?>
                            </tr>
                            </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-4 d-flex align-items-center ">
                                <?php
                                if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
                                ?>
                                    <div class="col-sm-6 order-md-2 text-right">
                                        <a onclick="return confirm('Bạn có muốn xóa toàn bộ sản phẩm trong giỏ hàng không ?')" href="?page=spc&action=delAll&id=<?php echo $items['id'] ?>" class="btn btn-outline-dark mb-4 btn-sm pl-5 pr-5"><i class="fas fa-trash"></i> Xóa toàn bộ giỏ hàng</a>
                                        <!-- <button type="submit" class="btn btn-outline-dark mb-4 btn-sm pl-5 pr-5"> <i class="fas fa-sync"></i> Cập nhật giỏ hàng</button> -->
                                        </form>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                                        <a href="?page=products">
                                            <i class="fas fa-arrow-left mr-2"></i>Tiếp tục mua hàng
                                        </a>
                                    </div>
                                <?php
                                } else {
                                ?>
                                   
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                                        <a href="?page=products">
                                            <i class="fas fa-arrow-left mr-2"></i>Quay lại mua hàng đã nào !
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                    </section>
                </div>
            </div>
            <?php
            if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
            ?>
                <a href="?page=order" class="btn btn-dark rounded-pill py-2 btn-block">Tiến hành thanh toán</a>
            <?php
            } else {
            ?>
                <!-- <button disabled class="btn btn-dark rounded-pill py-2 btn-block">Không có gì trong giỏ hàng. <strong>Không thể tiến hành thanh toán</strong></button> -->
            <?php
            }
            ?>
        </div>
    </div>
</div>
<section>
	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Sản phẩm</h2>
					</div>
				</div>
			</div>
			<div class="container d-flex justify-content-center mt-100">
				<div class="row">
					<?php
					$sql = "SELECT * FROM products LIMIT 4";
					$data_box = mysqli_query($conn, $sql);
					foreach ($data_box as $box) :
					?>
						<div class="col-md-3">
							<div class="product-wrapper mb-45 text-center">
								<div class="product-img"> <a href="?page=product_detail&id=<?php echo $box['id'] ?>" data-abc="true"> <img width="100%" src="<?php echo $box['image'] ?>" alt=""> </a>
									<span class="text-center" style="font-size:10px ;"><?php echo $box['fill'] ?> | <?php echo $box['price'] ?>.000 VNĐ</span><br>
									<div class="product-action">
										<div class="product-action-style"><a href="?page=product_detail&id=<?php echo $box['id'] ?>"><i class="fa fa-bookmark"></i> </a> <a href="?page=spc&action=add&id=<?php echo $box['id'] ?>"> <i class="fa fa-shopping-cart"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<style>
	.checked {
		color: orange;
	}

	@import url(https://fonts.googleapis.com/css?family=Calibri:400,300,700);

	.mt-100 {
		margin-top: 100px
	}

	.product-wrapper,
	.product-img {
		overflow: hidden;
		position: relative
	}

	.mb-45 {
		margin-bottom: 45px
	}

	.product-action {
		bottom: 0px;
		left: 0;
		opacity: 0;
		position: absolute;
		right: 0;
		text-align: center;
		transition: all 0.6s ease 0s
	}

	.product-wrapper {
		border-radius: 10px
	}

	.product-img>span {
		background-color: #fff;
		box-shadow: 0 0 8px 1.7px rgba(0, 0, 0, 0.06);
		color: #333;
		display: inline-block;
		font-size: 12px;
		font-weight: 500;
		left: 20px;
		letter-spacing: 1px;
		padding: 3px 12px;
		position: absolute;
		text-align: center;
		text-transform: uppercase;
		top: 20px
	}

	.product-action-style {
		background-color: #fff;
		box-shadow: 0 0 8px 1.7px rgba(0, 0, 0, 0.06);
		display: inline-block;
		padding: 16px 2px 12px
	}

	.product-action-style>a {
		color: #979797;
		line-height: 1;
		padding: 0 21px;
		position: relative
	}

	.product-action-style>a.action-plus {
		font-size: 18px
	}

	.product-wrapper:hover .product-action {
		bottom: 20px;
		opacity: 1
	}

	.rating {
		display: flex;
		flex-direction: row-reverse;
		justify-content: center;
	}

	.rating>input {
		display: none;
	}

	.rating>label {
		position: relative;
		width: 1em;
		font-size: 26px;
		color: #FFD600;
		cursor: pointer;
	}

	.rating>label::before {
		content: "\2605";
		position: absolute;
		opacity: 0;
	}

	.rating>label:hover:before,
	.rating>label:hover~label:before {
		opacity: 1 !important;
	}

	.rating>input:checked~label:before {
		opacity: 1;
	}

	.rating:hover>input:checked~label:before {
		opacity: 0.4;
	}
</style>