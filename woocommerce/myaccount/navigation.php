<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );

$customer_id = get_current_user_id();
$customer = new WC_Customer( $customer_id );

?>
<div class="col-md-3">
	<div id="profile-sidebar">
		<div class="profile-user-info">
      <img src="https://www.banimode.com/assets/img/profile/gender-male.png" id="avatar">
      <div class="profile-user-info-txt">
          <p class="profile-user-info-name" id="name"><?php echo ($customer->get_display_name()); ?></p>
          <p class="profile-user-info-phone" id="mobile"><?php echo ($customer->get_billing_phone()); ?></p>
      </div>
    </div>
		<div id="profile-wallet-amount" style="display: block;">
      <span>اعتبار کیف پول:</span>
      <span class="font-16">0  تومان  </span>
    </div>
		<ul>
			<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
				<li >
					<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>"><span><?php echo esc_html( $label ); ?></span></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
