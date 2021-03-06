<?php
include('element/connectdb.php');
header('Content-Type: text/html; charset=UTF-8');
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
$sql = "SELECT * FROM products";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>ND MOONCAKE</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="fb:admins" content="https://www.facebook.com/ntduc106" />
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/mains_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body onload="time()">
	<div class="super_container">
		<header class="header trans_300">
			<div class="top_nav">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="top_nav_left">
								<div id="clock"></div>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="top_nav_right">
								<ul class="top_nav_menu">
									<?php if (isset($user['username'])) { ?>
										<li class="account">
											<a href="#">
												Xin ch??o, <span><?php echo $user['username'] ?></span>
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="account_selection">
												<li><a href="?page=profile_guest&id=<?php echo $user['id'] ?>"><i class="fa fa-address-card" aria-hidden="true"></i>Th??ng tin c?? nh??n</a></li>
												<li><a href="?page=myorder&id=<?php echo $user['id'] ?>"><i class="fa fa-shopping-basket" aria-hidden="true"></i>????n mua</a></li>
												<li><a href="./element/signout.php"><i class="fa fa-sign-in" aria-hidden="true"></i>????ng xu???t</a></li>
											</ul>
										</li>
									<?php } else { ?>
										<li class="account">
											<a href="#">
												T??i kho???n
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="account_selection">
												<li><a href="./element/signin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>????ng nh???p</a></li>
												<li><a href="./element/signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i>????ng k??</a></li>
											</ul>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main_nav_container">
				<div class="container">
					<div class="row ">
						<div class="col-lg-12 text-right">
							<div class="logo_container">
								<a href="?page=home">ND<span>MOONCAKE</span></a>
							</div>
							<nav class="navbar stroke">
								<ul class="navbar_menu">
									<li><a href="?page=home">Trang ch???</a></li>
									<li class="dropdown ">
										<a href="" data-toggle="dropdown ">
											ND Cake
											<i style="padding:1px" class="fa-solid fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu text-center" style="min-width: 150px;">
											<li><a href="?page=products">S???n ph???m</a></li>
											<li><a href="?page=about">Gi???i thi???u</a></li>
											<li><a href="?page=contact">Li??n h???</a></li>
											<li><a href="?page=news">Blogs</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="" data-toggle="dropdown">
											Ch??nh s??ch
											<i style="padding:1px" class="fa-solid fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu text-center" style="min-width: 230px;">
											<li><a href="#">Ch??nh s??ch ?????i tr???</a></li>
											<li><a href="#">Ch??nh s??ch v???n chuy???n</a></li>
											<li><a href="#">H?????ng d???n mua h??ng</a></li>
										</ul>
									</li>
								</ul>
								<ul class="navbar_user">
									<li class="search mr-3">
										<a href="?page=search"><i class="fa fa-search" aria-hidden="true"></i></a>
									</li>
									<li class="dropdown checkout">
										<a href="?page=spc" data-toggle="dropdown ">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											<?php if (isset($user['username'])) {
												if (isset($_SESSION['cart'])) {
											?>
												<span id="checkout_items" class="checkout_items"><?php echo count($_SESSION['cart']) ?></span>
											<?php  }
											} else { ?>
											<?php } ?>
										</a>
										<ul class="dropdown-menu text-center" style=" position:absolute; left:-200px; min-width: 450px; min-height:250px;max-height:70vh;overflow: auto; border-radius:50px;">
											<p style="color:black;">Gi??? h??ng</p>
											<table class="table table-hover d-flex flex-column justify-content-center align-items-center">
												<tbody>
													<?php
													if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
														$ids = "0";
														$tongtien = $ship = 0;
														foreach (array_keys($_SESSION['cart']) as $key) :
															$ids .= "," . $key;
														endforeach;
														$query = "SELECT * FROM products WHERE products.id in($ids) ";
														$result = $conn->query($query);
														if (mysqli_num_rows($result) > 0) :
															foreach ($result as $items) :
													?>
																<tr>
																	<td class="col-3"><span> <img src="<?php echo $items['image'] ?>" alt="anhsp" width="70px"> </span></td>
																	<td class="col-7">
																		<ul>
																			<li style="font-size:14px ;"><?php echo $items['name'] ?></li>
																			<li style="font-size:14px ;"><?php echo $items['price'] ?>.000 VN??</li><br>
																			<li style="font-size:14px ;">S??? l?????ng: <?= $_SESSION['cart'][$items['id']] ?></li>
																		</ul>
																	</td>
																	<td><a class="btn btn-white border-secondary bg-white btn-md mb-2" href="?page=spc&action=del&id=<?php echo $items['id'] ?>">
																	<i class="fas fa-trash"></i></a>
																	</td>
																</tr>
														<?php
                                            				$tongtien = ($tongtien + ($items['price'] * $_SESSION['cart'][$items['id']]));
															endforeach;
														endif;
														?>
												</tbody>
												<tfoot>
													<tr>
														<td>T???ng ti???n: <?php echo $tongtien ?>.000 VN??</td>
													</tr>
													<tr>
														<td colspan="3">
															<?php
															if (isset($_SESSION['user'])) {
																?> <button onclick="location.href='?page=spc'" class="btn btn-outline-danger">Chi ti???t gi??? h??ng</button>
																<?php
															} else {
																echo 'B???n c???n ????ng nh???p ????? s??? d???ng gi??? h??ng';
															}
															?>
														</td>
													</tr>
												</tfoot>
											<?php
													} else {
														// echo 'Ch??a c?? g?? trong gi??? h??ng !<br> ??i mua s???m ???? n??o  ';
														echo '	<img width="150px" src="https://bizweb.dktcdn.net/100/368/179/themes/738982/assets/empty-cart.png?1609300798440" alt="">';
											?>
											<?php
													} ?>
											</table>
										</ul>
									</li>
									<?php if (isset($user['username'])) { ?>
										<li style="margin-left: 20px;">
											<a href="?page=profile_guest&id=<?php echo $user['id'] ?>">
												<img style="width:20px; border-radius:10px" src="<?php echo $user['url_image'] ?>" alt="">
												<span><?php echo $user['username'] ?></span>
											</a>
										</li>
									<?php } else { ?>
										<li style="margin-left: 10px;" class="user">
											<a href="./element/signin.php"><i class="fa fa-user" aria-hidden="true"></i></a>
										</li>
									<?php } ?>
								</ul>
								<div class="hamburger_container">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="fs_menu_overlay"></div>
		<div class="hamburger_menu">
			<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="hamburger_menu_content text-right">
				<ul class="menu_top_nav">
					<?php if (isset($user['username'])) { ?>
						<li class="menu_item has-children">
							<a href="#">
								Xin ch??o, <span><?php echo $user['username'] ?></span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="menu_selection">
								<li><a href="?page=profile_guest&id=<?php echo $user['id'] ?>"><i class="fa fa-address-card" aria-hidden="true"></i> Th??ng tin c?? nh??n</a></li>
								<li><a href="?page=myorder"><i class="fa fa-shopping-basket" aria-hidden="true"></i> ????n mua</a></li>
								<li><a href="./element/signout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> ????ng xu???t</a></li>
							</ul>
						</li>
					<?php } else { ?>
						<li class="menu_item has-children">
							<a href="#">
								T??i kho???n
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="menu_selection">
								<li><a href="./element/signin.php"><i class="fa fa-sign-in" aria-hidden="true"></i> ????ng nh???p</a></li>
								<li><a href="./element/signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> ????ng k??</a></li>
							</ul>
						</li>
					<?php } ?>
					<li class="menu_item"><a href="?page=home">Trang ch???</a></li>
					<li class="menu_item"><a href="?page=products">S???n ph???m</a></li>
					<li class="menu_item"><a href="?page=about">Gi???i thi???u</a></li>
					<li class="menu_item"><a href="?page=contact">Li??n h???</a></li>
					<li class="menu_item"><a href="?page=news">Blogs</a></li>
					<li class="menu_item has-children">
						<a href="#">
							Ch??nh s??ch
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li>Ch??nh s??ch ?????i tr???</li>
							<li>Ch??nh s??ch v???n chuy???n</li>
							<li>H?????ng d???n mua h??ng</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<section>
			<?php
			include('element/fille.php');
			?>
		</section>
		<div class="benefit">
			<div class="container">
				<div class="row benefit_row">
					<div class="col-lg-4 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Freeship</h6>
								<p>B??n k??nh 3km</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-check" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>S???n ph???m</h6>
								<p>?????t ti??u chu???n an to??n th???c ph???m 100%</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Th???i gian m??? c???a</h6>
								<p>8AM - 09PM</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blogs">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="section_title">
							<h2>Blogs</h2>
						</div>
					</div>
				</div>
				<div class="row blogs_container">
					<div class="col-lg-4 blog_item_col">
						<div class="blog_item">
							<div class="blog_background" style="background-image:url(https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/9d45d1de-bcba-4f4b-ba2e-e6cb7c45bd5c.received_634519940855698.jpeg?v=1657599958817)"></div>
							<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
								<h4 class="blog_title">B??nh trung thu HANDMADE</h4>
								<span class="blog_meta">by admin | August 01, 2022</span>
								<a class="blog_more" href="?page=products">Mua ngay</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 blog_item_col">
						<div class="blog_item">
							<div class="blog_background" style="background-image:url(https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/baf3ff1e-9f44-4058-b368-a4b43f6515e3.IMG_1657278944336_1657599311894.jpg?v=1657599964752)"></div>
							<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
								<h4 class="blog_title">??a d???ng m???u b??nh</h4>
								<span class="blog_meta">by admin | August 01, 2022</span>
								<a class="blog_more" href="?page=products">Mua ngay</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 blog_item_col">
						<div class="blog_item">
							<div class="blog_background" style="background-image:url(https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/219477186_2688720041426211_1730125793542473971_n.jpg?v=1657612579076)"></div>
							<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
								<h4 class="blog_title">??a d???ng nh??n b??nh</h4>
								<span class="blog_meta">by admin | August 01, 2022</span>
								<a class="blog_more" href="?page=products">Mua ngay</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
							<h4>Promotions</h4>
							<p>????ng k?? ????? nh???n th??ng tin khuy???n m??i s???m nh???t</p>
						</div>
					</div>
					<div class="col-lg-6">
						<form method="post">
							<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
								<input id="newsletter_email" type="text" name="email_sale" placeholder="Your email" data-error="Valid email is required.">
								<button id="newsletter_submit" class="newsletter_submit_btn trans_300">Send</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
							<ul class="footer_nav">
								<li><a href="#">Blog</a></li>
								<li><a href="#">FAQs</a></li>
								<li><a href="?page=contact">Contact us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
							<ul>
								<li><a href="https://www.facebook.com/ndmooncake"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="footer_nav_container">
							<div class="cr">??2022 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Nguyen Duc</a>
							</div>
						</div>
					</div>
				</div>
		</footer>
	</div>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="js/index_home.js"></script>
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/categoriescustom.js"></script>
	<script src="js/single_custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-dropdown-hover/4.2.0/jquery.bootstrap-dropdown-hover.min.js"></script>
	<script>
		$('.dropdown').hover(function() {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
</body>

</html>
<style>
	nav ul li a,
	nav ul li a:after,
	nav ul li a:before {
		transition: all .5s;
	}

	/* stroke */
	nav.stroke ul li a,
	nav.fill ul li a {
		position: relative;
	}

	nav.stroke ul li a:after,
	nav.fill ul li a:after {
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		margin: auto;
		width: 0%;
		content: '.';
		color: transparent;
		background: #aaa;
		height: 1px;
	}

	nav.stroke ul li a:hover:after {
		width: 100%;
	}

	nav.fill ul li a {
		transition: all 2s;
	}

	nav.fill ul li a:after {
		text-align: left;
		content: '.';
		margin: 0;
		opacity: 0;
	}

	nav.fill ul li a:hover {
		color: #fff;
		z-index: 1;
	}

	nav.fill ul li a:hover:after {
		z-index: -10;
		animation: fill 1s forwards;
		-webkit-animation: fill 1s forwards;
		-moz-animation: fill 1s forwards;
		opacity: 1;
	}
</style>