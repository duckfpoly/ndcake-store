<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	@import url('styles/contacts_styles.css');
	@import url('styles/contact_responsive.css');
</style>
<div class="bg-light">
  <div class="container py-5">
  <div class="row" style="margin-top: 100px;">
  <div class="col">
    <div class="breadcrumbs d-flex flex-row align-items-center">
      <ul>
        <li><a href="?page=home">Trang chủ</a></li>
        <li class="active"><a href="?page=about"><i class="fa fa-angle-right"aria-hidden="true"></i>Giới thiệu</a></li>
      </ul>
    </div>
  </div>
</div>
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <p class="display-4">Giới thiệu</p>
        <p class="lead text-muted mb-0">ND MOONCAKE</p>
        <p class="lead text-muted">Design by <a href="https://nguyenduc--info.glitch.me/" class="text-muted"> 
        <span>NguyenDuc</span></a>
        </p>
      </div>
      <div class="col-lg-6 d-none d-lg-block"><img src="https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/1e115285-631b-4632-bd1b-480e047df4c7.img2.png?v=1657599955229" alt="" class="img-fluid"></div>
    </div>
  </div>
</div>
<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bookmark fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Thông tin cơ bản</h2>
        <ul>
              <li>- ND MOONCAKE là một trong những shop bán bánh trung thu ở Hà Nội</li>
              <li>- Địa chỉ: Ngõ 120 - Đường Hoàng Quốc Việt - Phường Nghĩa Đô - Quận Cầu Giấy - Thành phố Hà Nội </li>
              <li>- Director: Nguyen Duc</li>
              <li>-Số điện thoại : <a href="tel:+84823565831">+84823565831</a></li>
              <li>- Email: <a href="mailto:ndcake.store@gmail.com">ndcake.store@gmail.com</a> </li>
              <li>- Website: <a href="https://www.ndcake.com" target="blank">www.ndcake.com</a></li>
            </ul>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/5d4a7f2c-59f1-4d1e-9d77-0350110d3612.img1.png?v=1657599954858" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/5d4a7f2c-59f1-4d1e-9d77-0350110d3612.img1.png?v=1657599954858" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Sản phẩm kinh doanh</h2>
        <p class="font-italic text-muted mb-4">Hiện tại, NDCAKE đang kinh doanh về mặt hàng bánh trung thu loại bánh nướng không bán loại bánh dẻo</p><a href="?page=products" class="btn btn-light px-5 rounded-pill shadow-sm">Xem sản phẩm</a>
      </div>
    </div>
  </div>
</div>
<div class="bg-light py-5">
  <div class="container py-5">
    <div class="row mb-4">
      <div class="col-lg-5">
        <h4 class="display-5">Thành viên quản trị</h4>
      </div>
    </div>
    <div class="row text-center justify-content-center">
    <?php 
      $sql = "SELECT * FROM employee";
      $query = mysqli_query($conn,$sql);
      foreach ($query as $items):
    ?>
      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="<?php echo $items['image'] ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0"><?php echo $items['fullname'] ?></h5><span class="small text-uppercase text-muted"><?php echo $items['duty'] ?></span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook" style="color:#000"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram" style="color:#000"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-github" style="color:#000"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin" style="color:#000"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div class="best_sellers">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Một số sản phẩm của NDCAKE</h2>
				</div>
			</div>
		</div>
		<div class="container d-flex justify-content-center mt-100">
			<div class="row">
				<?php 
					$sql = "SELECT * FROM products LIMIT 4";
					$data_box = mysqli_query($conn,$sql);
					foreach($data_box as $box):
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
