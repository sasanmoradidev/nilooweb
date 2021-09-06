<?php
 header_func();
$options = get_option( 'nilooweb' );
?>
<?php
$args = array(
		'delimiter' => '',
		'wrap_before' => '',
		'wrap_after' => ''
);
woocommerce_breadcrumb( $args );
?>

<?php woocommerce_content(); ?>

<?php
	footer_func();
?>
