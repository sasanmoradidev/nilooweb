<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

header_func();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content_archive' );

?>
<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
	<h1 id="plp-title"><?php woocommerce_page_title(); ?></h1>
<?php endif; ?>
<div id="plp-description">
	<div class="row">
		<div class="col-12">
			<div class="plp-description-text plp-promption">
			<?php
			/**
			 * Hook: woocommerce_archive_description.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
			?>
			</div>
		</div>
	</div>
</div>

<?php
if ( woocommerce_product_loop() ) {
?>
<div id="plp-search-sort">
	<div class="search-in-these">
		<form>
			<span class="font-icon icon-search-header"></span>
			<input id="filter-search" placeholder="جستجو در محصولات زیر...">
			<span class="font-icon icon-cancel"></span>
		</form>
	</div>
<?php
	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10 -removed
	 * @hooked woocommerce_result_count - 20 -removed
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	// do_action( 'woocommerce_before_shop_loop' );
	do_action('woocommerce_before_shop_loop_ordering');
?>
</div>

<div id="filter" class=""><fieldset class="filters-fieldset">
<?php
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );
?>
</fieldset></div>
<?php
wp_pagination();

?>
<div class="product_list grid af-product-list row" style="" id="product_list">
<?php
	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'mycontent', 'product' );
		}
	}

	woocommerce_product_loop_end();
?>
</div>

<br clear="all">

<div class="___MyPaginate large">
	<?php

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	// do_action( 'woocommerce_after_shop_loop' );
	wp_pagination();
?>
</div>
<?php
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content_archive' );

footer_func();
