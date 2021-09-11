<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
$product = wc_get_product( get_the_ID() );
$attachment_ids = $product->get_gallery_image_ids();
$imageids[0] = $product->get_image_id();
$id= 1;
foreach($attachment_ids as $attachment_id){
  $imageids[$id++] = $attachment_id;

  // $new = wp_get_attachment_image_src($attachment_id);
  // print_r( $new[0]);
}
// print_r($imageid);
// print_r($imageid);
// wp_get_attachment_image_src();
?>
<div class="swipersingle">
  <div class="product-details-carousel PDP">
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php
        foreach($imageids as $image){
          $url = wp_get_attachment_image_src($image, 'mobileswiper');
          ?>
        <button class="slidebtn swiper-slide">
          <img src="<?php echo $url[0]; ?>" alt="title" style="">
          <span class=""></span>
        </button>
      <?php } ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <?php if(price_off()): ?>
    <span class="swiperoff"><?php echo price_off(); ?></span>
    <?php endif; ?>
    <div class="whishshare">
      <button class="swiperwish"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></button>
      <div class="swiperoffer"><span class=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gift2.svg" class="">پیشنهاد شگفت انگیز</span></div>
      <button id="share-button" class="swipershare"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/share-2.svg" alt="اشتراک گذاری" class=""></button>
    </div>
  </div>
</div>
<div class="sc-cCbPEh bWhAkr">
  <div class="sc-bmyXtO iRibwo">
    <div class="sc-hzNEM fpXarf txt-right">
      <h1 class="sc-eklfrZ hzitJz"><?php if(get_post_meta( get_the_ID(), '_sku', true)) : echo 'کد محصول: ' . get_post_meta( get_the_ID(), '_sku', true); else: echo '<span>کد ثبت نشده است</span>'; endif; ?></h1>
      <h1 class="sc-csSMhA krPSJi"><?php echo get_the_title(); ?></h1>
    </div>
    <div class="sc-hzNEM fpXarf txt-left">
      <?php do_action('mobile_add_to_cart_price'); ?>
    </div>
  </div>
  <?php if($product->is_in_stock()){ ?>
      <?php do_action('mobile_add_to_cart'); ?>
  <?php } else { ?>
  <div class="outofstockimg">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sold_out.png" alt="out of stock">
  </div>
  <?php } ?>
</div>

<?php get_template_part('templates/mobile/features'); ?>
<?php wc_get_template( 'single-product/tabs/mobiletabs.php' ); ?>
<?php do_action('custom_related_section'); ?>
