<style>
	@keyframes show1 {
		0% {
			transform: translateX(-50%);
			opacity: 0;
		}

		100% {
			transform: translateX(0%);
			opacity: 1;
		}
	}

	@keyframes show2 {
		0% {
			transform: translateX(-40%);
			opacity: 0;
		}

		100% {
			transform: translateX(0%);
			opacity: 1;
		}
	}

	@keyframes show3 {
		0% {
			transform: translateX(-30%);
			opacity: 0;
		}

		100% {
			transform: translateX(0%);
			opacity: 1;
		}
	}

	.text1 {
		animation: show1 1s ease-in-out;
	}

	.text2 {
		animation: show2 1s ease-in-out;
	}

	.text3 {
		animation: show3 1s ease-in-out;
	}
</style>
<div class="main_slider" style="background-image:url(https://img3.thuthuatphanmem.vn/uploads/2019/09/11/background-tet-trung-thu-dep-va-don-gian_105459369.jpg)">
	<div class="container fill_height">
		<div class="row align-items-center fill_height">
			<div class="col">
				<div class="main_slider_content">
					<h3 class="text1" style="color: #fff;">WELCOME TO</h3>
					<h1 class="text2" style="color: #fff;">ND MOONCAKE STORE</h1>
					<div class="red_button shop_now_button text3"><a href="?page=products">Shop now</a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Bánh trung thu nổi bật</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
					<?php
					$sql = "SELECT products.id, products.image, products.name, products.price FROM products LIMIT 5";
					$query = mysqli_query($conn, $sql);
					$data = mysqli_fetch_assoc($query);
					?>
					<?php foreach ($query as $item) { ?>
						<div class="product-item">
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
<button onclick="location.href='?page=products';" style="width:50%; margin:0px auto; margin-top:32px;" type="button" class="btn btn-outline-danger btn-lg btn-block">Xem thêm</button>
<div class="best_sellers">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Bánh trung thu được mua nhiều</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product_slider_container">
					<div class="owl-carousel owl-theme product_slider">
						<?php
						$sql = "SELECT * FROM products LIMIT 8";
						$query = mysqli_query($conn, $sql);
						$data = mysqli_fetch_assoc($query);
						?>
						<?php foreach ($query as $item) { ?>
							<div class="owl-item product_slider_item">
								<a href="?page=product_detail&id=<?php echo $item['id'] ?>">

									<div class="product-item">
										<div class="product discount" style="padding:20px">
											<div class="product_image">
												<img src="<?php echo $item['image'] ?>" alt="">
											</div>
											<!-- <div class="favorite favorite_left"></div> -->
											<!-- <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
											<span>-$20</span>
										</div> -->
											<div class="product_info">
												<h6 class="product_name"><a href="?page=product_detail&id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h6>
												<div class="product_price"><?php echo $item['price'] . ".000" ?><span>vnđ</span></div>
											</div>
										</div>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>

					<!-- Slider Navigation -->

					<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
					</div>
					<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="best_sellers">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Hộp bánh</h2>
				</div>
			</div>
		</div>
		<div class="container d-flex justify-content-center mt-100">
			<div class="row">
				<?php 
					$sql = "SELECT products.id, products.image,products.price FROM products WHERE products.name LIKE '%hộp%'";
					$data_box = mysqli_query($conn,$sql);
					foreach($data_box as $box):
				?>
				<div class="col-md-4">
					<div class="product-wrapper mb-45 text-center">
						<div class="product-img"> <a href="?page=product_detail&id=<?php echo $box['id'] ?>" data-abc="true"> <img width="100%" src="<?php echo $box['image'] ?>" alt=""> </a> <span class="text-center"><?php echo $box['price'] ?>.000 VNĐ</span>
							<div class="product-action">
								<div class="product-action-style"> <a href="?page=product_detail&id=<?php echo $box['id'] ?>"> <i class="fa fa-bookmark"></i> </a> <a href="?page=spc&action=add&id=<?php echo $box['id'] ?>"> <i class="fa fa-shopping-cart"></i> </a> </div>
							</div>
						</div>
					</div>
				</div>				
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<style>
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
</style>