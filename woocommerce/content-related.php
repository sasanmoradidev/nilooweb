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
<div class="item">
   <div class="product-card">
    <a href="<?php echo get_the_permalink(); ?>" class="product-card-img-link">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="product-card-img hover-hide">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="product-card-img hover-show">
    <span class="product-card-over-img"></span><span class="product-card-discount"><?php echo '%'.price_off(); ?> </span></a>
    <div class="product-card-hover">
     <ul class="product-card-hover-icon">
      <li class="product-card-like" data-product-id="227481"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></li>
      <li class="product-card-detail"><span class="font-icon icon-active-display-pass"></span></li>
     </ul>
     <ul class="product-card-color">
      <li class="active"><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop_thumb');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a></li>
      <li><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop_thumb');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a></li>
      <li><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'products_desktop_thumb');?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a></li>
     </ul>
    </div>
    <p><a href="<?php echo get_the_permalink(); ?>" class="product-card-name-price"><span class="product-card-name"><?php echo get_the_title(); ?></span><span class="product-card-lastprice"><?php echo get_post_meta( get_the_ID(), '_regular_price', true); ?> تومان</span></a></p>
    <p><a href="<?php echo get_the_permalink(); ?>" class="product-card-name-price"><span class="product-card-name"></span><span class="product-card-price"><?php echo get_post_meta( get_the_ID(), '_price', true); ?> تومان</span></a></p>
    <ul class="product-card-size">
     <!-- <li><a href="<?php echo get_the_permalink(); ?>">تک سایز</a></li> -->
    </ul>
   </div>
</div>
