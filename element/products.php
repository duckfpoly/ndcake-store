<?php
	$data = "SELECT count(id) as total FROM products";
	$result = mysqli_query($conn, $data);
	$row = mysqli_fetch_assoc($result);
	$total_records = $row['total'];
	$current_page = isset($_GET['view']) ? $_GET['view'] : 1;
	$limit = 8;
	$total_page = ceil($total_records / $limit);
	if ($current_page > $total_page) {
		$current_page = $total_page;
	} else if ($current_page < 1) {
		$current_page = 1;
	}
	$start = ($current_page - 1) * $limit;
	$data = "SELECT products.id, products.image, products.name, products.price
	FROM products 
	LIMIT $start, $limit";
	$result2 = mysqli_query($conn, $data);
?>
<style>
	@import url('styles/categories_style.css');
	@import url('styles/categories_responsive.css');
</style>
<div class="container product_section_container">
	<div class="row">
		<div class="col product_section clearfix">
			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="?page=home">Trang chủ</a></li>
					<li class="active"><a href="?page=products"><i class="fa fa-angle-right" aria-hidden="true"></i>Sản phẩm</a></li>
				</ul>
			</div>
			<div class="sidebar">
				<div class="sidebar_section">
					<div class="sidebar_title">
						<h5>Product Category</h5>
					</div>
				</div>
			</div>
			<div class="main_content">
				<div class="products_iso">
					<div class="row">
						<div class="col">
							<div class="product_sorting_container product_sorting_container_top">
								<ul class="product_sorting">
									<li>
										<span class="type_sorting_text">Sắp xếp</span>
										<i class="fa fa-angle-down"></i>
										<ul class="sorting_type">
											<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'>
												<span>Sắp xếp mặc định</span>
											</li>
											<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Giá thấp -> cao</span>
											</li>
											<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Sắp xếp theo tên</span></li>
										</ul>
									</li>
									<li>
										<span>Hiển thị</span>
										<span class="num_sorting_text">All</span>
										<i class="fa fa-angle-down"></i>
										<ul class="sorting_num">
											<li class="num_sorting_btn"><span>3</span></li>
											<li class="num_sorting_btn"><span>5</span></li>
											<li class="num_sorting_btn"><span>7</span></li>
											<li class="num_sorting_btn"><span>8</span></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="product-grid">
								<?php
								while ($row = mysqli_fetch_assoc($result2)) {
								?>
									<div class="product-item <?php echo $row['name_cate'] ?>">
										<a href="?page=product_detail&id_prddetail=<?php echo $row['id'] ?>">
											<div class="product">
												<div class="product_image">
													<img src="<?php echo $row['image'] ?>" alt="">
												</div>
												<div class="product_info">
													<h6 class="product_name"><a href="?page=product_detail&id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></h6>
													<div class="product_price"><?php echo $row['price'].".000"?><span>vnđ</span></div>
												</div>
											</div>
											<div class="red_button add_to_cart_button"><a href="?page=spc&action=add&id=<?php echo $row['id'] ?>">Thêm vào giỏ hàng</a></div>
										</a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="showlistproduct">
					<?php
					if ($current_page > 1 && $total_page > 1) {
						echo '<a href="index.php?page=products&view=' . ($current_page - 1) . '"><</a>  ';
					}
					for ($i = 1; $i <= $total_page; $i++) {
						if ($i == $current_page) {
							echo '<span>' . $i . '</span>  ';
						} else {
							echo '<a href="index.php?page=products&view=' . $i . '">' . $i . '</a>  ';
						}
					}
					if ($current_page < $total_page && $total_page > 1) {
						echo '<a href="index.php?page=products&view=' . ($current_page + 1) . '">></a>  ';
					}
					?>
				</div>
			</div>
		</div>
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

	.switch {
		position: relative;
		display: inline-block;
		width: 30px;
		height: 20px;
	}

	.switch input {
		opacity: 0;
		width: 0;
		height: 0;
	}
	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 12px;
		width: 12px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked+.slider {
		background-color: cadetblue;
	}

	input:focus+.slider {
		box-shadow: 0 0 1px cadetblue;
	}

	input:checked+.slider:before {
		-webkit-transform: translateX(12px);
		-ms-transform: translateX(12px);
		transform: translateX(12px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}
</style>