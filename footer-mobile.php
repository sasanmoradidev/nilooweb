<?php $options = get_option('nilooweb');
global $nilooweb; ?>


<!-- Footer
================================================== -->
 <div class="container-fluid">
	 <section class="pb-4">
		 <a href="#"><div class="upward"></div></a>
	 </section>
 </div>
 <div class="container-fluid">
	 <section class="row footer">
		 <div class="col-12 phonebar">
			 <span>میزبان صدای گرمتان هستیم</span>
			 <a href="tel:<?php echo $options['phone']; ?>"><span><?php echo $options['phone']; ?></span></a>
		 </div>
		 <div class="col-12 footerabout">
			 <h5><?php echo $options['copyrighttitle']; ?></h5>
			 <p><?php echo $options['copyrightdesc']; ?></p>
		 </div>
		 <div class="logobar">
			 <div class="logo">

			 </div>
			 <div class="logo">

			 </div>
			 <div class="logo">

			 </div>
			 <div class="logo">

			 </div>
		 </div>
	 </section>
 </div>
 <!-- End Footer
 ================================================== -->

 <!-- ================================================== -->
<!-- Footer sticky menu -->

<footer class="c-footer" data-v-55f370e0="" data-v-5dfe8dae="">
	<div class="c-fix-footer" data-v-55f370e0="">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer.svg" alt="" data-v-55f370e0="">
			<div class="c-fix-footer__call" data-v-55f370e0="">
				<a href="<?php echo wc_get_cart_url(); ?>" data-v-55f370e0="">
					<i class="icon-cart2" data-v-55f370e0=""></i>
				</a>
			</div>
			<div class="c-fix-footer_nav" data-v-55f370e0="">
				<div class="c-fix-footer_nav_item" data-v-55f370e0="">
					<a href="<?php echo get_bloginfo('url'); ?>" data-v-55f370e0="" class="">
						<i class="icon-home" data-v-55f370e0=""></i>
								خانه
					</a>
					<span data-v-55f370e0="">
						<i class="icon-bars mainMenu" data-v-55f370e0=""></i>
							منو
          </span>
        </div>
				<div class="c-fix-footer_nav_item" data-v-55f370e0="">
					<a href="#" data-v-55f370e0="" class="">
						<i class="icon-breaking" data-v-55f370e0=""></i>
						علاقه‌مندی
					</a>
					<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>" class="c-fix profile" data-v-55f370e0="">
						<i class="icon-cart-2" data-v-55f370e0=""></i>
						<span>پروفایل</span>
					</a>
				</div>
			</div>
		</div>
</footer>
<!-- End Footer
================================================== -->
<section id="mobile_search" class="">
		<div class="box b-none r-none title clearfix">
				<span class="close-detail h5" id="close-search"><i class="icon-hide"></i> &nbsp; جستجو</span>
		</div>
		<div class="p-3">
				<form action="/products" method="get">
						<input type="search" class="form-control" name="title" placeholder="محصول مورد نظر را جستجو کنید ...">
						<button type="submit" class="btn">
								<i class="icon-search"></i>
						</button>
				</form>
		</div>
</section>

</div>
<div class="d-none">
<nav id="menu">
		<ul>
				<li class="avatar">
						<a href="#" rel="nofollow">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.png" />
										<h5 class="main-font">حساب کاربری</h5>
										<h6 class="main-font">وارد شوید</h6>
								</a>


				</li>

				<li><a href="/"><i class="icon-home-mobile"></i> صفحه نخست</a></li>
				<li>
						<span> <i class="icon-support-mobile"></i> پشتیبانی</span>
						<ul>
								<li>
										<a href="/support/consult">
												درخواست مشاوره
										</a>
								</li>
								<li>
										<a href="/support/why-us">
												چرا از ما بخرید
										</a>
								</li>
								<li>
										<a href="/support/faq">
												سوالات متداول
										</a>
								</li>
								<li>
										<a href="/support/return-policy">
												قوانین بازگشت کالا
										</a>
								</li>

								<li>
										<a href="/support/guarantee-request">
												ثبت درخواست گارانتی
										</a>
								</li>
								<li>
										<a href="/support/guarantee-tracking">
												پیگیری درخواست گارانتی
										</a>
								</li>
								<li>
										<a href="/support/tracking">
												پیگیری سفارش
										</a>
								</li>
								<li>
										<a href="/support/submit-pay">
												ثبت اطلاعات پرداخت
										</a>
								</li>

						</ul>
				</li>
				<li>
						<span><i class="icon-diamond"></i> درباره</span>
						<ul>
								<li><a href="/Page/aboutus">درباره ما</a></li>
								<li><a href="/Page/contactus">تماس با ما</a></li>
								<li><a href="/Page/jobs">فرصت های شغلی</a></li>
						</ul>
				</li>
				<li><a href="/cart"><i class="icon-shop-2"></i> سبد خرید</a></li>
		</ul>
</nav>

<div class="container-fluid">
		<nav id="categories">
      <?php
      //Top Menu
      if (has_nav_menu('main')) {
        $defaults = array(
        'theme_location'  => 'category',
        // 'container'       => '',
        // 'menu_class'      => '',
        'echo'            => true,
        // 'fallback_cb'     => 'wp_page_menu',
        // 'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        // 'depth'           => 2,
        'walker' => new IBenic_Walker2(),
        );
        wp_nav_menu( $defaults );
      }
      ?>
		</nav>
</div>
</div>

<?php wp_footer() ?>
</body>
</html>
