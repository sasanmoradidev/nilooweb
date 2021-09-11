<?php
global $nilooweb;
$options = get_option('nilooweb');
?>


    <!-- Slider Section
================================================== -->
<div class="container-fluid">
		 <section id="slider">
 <div class="slidegrad">
	 <div class="woman">
		 <?php if( get_field('slider') ): ?>
		 <img src="<?php the_field('slider'); ?>" alt=""/>
		 <?php endif; ?>
	 </div>
 </div>
 <div class="vercarousel">
	 <div class="marquee">
		 <div class="marquee--inner">
			 <div class="orbgroup">
			 <?php
				$args = array(
					'post_type' => 'product' ,
					'posts_per_page' => 3,
					'post_status ' => 'publish',
					'offset' => 3,
					'meta_query' => array(
						WC()->query->get_meta_query(),
						 array(
								 'key' => '_stock_status',
								 'value' => 'instock'
						 )
					 )
				);
				$posts = new WP_Query( $args );
					if( $posts->have_posts() ):
						while( $posts->have_posts() ) : $posts->the_post();

						//$thumbnail = get_the_post_thumbnail_url('full');
						?>
						<div class="orb">
							<a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'slidercarousel');?>" alt="<?php echo get_the_title(); ?>"/></a>
						</div>

						<?php endwhile;

					endif;
					// Restore original Post Data
					wp_reset_postdata();

			?>
			</div>
			 <div class="orbgroup">
			 <?php
				$args = array(
					'post_type' => 'product' ,
					'posts_per_page' => 3,
					'post_status ' => 'publish',
					'meta_query' => array(
						WC()->query->get_meta_query(),
						 array(
								 'key' => '_stock_status',
								 'value' => 'instock'
						 )
					 )
				);
				$posts = new WP_Query( $args );
				if( $posts->have_posts() ):
					while( $posts->have_posts() ) : $posts->the_post();
					?>

					<div class="orb">
						<a href="<?php echo get_the_permalink(); ?>">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'slidercarousel');?>" alt="<?php echo get_the_title(); ?>"/>
						</a>
					</div>

					<?php endwhile;
				endif;
				// Restore original Post Data
				wp_reset_postdata();
				?>
			 </div>
		 </div>
	 </div>
 </div>
</section>
</div>
<!-- End Slider Section
================================================== -->

<div class="container-fluid">
		 <section id="Searchbar" class="Searchbar row">
 <div class="w-100">
	 <p><span>شما می‌توانید با استفاده از</br>نام و یا کد محصول جستجو کنید</span></p>
		 <div class="search-box">
			 <div class="search-icon"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.94284 9.38526L2.67419 9.21908L1.94284 9.38526ZM1.94284 5.14089L2.67419 5.30707L1.94284 5.14089ZM13.6011 5.14089L14.3325 4.97471L13.6011 5.14089ZM13.6011 9.38526L12.8698 9.21908L13.6011 9.38526ZM9.82772 13.2806L9.65121 12.5517L9.82772 13.2806ZM5.71622 13.2806L5.53971 14.0095L5.71622 13.2806ZM5.71622 1.24557L5.53971 0.516632L5.71622 1.24557ZM9.82773 1.24557L10.0042 0.516632L9.82773 1.24557ZM14.728 15.5218C15.0162 15.8193 15.491 15.8269 15.7885 15.5387C16.086 15.2505 16.0936 14.7757 15.8054 14.4782L14.728 15.5218ZM2.67419 9.21908C2.38188 7.93263 2.38188 6.59352 2.67419 5.30707L1.21148 4.9747C0.869449 6.47995 0.869449 8.0462 1.21148 9.55145L2.67419 9.21908ZM12.8698 5.30707C13.1621 6.59353 13.1621 7.93263 12.8698 9.21908L14.3325 9.55144C14.6745 8.0462 14.6745 6.47995 14.3325 4.97471L12.8698 5.30707ZM9.65121 12.5517C8.41506 12.851 7.12888 12.851 5.89273 12.5517L5.53971 14.0095C7.00786 14.365 8.53609 14.365 10.0042 14.0095L9.65121 12.5517ZM5.89273 1.9745C7.12888 1.67517 8.41506 1.67517 9.65122 1.9745L10.0042 0.516632C8.53609 0.161122 7.00786 0.161123 5.53971 0.516632L5.89273 1.9745ZM5.89273 12.5517C4.30725 12.1677 3.05259 10.8844 2.67419 9.21908L1.21148 9.55145C1.71145 11.7518 3.3806 13.4867 5.53971 14.0095L5.89273 12.5517ZM10.0042 14.0095C12.1634 13.4867 13.8325 11.7518 14.3325 9.55144L12.8698 9.21908C12.4914 10.8844 11.2367 12.1677 9.65121 12.5517L10.0042 14.0095ZM9.65122 1.9745C11.2367 2.35842 12.4914 3.64178 12.8698 5.30707L14.3325 4.97471C13.8325 2.77439 12.1634 1.03946 10.0042 0.516632L9.65122 1.9745ZM5.53971 0.516632C3.3806 1.03946 1.71145 2.77439 1.21148 4.9747L2.67419 5.30707C3.05259 3.64178 4.30725 2.35842 5.89273 1.9745L5.53971 0.516632ZM11.9668 12.6714L14.728 15.5218L15.8054 14.4782L13.0442 11.6277L11.9668 12.6714Z" fill="white"/>
