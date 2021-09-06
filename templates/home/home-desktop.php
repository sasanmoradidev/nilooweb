<?php
global $nilooweb;
$options = get_option('nilooweb');
$site_title = get_bloginfo( 'name' );

?>
<!--start full slider -->
<div class="owl-fullSlider">
  <div class="owl-fullSlider">
    <button class="owl-next">
          <span class="font-icon icon-arrow-left-pdp"></span>
      </button>
    <div class="owl-carousel owl-fullSlider owl-theme">
      <?php
      $images = get_field('desktop_slider');
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      if( $images ): ?>
        <?php foreach( $images as $image_id ): ?>
          <div class="item">
            <a href="/1268/جشنواره-فروش-2-خرید-2-هدیه">
            <?php echo wp_get_attachment_image( $image_id, $size ); ?>
            </a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
    <button class="owl-prev">
    	<span class="font-icon icon-arrow-left-pdp"></span>
    </button>
  </div>
</div>


<!--start features-->
<div id="feature">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="feature-box">
                    <div class="feature-box-img">
                        <a href="content/1/delivery">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/icon/delivery.svg" alt="ارسال سریع و رایگان" title="ارسال سریع و رایگان">
                                </a>
                    </div>
                    <p class="feature-title">
                        <a href="content/1/delivery">ارسال سریع و رایگان</a>
                    </p>
                    <p>
                        <a href="content/1/delivery">ارسال رایگان برای خریدهای بالای 300 هزار تومان و در زمان انتخابی مشتری به سریعترین شکل ممکن می‌باشد.</a>
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="feature-box">
                    <div class="feature-box-img">
                        <a href="content/2/legal-notice">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/icon/originality.svg" alt="ضمانت اصالت" title="ضمانت اصالت">
                                </a>
                    </div>
                    <p class="feature-title">
                        <a href="content/2/legal-notice">ضمانت اصالت</a>
                    </p>
                    <p>
                        <a href="content/2/legal-notice">تمامی کالاها اورجینال و با ضمانت اصل بودن از نمایندگی معتبر تهیه و ارائه می‌شوند.</a>
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="feature-box">
                    <div class="feature-box-img">
                        <a href="content/3/terms-and-conditions-of-use">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/icon/warranty.svg?ver=2" alt="ضمانت بازگشت کالا" title="ضمانت بازگشت کالا">
                                </a>
                    </div>
                    <p class="feature-title">
                        <a href="content/3/terms-and-conditions-of-use">ضمانت بازگشت کالا</a>
                    </p>
                    <p>
                        <a href="content/3/terms-and-conditions-of-use">تا 15 روز برای احترام به انتخاب مشتریان کالای خریداری شده برگردانده می‌شود.</a>
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="feature-box">
                    <div class="feature-box-img">
                        <a href="content/8/banimode-features">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/icon/support.svg" alt="خدمات پس از فروش" title="خدمات پس از فروش">
                                </a>
                    </div>
                    <p class="feature-title">
                        <a href="content/8/banimode-features">خدمات پس از فروش</a>
                    </p>
                    <p>
                        <a href="content/8/banimode-features">میزبان صدای گرمتان هستیم. هدف تیم پشتیبانی بانی مد تلاش با تمام قوا برای ارائه بهترین خدمات به مشتریان عزیز می باشد.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--start on sales section-->
