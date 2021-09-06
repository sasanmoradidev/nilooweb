<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<article data-key="0" class="col-4 col-xl-4">
  <div class="product-card">
		<a href="<?php echo get_the_permalink(); ?>" class="product-card-img-link">
			<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop');?>"
        title="بلوز آستین کوتاه زنانه جوتی جینز JootiJeans کد 11733312" alt="بلوز آستین کوتاه زنانه جوتی جینز JootiJeans کد 11733312" class="product-card-img hover-hide"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop');?>"
        title="بلوز آستین کوتاه زنانه جوتی جینز JootiJeans کد 11733312" alt="بلوز آستین کوتاه زنانه جوتی جینز JootiJeans کد 11733312" class="product-card-img hover-show">
				<span class="product-card-over-img"></span>
				<?php if(price_off()): ?><span class="product-card-discount"> <?php echo price_off(); ?></span><?php endif; ?>
      <!--<div class="product-card-size-tag-box"><span class="product-card-size-tag" style="background-color: rgb(0, 191, 111); color: rgb(255, 255, 255);">
          1خرید+ 1هدیه
        </span></div>-->
      <!--<div class="product-card-notify"><span class="font-icon icon-reminder"></span><span>موجود شد خبرم کن</span></div>-->
      <div class="product-card-hover">
        <ul class="product-card-hover-icon">
          <li data-product-id="344461" class="product-card-like"><? echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></li>
        </ul>
        <!---->
      </div>
    </a>
    <p><a href="<?php echo get_the_permalink(); ?>" class="product-card-brand-lastprice">
			<span class="product-card-brand">کد 11733312</span>
			<?php if(get_post_meta( get_the_ID(), '_onsale_price', true)): ?><span class="product-card-lastprice"><?php echo get_post_meta( get_the_ID(), '_regular_price', true); ?> تومان</span><?php endif; ?>
		</a>
    </p>
    <p>
			<a href="<?php echo get_the_permalink(); ?>" class="product-card-name-price">
				<span class="product-card-name"><?php echo get_the_title(); ?></span>
				<span class="product-card-price ">
					<span class="price-disgit"><?php echo get_post_meta( get_the_ID(), '_price', true); ?></span>  تومان
				</span>
					<span class="product-card-not-exist-text"> ناموجود</span>
			</a>
		</p>

  </div>
</article>