</svg>
</div>
			 <form action="" class="search-form">
				 <input type="text" placeholder="جستجو..." id="search" autocomplete="off">
			 </form>
			 <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;"
				xml:space="preserve">
			 <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280"/>
			 <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280"/>

		 </svg>
			 <div class="go-icon">

			 </div>
		 </div>
 </div>
</section>
</div>


<div class="container-fluid">
		 <section id="amazing">
				 <div class="title">
						 <h3>فروش ویژه</h3>

						 <a href="<?php echo get_the_permalink(); ?>" class="btn more mybtn">مشاهده همه</a>

				 </div>
				 <div class="box p-0">
						 <div class="owl-carousel owl-theme amazing-slider">

							 <?php
               $args = array(
                  'posts_per_page' => 8,
                  'no_found_rows' => 1,
                  'post_status' => 'publish',
                  'post_type' => 'product',
                  'post__in' => array_merge(array(0), wc_get_product_ids_on_sale()),
                  'meta_query' => array(
                    WC()->query->get_meta_query(),
                     array(
                         'key' => '_stock_status',
                         'value' => 'instock'
                     )
                   )
               );
								$posts = new WP_Query( $args );
								if( $posts->have_posts() ):
									while( $posts->have_posts() ) : $posts->the_post();
									?>

								 <div class="row">
										 <div class="col-sm-5 col-6">
												 <a href="<?php echo get_the_permalink(); ?>">
												 <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'offproducts');?>" width="272" height="354" alt="" /></a>
										 </div>
										 <div class="col-sm-7 col-6">
											 <div class="info">
												 <div>
													 <span class="name"><?php echo get_the_title(); ?></span>
													 <ul class="ul-reset">
														 <li><i class="icon-tick-circle"></i> جنس رویه: بافت</li>
														 <li><i class="icon-tick-circle"></i> جنس زیره: Pu</li>
													 </ul>
												 </div>

												 <div class="price-info">
												 	<?php if(price_off()): ?>
												 	<span class="discount badge badge-danger"><?php echo price_off(); ?></span>
									 				<?php endif; ?>
													 <span class="price"><?php echo get_post_meta( get_the_ID(), '_price', true); ?> <small>تومان</small></br>
													 	<span class="old-price"><?php if(get_post_meta( get_the_ID(), '_regular_price', true)): ?><?php echo get_post_meta( get_the_ID(), '_regular_price', true); ?> <small>تومان</small><?php endif; ?></span>
													 </span>
												 </div>
		 												 <a href="<?php echo get_the_permalink(); ?>" class="btn more mybtn">مشاهده محصول</a>
		 											 </div>
		 										 </div>
		 								 </div>

						 					<?php endwhile;
						 				endif;
						 				// Restore original Post Data
						 				wp_reset_postdata();
						 				?>

						 </div>
				 </div>
		 </section>
 </div>