<div id="home-amazing" class="FlashSalesCarousel" data-api="products/flash-sales?platform=desktop">
    <div id="home-amazing-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="part-title text-right"><a href="/flashsales">فروش ویژه</a></p>
                </div>
                <!--<div class="col-6">
                    <span id="timer-title">زمان باقی مانده تا پایان سفارش</span>
                    <span id="timer" data-seconds=""></span>
                </div>-->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="owl-product">
            <button class="owl-next">
                    <span class="font-icon icon-arrow-left-pdp"></span>
                </button>
            <div class="owl-carousel owl-product owl-theme">
              <?php
       				$args = array(
       					'post_type' => 'product' ,
       					'posts_per_page' => 8,
       					'post_status ' => 'publish',
       				);
       				$posts = new WP_Query( $args );
       					if( $posts->have_posts() ):

       						while( $posts->have_posts() ) : $posts->the_post();
                  //$thumbnail = get_the_post_thumbnail_url('full');
                  $product = wc_get_product( get_the_ID() );
       						?>

                  <div class="item">
              		   <div class="product-card">
              			  <a href="<?php echo get_the_permalink(); ?>" class="product-card-img-link">
              			  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="product-card-img hover-hide">
              			  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="product-card-img hover-show">
              			  <span class="product-card-over-img"></span>
                      <?php if(price_off()){ ?>
                      <span class="product-card-discount"><?php echo '%'.price_off(); ?> </span>
                      <?php } ?>
                    </a>
              			  <div class="product-card-hover">
              				 <ul class="product-card-hover-icon">
              					<li class="product-card-like" data-product-id="227481"><? echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></li>
              					<li class="product-card-detail"><span class="font-icon icon-active-display-pass"></span></li>
              				 </ul>
              				 <ul class="product-card-color">
              					<li class="active"><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop_thumb');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a></li>
              					<li><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop_thumb');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a></li>
              					<li><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop_thumb');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a></li>
              				 </ul>
              			  </div>
              			  <p><a href="#" class="product-card-brand-lastprice"><span class="product-card-brand">Deco</span><span class="product-card-lastprice"><?php echo get_post_meta( get_the_ID(), '_regular_price', true); ?> تومان</span></a></p>
              			  <p><a href="#" class="product-card-name-price"><span class="product-card-name"><?php echo get_the_title(); ?></span><span class="product-card-price"><?php echo get_post_meta( get_the_ID(), '_price', true); ?> تومان</span></a></p>
              			  <ul class="product-card-size">
              				 <li><a href="#"><?php echo $product->get_price_html(); ?></a></li>
              			  </ul>
              		   </div>
              		</div>

       						<?php endwhile;

       					endif;
       					// Restore original Post Data
       					wp_reset_postdata();

       			?>



            </div>
            <button class="owl-prev">
                <span class="font-icon icon-arrow-left-pdp"></span>
            </button>
        </div>
    </div>
    <div class="container">
        <a href="<?php the_field('shop'); ?>" class="see-all">مشاهده همه</a>
    </div>

</div>




<!--start four-->
<div class="container banner">
  <div class="row mb-30">
    <div class="col-md-4">
    <?php
    $cfull = get_field('category_left');
    $image = get_field('category_image', 'product_cat_' . $cfull->term_id);
     ?>
    	<a href="<?php echo get_term_link($cfull->slug, 'product_cat'); ?>">
    		<img src="<?php echo $image; ?>" class="radius-16" alt="<?php echo $cfull->name; ?>" title="<?php echo $cfull->name; ?>">
    	</a>
    </div>
    <div class="col-md-8">
    <?php
    $cfull = get_field('category_fullwidth');
    $image = get_field('category_image', 'product_cat_' . $cfull->term_id);
     ?>
    	<a href="<?php echo get_term_link($cfull->slug, 'product_cat'); ?>">
    		<img src="<?php echo $image; ?>" class="radius-16" alt="<?php echo $cfull->name; ?>" title="<?php echo $cfull->name; ?>">
    	</a>
    </div>
  </div>
  <div class="row mb-30">
    <div class="col-md-8">
    <?php
    $cfull = get_field('category_fullwidth');
    $image = get_field('category_image', 'product_cat_' . $cfull->term_id);
     ?>
    	<a href="<?php echo get_term_link($cfull->slug, 'product_cat'); ?>">
    		<img src="<?php echo $image; ?>" class="radius-16" alt="<?php echo $cfull->name; ?>" title="<?php echo $cfull->name; ?>">
    	</a>
    </div>
    <div class="col-md-4">
    <?php
    $cfull = get_field('category_right');
    $image = get_field('category_image', 'product_cat_' . $cfull->term_id);
     ?>
    	<a href="<?php echo get_term_link($cfull->slug, 'product_cat'); ?>">
    		<img src="<?php echo $image; ?>" class="radius-16" alt="<?php echo $cfull->name; ?>" title="<?php echo $cfull->name; ?>">
    	</a>
    </div>
  </div>
