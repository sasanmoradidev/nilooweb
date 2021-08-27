<?php
/**
WooCommerce
**/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="woomain">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_filter( 'woocommerce_variation_is_active', 'bbloomer_grey_out_variations_out_of_stock', 10, 2 );

function bbloomer_grey_out_variations_out_of_stock( $is_active, $variation ) {
    if ( ! $variation->is_in_stock() ) return false;
    return $is_active;
}

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function wc_get_gallery_image_html_custom( $attachment_id, $main_image = false ) {
  $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
  $gallery_thumbnail = wc_get_image_size( 'wc_single_thumb' );
  $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
  $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
  $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
  $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
  $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
  $alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
  $image             = wp_get_attachment_image(
    $attachment_id,
    $image_size,
    false,
    apply_filters(
      'woocommerce_gallery_image_html_attachment_image_params',
      array(
        'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
        'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
        'data-src'                => esc_url( $full_src[0] ),
        'data-large_image'        => esc_url( $full_src[0] ),
        'data-large_image_width'  => esc_attr( $full_src[1] ),
        'data-large_image_height' => esc_attr( $full_src[2] ),
        'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
      ),
      $attachment_id,
      $image_size,
      $main_image
    )
  );

  return '<div class="item">' . $image . '</div>';
}
function wc_get_gallery_image_html_custom_dots( $attachment_id, $main_image = false ) {
  $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
  $gallery_thumbnail = wc_get_image_size( 'wc_single_thumb' );
  $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
  $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
  $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
  $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
  $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
  $alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
  $image             = wp_get_attachment_image(
    $attachment_id,
    $image_size,
    false,
    apply_filters(
      'woocommerce_gallery_image_html_attachment_image_params',
      array(
        'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
        'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
        'data-src'                => esc_url( $full_src[0] ),
        'data-large_image'        => esc_url( $full_src[0] ),
        'data-large_image_width'  => esc_attr( $full_src[1] ),
        'data-large_image_height' => esc_attr( $full_src[2] ),
        'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
      ),
      $attachment_id,
      $image_size,
      $main_image
    )
  );

  return '<button class="owl-dot" role="button">' . $image . '<span class="overlay"></span></button>';
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

add_action('woocommerce_single_product_name_share', 'woocommerce_template_single_title', 10);
// add_action('woocommerce_single_product_name_share', 'woocommerce_template_single_sharing', 20);
function woocommerce_whishlisticon(){
  echo '<div class="product-share">';

  echo do_shortcode('[yith_wcwl_add_to_wishlist]');
  woocommerce_template_single_sharing();

  echo '</div>';

}
add_action('woocommerce_single_product_name_share', 'woocommerce_whishlisticon', 30);
/**
related products functions
*/
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('custom_related_section', 'woocommerce_output_related_products', 10);

function woocommerce_output_related_products() {

    $args = array(
        'posts_per_page' => 4,
        'columns' => 4,
        'orderby' => 'rand',
 );

    woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}

function woocommerce_get_product_thumbnail( $size = 'products_desktop', $deprecated1 = 0, $deprecated2 = 0 ) {
    global $post;
    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    if ( has_post_thumbnail() ) {
        $props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
        return get_the_post_thumbnail( $post->ID, $image_size, array(
            'title' => $props['title'],
            'alt' => $props['alt'],
 ) );
    } elseif ( wc_placeholder_img_src() ) {
        return wc_placeholder_img( $image_size );
    }
}
?>
