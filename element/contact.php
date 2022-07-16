<style>
	@import url('styles/contacts_styles.css');
	@import url('styles/contact_responsive.css');
</style>
<div class="container contact_container">
	<div class="row">
		<div class="col">
			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="?page=home">Trang chủ</a></li>
					<li class="active"><a href="?page=contact"><i class="fa fa-angle-right" aria-hidden="true"></i>Liên hệ</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div id="google_map">
				<div class="map_container">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6227712740633!2d105.79021561542349!3d21.04777469250365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3021c7a41f%3A0x58434f707b32e575!2zTmcuIDEyMCDEkC4gSG_DoG5nIFF14buRYyBWaeG7h3QsIEPhu5UgTmh14bq_IDEsIELhuq9jIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1656519320914!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 contact_col">
			<div class="contact_contents">
				<h1>Kết nối với chúng tôi</h1>
				<p>Có nhiều cách để liên hệ với chúng tôi. Bạn có thể gửi gọi cho chúng tôi hoặc gửi email, chọn những gì phù hợp với bạn nhất.</p>
				<div>
					<p>Phone : +84 823 565 831</p>
					<p>Mail : ndcake.store@gmail.com</p>
				</div>
				<div>
					<p>.....</p>
				</div>
				<div>
					<p>Mở cửa: 8.00 AM - 18.00PM T2-T7</p>
					<p>Chủ nhật: Nghỉ</p>
				</div>
			</div>
			<div class="follow_us_contents">
				<h1>Follow Us</h1>
				<ul class="social d-flex flex-row">
					<li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-6 get_in_touch_col">
			<div class="get_in_touch_contents">
				<h1>Get In Touch With Us!</h1>
				<p>Điền vào các thông tin dưới đây để liên hệ</p>
				<form action="post">
					<div>
						<input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Name" required="required" data-error="Name is required.">
						<input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
						<input id="input_website" class="form_input input_website input_ph" type="url" name="name" placeholder="Website" required="required" data-error="Name is required.">
						<textarea id="input_message" class="input_ph input_message" name="message" placeholder="Message" rows="3" required data-error="Please, write us a message."></textarea>
					</div>
					<div>
						<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">send message</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>