<?php
global $nilooweb;
$options = get_option('nilooweb');
$smgid = get_field('page_picture');
$footer = get_field('footer');
$imgsrc = wp_get_attachment_image_src($smgid, 'full');
?>
<main class="dsn-grid-color">

	<!-- Header
	================================================== -->
	<header class="header-project content cover-bg ">
		<div class="glitch" data-overlay="7">
			<div class="glitch__img cover-bg " data-image-src="<?php print_r($imgsrc[0]); ?>" data-overlay="7"></div>
		</div>
		<div class="container h-100">
			<div class="row align-items-center h-100">
				<div class="col-12 content text-center">
					<h2 class="content__title2">Ahoo <span>Kheradmand</span></h2>
				</div>
			</div>
		</div>
	</header>
	<!-- End Header
	================================================== -->

	<!-- Hero 
	 ================================================== -->
	<section class="about section-padding" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 offset-lg-1">
					<div class="title-box">
						<h3>About Me</h3>
						<div class="lineStagger"></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-info">
						<?php the_field('first_paragraph'); ?>
					</div>
				</div>

				<div class="col-12" data-aos="fade-up">
					<div class="box-image mt-50">
						<div class="player">
						<video controls	crossorigin playsinline <?php if (get_field('video_poster')){ ?>poster="<?php the_field('video_poster'); ?>"<?php } ?> id="player" >
							<!-- Video files -->
							<source src="<?php the_field('video'); ?>" type="video/mp4" />
							<source src="<?php the_field('video_webm'); ?>" type="video/webm" />
						</video>
					   </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Hero
	================================================== -->

	<!-- Services
	================================================== -->
	<section class="services mb-50" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 offset-lg-1">
					<div class="title-box">
						<h3>Culture</h3>
						<div class="lineStagger"></div>
					</div>
				</div>

				<div class="col-lg-6">
					<?php the_field('second_paragraph'); ?>
				</div>

				<div class="col-lg-10 offset-lg-1" data-aos="fade-up">
					<div class="row">


						<div class="col-lg-6">
							<div class="services-item" data-aos="fade-up">
							<?php if( have_rows('exhibitions') ): ?>
								<h4 class="subtitle"><i class="fa fa-desktop2"></i>Exhibitions</h4>
								<!--<p class="services-text">Whether it be a website, an app or other software, the handling and design have to be intuitive and immersive to be successful.</p>-->
								<ul class="list">
								<?php while ( have_rows('exhibitions') ) : the_row(); ?>
									
									<li>— <?php the_sub_field('exhibition'); ?></li>
									
								<?php endwhile;?>
								</ul>
							<?php endif; ?>
							</div>
						</div>
						
						
						<div class="col-lg-6">
							<div class="services-item" data-aos="fade-up">
							<?php if( have_rows('cinema_activities') ): ?>
								<h4 class="subtitle"><i class="fa fa-desktop2"></i>Cinema Activities</h4>
								<!--<p class="services-text">Whether it be a website, an app or other software, the handling and design have to be intuitive and immersive to be successful.</p>-->
								<ul class="list">
								<?php while ( have_rows('cinema_activities') ) : the_row(); ?>
									
									<li>— <?php the_sub_field('cinema'); ?></li>
									
								<?php endwhile;?>
								</ul>
							<?php endif; ?>
							</div>
						</div>
						
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Services
	================================================== -->

	<!-- Logo Section
	 ================================================== -->
	<!--<div class="dsn-logo  section-padding pt-0" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<ul>
						<li data-aos="fade-up"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/1.png"></li>
						<li data-aos="fade-up"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/2.png"></li>
						<li data-aos="fade-up"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/3.png"></li>
						<li data-aos="fade-up"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/4.png"></li>
						<li data-aos="fade-up"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/5.png"></li>
						<li data-aos="fade-up"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/6.png"></li>
					</ul>
				</div>
			</div>
		</div>
	</div>-->
	<!-- End Logo Section
	================================================== -->


	<!-- Hire Us
	================================================== -->
	<section class="contact-section section-padding" data-aos="fade-up">
		<div class="bg-layer">
			<span class="project-ctrl"></span>
			<span class="line line-1"></span>
			<span class="line line-2"></span>
			<span class="line line-3"></span>
			<span class="line line-4"></span>
			<span class="project-ctrl"></span>
		</div>
		<div class="container">
			<div class="contact-box">
				<div class="box">
					<div class="bg cover-bg" data-image-src="<?php $fimg = wp_get_attachment_image_src($footer['image'], 'full'); echo $fimg[0]; ?>"></div>
					<h2><?php echo $footer['text']; ?></h2>
					<a href="<?php echo $footer['link']; ?>" class="custom-btn">
						<span class="custom-btn__label">Contact Us</span>

						<span class="custom-btn__icon">

							<span class="custom-btn__icon-small">
								<!--?xml version="1.0" encoding="utf-8"?-->
								<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
									xml:space="preserve">
									<polygon points="33.7,95.8 27.8,90.5 63.9,50 27.8,9.5 33.7,4.2 74.6,50 ">
									</polygon>
								</svg>

							</span>

							<span class="custom-btn__icon-circle">
								<!--?xml version="1.0" encoding="utf-8"?-->
								<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
									xml:space="preserve">
									<path class="bottomcircle"
										d="M18.2,18.2c17.6-17.6,46-17.6,63.6,0s17.6,46,0,63.6s-46,17.6-63.6,0">
									</path>
									<path class="topcircle"
										d="M18.2,18.2c17.6-17.6,46-17.6,63.6,0s17.6,46,0,63.6s-46,17.6-63.6,0">
									</path>
								</svg>

							</span>


						</span>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End Hire Us
	================================================== -->

</main>