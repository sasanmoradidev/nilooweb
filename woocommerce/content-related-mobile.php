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
$image = $product->get_image_id();
$url = wp_get_attachment_image_src($image, 'mobilerelated');
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$product = wc_get_product( get_the_ID() );
?>
<div class="sc-cHSUfg fZJGnm swiper-slide siwper-product">
  <div class="sc-dEfkYy dvtKkU plp-card">
    <div class="sc-cqPOvA dXufJL">
      <a class="product-card-image-box" href="<?php echo get_the_permalink(); ?>">
        <img src="<?php echo $url[0]; ?>" alt="<?php echo get_the_title(); ?>" class="sc-gNJABI jIDRDg" style="">
        <span class="sc-eNNmBn kSTxnN"></span>
      </a>
      <button class="sc-jdfcpN cJFTDt wishlist">
        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
      </button>
      <?php if(price_off()): ?>
      <span class="sc-iCwjlJ gPuiBK"><?php echo price_off(); ?></span>
    <?php endif; ?>
    </div>
    <div class="sc-fjhmcy hXVtpd">
      <h4 class="sc-lnmtFM fwJMKr">
        <a title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
      </h4>
      <div class="sc-FQuPU cfOivQ clearfix">
        <?php echo $product->get_price_html(); ?>
      </div>
    </div>
  </div>
</div>
