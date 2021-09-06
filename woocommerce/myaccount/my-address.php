<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>

<p>
	<?php echo apply_filters( 'woocommerce_my_account_my_address_description', esc_html__( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</p>

<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
	<div class="u-columns woocommerce-Addresses col2-set addresses">
<?php endif; ?>
<?php foreach ( $get_addresses as $name => $address_title ) : ?>

	<?php
		$address = wc_get_account_formatted_address( $name );
		$col     = $col * -1;
		$oldcol  = $oldcol * -1;
		$customer = new WC_Customer( $customer_id );
?>

<p><?php //print_r(get_user_meta($customer_id)); ?></p>
	<div class="address-list-box">
	  <div class="list-title-link">
	    <p class="profile-title"><?php echo esc_html( $address_title ); ?></p>
	    <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="edit btn-green"><?php echo $address ? esc_html__( 'Edit', 'woocommerce' ) : esc_html__( 'Add', 'woocommerce' ); ?></a>
	  </div>
	  <div class="table-list">
	    <table>
	      <thead>
	        <tr>
	          <th>نام تحویل گیرنده</th>
						<th>تلفن تماس</th>
						<th>کد پستی</th>
	          <th width="40%">آدرس</th>
	        </tr>
	      </thead>
	      <tbody>
	        <tr class="address-item-container">
	          <td><?php echo ($customer->get_display_name()); ?></td>
						<td><?php echo ($customer->get_billing_phone()); ?></td>
						<td><?php echo ($customer->get_billing_postcode()); ?></td>
	          <td width="60%"><?php echo ($customer->get_billing_address_1() . ' ' . $customer->get_billing_address_2()); ?></td>
	        </tr>
	      </tbody>
	    </table>
	  </div>
	</div>

<?php endforeach; ?>

<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
	</div>
	<?php
endif;
