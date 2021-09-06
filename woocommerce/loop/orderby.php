<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="sort-filters-container">
	<div class="d-flex sort-filters">
		<p><span> مرتب‌سازی </span><span class="d-sm-none"> بر اساس </span>:</p>
		<ul>
			<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
				<li<?php echo ((isset($_GET['orderby']) && $_GET['orderby'] == $id ) ? ' class="active"' : ($id == get_option( 'woocommerce_default_catalog_orderby') && !isset($_GET['orderby']))) ? ' class="active"' : ''; ?>>
					<a href="<?php echo get_current_url() . '/?orderby=' . $id ; ?>"><?php echo esc_html( $name ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