</div>


<!--start product owl-->
<div class="owl ProductsCarousel" data-api="products/suggestion?platform=desktop">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="part-title text-center">پیشنهاد مدلایت</p>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="recent-product owl-product">
        <button class="owl-next">
            <span class="font-icon icon-arrow-left-pdp"></span>
        </button>
        <div class="recent-product owl-carousel owl-theme">

        <?php
        $args = array(
          'post_type' => 'product' ,
          'posts_per_page' => 8,
          'post_status ' => 'publish',
        );
        $posts = new WP_Query( $args );
          if( $posts->have_posts() ):
            while( $posts->have_posts() ) : $posts->the_post();
            //$thumbnail = get_the_post_thumbnail_url('full');
            ?>

            <div class="item">
               <div class="product-card">
                <a href="<?php echo get_the_permalink(); ?>" class="product-card-img-link">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="product-card-img hover-hide">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="product-card-img hover-show">
                <span class="product-card-over-img"></span>
                <?php if(price_off()){ ?>
                <span class="product-card-discount"><?php echo '%'.price_off(); ?> </span>
                <?php } ?>
                </a>
                <div class="product-card-hover">
                 <ul class="product-card-hover-icon">
                  <li class="product-card-like" data-product-id="227481"><? echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></li>
                  <li class="product-card-detail"><span class="font-icon icon-active-display-pass"></span></li>
                 </ul>
                 <ul class="product-card-color">
                  <li class="active"><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop_thumb');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a></li>
                  <li><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop_thumb');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a></li>
                  <li><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop_thumb');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a></li>
                 </ul>
                </div>
                <p><a href="#" class="product-card-brand-lastprice"><span class="product-card-brand">Deco</span><span class="product-card-lastprice"><?php echo get_post_meta( get_the_ID(), '_regular_price', true); ?> تومان</span></a></p>
                <p><a href="#" class="product-card-name-price"><span class="product-card-name"><?php echo get_the_title(); ?></span><span class="product-card-price"><?php echo get_post_meta( get_the_ID(), '_price', true); ?> تومان</span></a></p>
                <ul class="product-card-size">
                 <li><a href="#">تک سایز</a></li>
                </ul>
               </div>
            </div>

            <?php endwhile;

          endif;
          // Restore original Post Data
          wp_reset_postdata();

          ?>


        </div>
          <button class="owl-prev">
              <span class="font-icon icon-arrow-left-pdp"></span>
          </button>
      </div>
    </div>
    <div class="container">
        <a href="<?php the_field('shop'); ?>" class="see-all">مشاهده همه</a>
    </div>
</div>

<div id="home-mode-suggest" class="BaniBlog" data-api="blog-post">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="part-title text-center">اخبار مدلایت</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="owl-mode-suggest">
          <button class="owl-next">
          	<span class="font-icon icon-arrow-left-pdp"></span>
          </button>

        <div class="owl-mode-suggest owl-carousel owl-theme">

            <?php
            $args = array(
              'post_type' => 'post' ,
              'posts_per_page' => 8,
              'post_status ' => 'publish',
            );
            $posts = new WP_Query( $args );
              if( $posts->have_posts() ):
                while( $posts->have_posts() ) : $posts->the_post();
                //$thumbnail = get_the_post_thumbnail_url('full');
                ?>

            		<div class="item">
            		   <a href="<?php echo get_the_permalink(); ?>" target="_blank">
                     <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog_desktop');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                   </a>
            		   <p><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
            		</div>

                <?php endwhile;

              endif;
              // Restore original Post Data
              wp_reset_postdata();

          ?>

      	</div>

        <button class="owl-prev">
      		<span class="font-icon icon-arrow-left-pdp"></span>
      	</button>
      </div>
    </div>
    <div class="container">
        <a href="blog" class="see-all" target="_blank">مشاهده همه</a>
    </div>
</div>
