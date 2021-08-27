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
				<ul>
						<li>
								<a href="/category/31/مردانه"><i class="icon-man"></i>   مردانه</a>
								<ul>
										<li>
												<a href="/Products?category=32">پوشاک مردانه</a>
												<ul>
														<li>
																<a href="/Products?category=670">
																				ست دونفره
																		</a>
														</li>
														<li>
																<a href="/Products?category=44">
																				ست مردانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=43">
																				بافت
																		</a>
														</li>
														<li>
																<a href="/Products?category=48">
																				سویشرت و دورس
																		</a>
														</li>
														<li>
																<a href="/Products?category=49">
																				شلوار و شلوارک
																		</a>
														</li>
														<li>
																<a href="/Products?category=46">
																				تیشرت و پولوشرت
																		</a>
														</li>
														<li>
																<a href="/Products?category=45">
																				پیراهن
																		</a>
														</li>
														<li>
																<a href="/Products?category=47">
																				کت و کاپشن
																		</a>
														</li>
														<li>
																<a href="/Products?category=50">
																				لباس محرم
																		</a>
														</li>
														<li>
																<a href="/Products?category=698">
																				ماسک
																		</a>
														</li>
														<li>
																<a href="/Products?category=675">
																				کلاه
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=68">ورزشی</a>
												<ul>
														<li>
																<a href="/Products?category=69">
																				کوله و ساک ورزشی
																		</a>
														</li>
														<li>
																<a href="/Products?category=70">
																				لوازم هواداری
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=55">کفش مردانه</a>
												<ul>
														<li>
																<a href="/Products?category=57">
																				کفش ورزشی مردانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=58">
																				کفش رسمی مردانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=56">
																				نیم بوت مردانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=679">
																				صندل مردانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=680">
																				کفش روزمره مردانه
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=63">کیف مردانه</a>
												<ul>
														<li>
																<a href="/Products?category=65">
																				کیف پول
																		</a>
														</li>
														<li>
																<a href="/Products?category=64">
																				ست چرمی
																		</a>
														</li>
														<li>
																<a href="/Products?category=66">
																				کیف دوشی
																		</a>
														</li>
														<li>
																<a href="/Products?category=67">
																				کیف اداری
																		</a>
														</li>
														<li>
																<a href="/Products?category=695">
																				فولدر چرمی
																		</a>
														</li>
														<li>
																<a href="/Products?category=681">
																				کوله پشتی
																		</a>
														</li>
												</ul>
										</li>

								</ul>
						</li>
						<li>
								<a href="/category/33/زنانه"><i class="icon-scientist-woman"></i>   زنانه</a>
								<ul>
										<li>
												<a href="/Products?category=35">پوشاک زنانه</a>
												<ul>
														<li>
																<a href="/Products?category=670">
																				ست دونفره
																		</a>
														</li>
														<li>
																<a href="/Products?category=36">
																				بافت
																		</a>
														</li>
														<li>
																<a href="/Products?category=37">
																				تیشرت و تونیک
																		</a>
														</li>
														<li>
																<a href="/Products?category=40">
																				سویشرت
																		</a>
														</li>
														<li>
																<a href="/Products?category=39">
																				ست زنانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=41">
																				شلوار
																		</a>
														</li>
														<li>
																<a href="/Products?category=42">
																				مانتو
																		</a>
														</li>
														<li>
																<a href="/Products?category=38">
																				شال و روسری
																		</a>
														</li>
														<li>
																<a href="/Products?category=676">
																				کاپشن
																		</a>
														</li>
														<li>
																<a href="/Products?category=683">
																				پیراهن و لباس مجلسی زنانه
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=51">کفش زنانه</a>
												<ul>
														<li>
																<a href="/Products?category=53">
																				کتانی
																		</a>
														</li>
														<li>
																<a href="/Products?category=54">
																				صندل
																		</a>
														</li>
														<li>
																<a href="/Products?category=52">
																				نیم بوت
																		</a>
														</li>
														<li>
																<a href="/Products?category=684">
																				بوت
																		</a>
														</li>
														<li>
																<a href="/Products?category=699">
																				ورزشی
																		</a>
														</li>
														<li>
																<a href="/Products?category=700">
																				راحتی
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=59">کیف زنانه</a>
												<ul>
														<li>
																<a href="/Products?category=62">
																				کیف پول
																		</a>
														</li>
														<li>
																<a href="/Products?category=60">
																				کیف دوشی
																		</a>
														</li>
														<li>
																<a href="/Products?category=61">
																				کیف اداری
																		</a>
														</li>
														<li>
																<a href="/Products?category=688">
																				کیف لوازم آرایش
																		</a>
														</li>
														<li>
																<a href="/Products?category=673">
																				ست چرمی
																		</a>
														</li>
												</ul>
										</li>

								</ul>
						</li>
						<li>
								<a href="/category/697/بچگانه"><i class=""></i>   بچگانه</a>
								<ul>
										<li>
												<a href="/Products?category=686">پوشاک بچگانه</a>
												<ul>
														<li>
																<a href="/Products?category=701">
																				ست بچگانه
																		</a>
														</li>
												</ul>
										</li>

								</ul>
						</li>
						<li>
								<a href="/category/10/اکسسوری"><i class="icon-pearl-necklace"></i>   اکسسوری</a>
								<ul>
										<li>
												<a href="/Products?category=20">ساعت مچی عقربه ای</a>
												<ul>
														<li>
																<a href="/Products?category=21">
																				ساعت مچی عقربه ای زنانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=22">
																				ساعت مچی عقربه ای مردانه
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=27">عینک</a>
												<ul>
														<li>
																<a href="/Products?category=29">
																				عینک آفتابی مردانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=28">
																				عینک آفتابی زنانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=696">
																				عینک روزمره
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=23">ست ساعت مچی</a>
												<ul>
												</ul>
										</li>
										<li>
												<a href="/Products?category=11">زیورآلات</a>
												<ul>
														<li>
																<a href="/Products?category=13">
																				دستبند
																		</a>
														</li>
														<li>
																<a href="/Products?category=12">
																				انگشتر
																		</a>
														</li>
														<li>
																<a href="/Products?category=14">
																				ست زیورآلات
																		</a>
														</li>
														<li>
																<a href="/Products?category=15">
																				گردنبند
																		</a>
														</li>
														<li>
																<a href="/Products?category=16">
																				گوشواره
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=17">ساعت مچی دیجیتال</a>
												<ul>
														<li>
																<a href="/Products?category=18">
																				ساعت مچی دیجیتال زنانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=19">
																				ساعت مچی دیجیتال مردانه
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=24">گجت پوشیدنی</a>
												<ul>
														<li>
																<a href="/Products?category=25">
																				ساعت هوشمند
																		</a>
														</li>
														<li>
																<a href="/Products?category=26">
																				مچ بند هوشمند
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=692">عطر و ادکلن</a>
												<ul>
														<li>
																<a href="/Products?category=693">
																				عطر و ادکلن زنانه
																		</a>
														</li>
														<li>
																<a href="/Products?category=694">
																				عطر و ادکلن مردانه
																		</a>
														</li>
												</ul>
										</li>

								</ul>
						</li>
						<li>
								<a href="/Products?category=30"><i class="icon-desktop"></i>   دیجیتال</a>
								<ul>
										<li>
												<a href="/Products?category=661">لوازم جانبی</a>
												<ul>
														<li>
																<a href="/Products?category=662">
																				اسپیکر
																		</a>
														</li>
														<li>
																<a href="/Products?category=663">
																				نگهدارنده موبایل
																		</a>
														</li>
														<li>
																<a href="/Products?category=664">
																				پاور بانک
																		</a>
														</li>
														<li>
																<a href="/Products?category=665">
																				مونوپاد
																		</a>
														</li>
														<li>
																<a href="/Products?category=666">
																				شارژر
																		</a>
														</li>
														<li>
																<a href="/Products?category=667">
																				هندزفری
																		</a>
														</li>
														<li>
																<a href="/Products?category=668">
																				هدفون
																		</a>
														</li>
														<li>
																<a href="/Products?category=669">
																				سرگرمی
																		</a>
														</li>
												</ul>
										</li>

								</ul>
						</li>
						<li>
								<a href="/category/1/لوازم-خانه"><i class="icon-sofa"></i>   لوازم خانه</a>
								<ul>
										<li>
												<a href="/Products?category=2">دکوراسیون</a>
												<ul>
														<li>
																<a href="/Products?category=3">
																				آینه دکوراتیو
																		</a>
														</li>
														<li>
																<a href="/Products?category=4">
																				تابلو
																		</a>
														</li>
														<li>
																<a href="/Products?category=5">
																				آباژور
																		</a>
														</li>
														<li>
																<a href="/Products?category=652">
																				دیوار کوب
																		</a>
														</li>
														<li>
																<a href="/Products?category=677">
																				لوازم تزئینی
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=6">ساعت دیواری</a>
												<ul>
														<li>
																<a href="/Products?category=7">
																				ساعت آینه ای
																		</a>
														</li>
														<li>
																<a href="/Products?category=8">
																				ساعت چوبی
																		</a>
														</li>
														<li>
																<a href="/Products?category=9">
																				ساعت پلکسی
																		</a>
														</li>
														<li>
																<a href="/Products?category=651">
																				ساعت چرمی
																		</a>
														</li>
												</ul>
										</li>
										<li>
												<a href="/Products?category=678">مواد غذایی</a>
												<ul>
												</ul>
										</li>
										<li>
												<a href="/Products?category=682">لوازم کاربردی</a>
												<ul>
												</ul>
										</li>

								</ul>
						</li>

				</ul>
		</nav>
</div>
</div>

<?php wp_footer() ?>
</body>
</html>
