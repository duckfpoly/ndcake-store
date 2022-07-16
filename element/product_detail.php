<?php
$id_prddetail = $_GET['id'];
if (!empty($id_prddetail)) {
	$sql = "SELECT * FROM products WHERE id = {$id_prddetail}";
	$query = mysqli_query($conn, $sql);
}
?>
<style>
	@import url('styles/singlestyles.css');
	@import url('styles/single_responsive.css');
</style>
<div class="container single_product_container">
	<div class="row">
		<div class="col">
			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="?page=home">Trang chủ</a></li>
					<li><a href="?page=products"><i class="fa fa-angle-right" aria-hidden="true"></i> Sản phẩm</a></li>
					<li><a href="?page=product_detail"><i class="fa fa-angle-right" aria-hidden="true"></i>Chi tiết sản phẩm</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php
	foreach ($query as $items) {
	?>
		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									<li><img src="<?php echo $items['image'] ?>" alt="" data-image="<?php echo $items['image'] ?>"></li>
									<li class="active"><img src="<?php echo $items['image'] ?>" alt="" data-image="<?php echo $items['image'] ?>"></li>
									<li><img src="<?php echo $items['image'] ?>" alt="" data-image="<?php echo $items['image'] ?>"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(<?php echo $items['image'] ?>)"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?php echo $items['name'] ?></h2>
						<p><?php echo $items['mota'] ?></p>
					</div>
					<div class="product_price"><?php echo $items['price'] . ".000 vnđ" ?></div>
					<!-- <ul class="star_rating">
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
					</ul> -->
					<div class="product_color">
						<h5><?php echo $items['type'] ?></h5>
					</div>
					<form method="post" action="?page=spc&action=add&id=<?php echo $items['id'] ?>" class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Số lượng:</span>&nbsp;&nbsp;&nbsp;
						<input class="form-control" name="number" type="number" max=999 min=1 value="1">
						<button style="margin-left: 20px;" type="submit" class=" btn btn-outline-success btn-md">Thêm vào giỏ hàng</button>
						<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
					</form>
				</div>
			</div>
		</div>
</div>
<div class="tabs_section_container">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="tabs_container">
					<?php
					$id_prd = $_GET['id'];
					$code = "SELECT count(*) as total FROM products_comment WHERE products_comment.id_products = {$id_prd}";
					$result2 = mysqli_query($conn, $code);
					$row_num = mysqli_fetch_assoc($result2);
					$total_number = $row_num['total'];
					?>
					<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
						<li class="tab active" data-active-tab="tab_1"><span>Mô tả</span></li>
						<li class="tab" data-active-tab="tab_2"><span>Thông tin khác</span></li>
						<li class="tab" data-active-tab="tab_3"><span>Bình luận <span style="color:red">( <?php echo $total_number ?> )</span></span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div id="tab_1" class="tab_container active">
					<div class="row">
						<div class="col-lg-5 desc_col">
							<div class="tab_title">
								<h4>Mô tả</h4>
							</div>
							<div class="tab_text_block">
								<h2>Bánh trung thu handmade</h2>
								<p>“Trung thu mới đó đã sang. Quà trao đối tác, họ hàng vẫn chưa. <br>
									Bánh gì vừa đẹp vừa sang. Vừa đầy ý nghĩa, vừa mang tấm lòng. <br>
									Nhà em có bánh mới làm, Tươi ngon tròn vị xứng tầm gửi trao.”
								</p>
							</div>
							<div class="tab_image">
								<img style="border-radius: 20px ;" src="<?php echo $items['image'] ?>" alt="">
							</div>
							<div class="tab_text_block">
								<h2>Bánh trung thu siu ngon </h2>
								<p> Bắc thang lên hỏi ông trời<br>
									Trung thu mua bánh chỗ nào mới ngon?<br>
									Ông trời đáp trả lại rằng:<br>
									“Ui giời, ndmooncake có bánh nhà làm siêu ưng”
								</p>
							</div>
						</div>
						<div class="col-lg-5 offset-lg-2 desc_col">
							<div class="tab_image">
								<img style="border-radius: 20px ;" src="<?php echo $items['image'] ?>" alt="">
							</div>
							<div class="tab_text_block">
								<h2>Rằm tháng tám</h2>
								<p>“Trăng Rằm tháng Tám đoàn viên,<br>
									Trao nhau miếng bánh vẹn nguyên nghĩa tình.<br>
									Bánh ngon lại đẹp lung linh,<br>
									Nhân tươi, ngọt dịu mới tinh nhà làm.”
								</p>
							</div>
							<div class="tab_image desc_last">
								<img style="border-radius: 20px ;" src="<?php echo $items['image'] ?>" alt="">
							</div>
						</div>
					</div>
				</div>
				<!-- Tab Additional Info -->
				<div id="tab_2" class="tab_container">
					<div class="row">
						<div class="col additional_info_col">
							<div class="tab_title additional_info_title">
								<h4>Thông tin sản phẩm</h4>
							</div>
							<p>Tên: <span><?php echo $items['name'] ?></span></p>
							<p>Nhân:<span><?php echo $items['fill'] ?></span></p>
						</div>
					</div>
				</div>
			<?php
		}
			?>
			<!-- Tab Reviews -->
			<div id="tab_3" class="tab_container">
				<div class="row">
					<!-- User Reviews -->
					<div class="col-lg-6 reviews_col">
						<div class="tab_title reviews_title">

							<h4>Bình luận (<?php echo $total_number ?>)</h4>
						</div>
						<!-- User Review -->
						<?php
						$id_prd = $_GET['id'];
						$sql = "SELECT 
							user_guest.url_image,
							user_guest.username,
							products_comment.content_cmt,
							products_comment.cmt_date ,
							products_comment.ratingstar
							FROM products_comment 
							INNER JOIN user_guest ON user_guest.id = products_comment.id_user_guest
							WHERE products_comment.id_products = {$id_prd}";
						$data_cmt = mysqli_query($conn, $sql);
						foreach ($data_cmt as $content) :
						?>
							<div class="user_review_container d-flex flex-column flex-sm-row">
								<div class="user">
									<div class="user_pic">
										<img width="100%" src="<?php echo $content['url_image'] ?>" alt="">
									</div>
								</div>
								<div class="review">
									<div class="review_date"><?php echo $content['cmt_date'] ?></div>
									<div class="user_name mb-0"><?php echo $content['username'] ?></div>
									<div class="rating_star">
									<?php 
									if($content['ratingstar'] == 1){
										echo '
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star "></span>
											<span class="fa fa-star "></span>
											<span class="fa fa-star "></span>
											<span class="fa fa-star "></span>
										';
									} 
									elseif($content['ratingstar'] == 2){
										echo '
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star "></span>
										<span class="fa fa-star "></span>
										<span class="fa fa-star "></span>
									';
									}
									elseif($content['ratingstar'] == 3){
										echo '
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star "></span>
										<span class="fa fa-star "></span>
									';
									}
									elseif($content['ratingstar'] == 4){
										echo '
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star "></span>
									';
									}
									elseif($content['ratingstar'] == 5){
										echo '
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
									';
									}

									?>
										
									</div>
									<p><?php echo $content['content_cmt'] ?></p>
								</div>
							</div>
						<?php
						endforeach; ?>
					</div>
					<!-- Add Review -->
					<div class="col-lg-6 add_review_col">
						<div class="add_review">
							<?php
							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
								$id_guest = $user['id'];
								$id_prd = $_GET['id'];
								$message = $_POST['message'];
								$star = $_POST['rating'];
								$conn->query("INSERT INTO `products_comment`(`id_user_guest`, `id_products`, `content_cmt`, `cmt_date`,`ratingstar`) 
								VALUES ('$id_guest','$id_prd]','$message',now(),'$star')");
								echo '<script language="javascript">window.location="?page=product_detail&id=' . $id_prd . '";</script>';
							}
							?>
							<form id="review_form" method="post">
								<?php
								if (isset($user['username'])) {
								?>
									<div>
										<h1>Thêm bình luận</h1>
										<input id="review_name" class="form_input input_name" type="text" name="name" value="<?php echo $user['fullname'] ?>" readonly>
									</div>
									<div>
										<h1>Đánh giá</h1><br>
										<style>
											#review_form i {
												color: yellow;
											}
										</style>
										<div class="rating">

											<input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
											<input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
											<input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
											<input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
											<input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
											
										</div>
										<textarea id="review_message" class="input_review" name="message" placeholder="Bình luận" rows="4" required data-error="Please, leave us a review."></textarea>
									</div>
									<div class="text-left text-sm-right">
										<button id="review_submit" type="submit" class="red_button review_submit_btn trans_300">submit</button>
									</div>
								<?php } else { ?>
									<div>
										<h1>Thêm bình luận</h1>
										<input id="review_name" class="form_input input_name" type="text" name="name" value="Vui lòng đăng nhập để bình luận !" readonly>
									</div>
								<?php
								}
								?>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Một số sản phẩm khác</h2>
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
		color:orange;
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