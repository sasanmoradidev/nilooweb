<?php
global $nilooweb;
$options = get_option('nilooweb');
?>
<main class="dsn-grid-color">

<!-- Contact
================================================== -->
<section class="contact-p section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="contact-info">
					<div class="title-box">
						<h3>Let's talk</h3>
						<div class="lineStagger"></div>
					</div>

					<div class="desc">
						<ul>
							<li>Tell me about your company or startup.</li>
							<li>In which role do you see me? </li>
							<li>Do you require me to work locally or remote?</li>
						</ul>
					</div>

					<div class="info-inf">
						<div class="row pl-0 pr-0">
							<div class="col-md-12">
								<div class="in-box">
									<h4>ADDRESS</h4>
									<p>Jolaf street, Tehran, Iran</p>
								</div>
							</div>

							<div class="col-md-12">
								<div class="in-box">
									<h4>NUMBER</h4>
									<p>09121234567</p>
								</div>
							</div>
						</div>
					</div>

					<div class="mail-dtls">
						<span>Prefer Direct Mail ?</span>
						<span class="maill">
							<a href="kheradmand.ahoo@gmail.com">kheradmand.ahoo@gmail.com</a>
						</span>
						<a href="nilooweb.ir" target="_blank" class="dsn">Impressum</a>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="form-box">
					<form id="contact-form" class="form" method="post" action="contact.php" data-toggle="validator">
						<div class="messages"></div>
						<div class="input__wrap controls">
							<div class="form-group">
								<label>Why don't we start with your name?</label>
								<input id="form_name" type="text" name="name" placeholder="Type your name" required="required" data-error="name is required.">
								<div class="help-block with-errors"></div>
							</div>

							<div class="form-group">
								<label>Second Please enter email?</label>
								<input id="form_email" type="email" name="email" placeholder="Type your Email Address" required="required" data-error="Valid email is required.">
								<div class="help-block with-errors"></div>
							</div>

							<div class="form-group">
								<label>Third we look forward to your message?</label>
								<textarea id="form_message" class="form-control" name="message" placeholder="Tell us about you and the world" required="required" data-error="Please,leave us a message."></textarea>
								<div class="help-block with-errors"></div>
							</div>

							<button class="custom-btn">
								<span class="custom-btn__label">Send Massage</span>

								<span class="custom-btn__icon">

									<span class="custom-btn__icon-small">
										<!--?xml version="1.0" encoding="utf-8"?-->
										<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 100 100" xml:space="preserve">
											<polygon
												points="33.7,95.8 27.8,90.5 63.9,50 27.8,9.5 33.7,4.2 74.6,50 ">
											</polygon>
										</svg>

									</span>

									<span class="custom-btn__icon-circle">
										<!--?xml version="1.0" encoding="utf-8"?-->
										<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 100 100" xml:space="preserve">
											<path class="bottomcircle"
												d="M18.2,18.2c17.6-17.6,46-17.6,63.6,0s17.6,46,0,63.6s-46,17.6-63.6,0">
											</path>
											<path class="topcircle"
												d="M18.2,18.2c17.6-17.6,46-17.6,63.6,0s17.6,46,0,63.6s-46,17.6-63.6,0">
											</path>
										</svg>

									</span>

								</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact
================================================== -->

</main>