<?php  get_template_part('templates/mobile/features'); ?>

 <div class="container-fluid">
		 <section class="row mt-4 mb-5" id="brands">
				 <div class="col-md-6 col-sm-6 col-6">
						 <a href="<?php echo $options['instagram']; ?>" class="box b-none d-block text-center text-white insta" target="_blank">
								 <i class="icon-instagram h5 ml-2"></i>
								 <span class="title">
										 صفحه اینستاگرام
								 </span>
						 </a>
				 </div>
		 </section>
 </div>

 <div class="w-100 overflow-hidden">
		 <div class="container-fluid">
				 <section class="row-slider products mb-4">
						 <div class="title mb-3">
								 <h3>جدیدترین محصولات</h3>
								 <a href="<?php the_field('shop'); ?>" class="more mybtn">مشاهده همه</a>
						 </div>
						 <div class="list left-visible">
								 <div class="owl-carousel owl-theme row-slider-carousel">

	 							 <?php
	                $args = array(
	                   'posts_per_page' => 10,
	                   'no_found_rows' => 1,
	                   'post_status' => 'publish',
	                   'post_type' => 'product',
	                   'meta_query' => array(
	                     WC()->query->get_meta_query(),
	                      array(
	                          'key' => '_stock_status',
	                          'value' => 'instock'
	                      )
	                    )
	                );
	 								$posts = new WP_Query( $args );
	 								if( $posts->have_posts() ):
	 									while( $posts->have_posts() ) : $posts->the_post();
	 									?>
										<div class="item">
												<div class="box p-0">
														<a href="<?php echo get_the_permalink(); ?>">

															<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'offproducts');?>" width="304" height="390" alt="">
														</a>

															<div class="tagtitle">
																<div class="title">
																<h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
																<span class="text-center">

																	<span class="price">
																 <?php echo get_post_meta( get_the_ID(), '_price', true); ?> <small>تومان</small>
																	</span>

																</span>


																</div>
																<div class="taglike">
																	<?php if(get_post_meta( get_the_ID(), '_sku', true)): ?><span class="tagcode"><?php echo get_post_meta( get_the_ID(), '_sku', true); ?></span><?php endif; ?>
																	<span class="prolike"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></span>
																</div>
															</div>
												</div>
										</div>

					 					<?php endwhile;
					 				endif;
					 				// Restore original Post Data
					 				wp_reset_postdata();
					 				?>



								 </div>
						 </div>
						 <div class="w-100 allproducts">
							 <a href="<?php the_field('shop'); ?>" class="mybtn">مشاهده تمامی محصولات بروز شده</a>
						 </div>
				 </section>
		 </div>
 </div>

 <div class="container-fluid">
		 <section id="banners" class="pt-4 pb-4 clearfix">
				 <div class="banner mb-2">
					 <?php
					 $cfull = get_field('category_fullwidth');
					 $image = get_field('category_image', 'product_cat_' . $cfull->term_id);
						?>
						 <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo $image; ?>" alt=""></a>
				 </div>
				 <div class="banner mb-2">
					 <?php
					 $cfull = get_field('category_right');
					 $image = get_field('category_image', 'product_cat_' . $cfull->term_id);
						?>
						 <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo $image; ?>" alt=""></a>
				 </div>
				 <div class="banner mb-2">
					 <?php
					 $cfull = get_field('category_left');
					 $image = get_field('category_image', 'product_cat_' . $cfull->term_id);
						?>
						 <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo $image; ?>" alt=""></a>
				 </div>
		 </section>
 </div>

 <div class="container-fluid">
	 <section id="information" class="pb-4">
		 <div class="information w-100">
			 <span class="info"></span>
			 <p>برای استفاده از سایت نیاز به راهنمایی دارید؟</br>می‌توانید از صفحات آموزشی ما استفاده کنید</p>
			 <a href="<?php the_field('learn_page'); ?>"> <span></span> </a>
		 </div>
	 </section>
 </div>
