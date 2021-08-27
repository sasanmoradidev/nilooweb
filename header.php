<?php
    /**
     * The template for displaying the header
     *
     */

global $nilooweb;
$options = get_option('nilooweb');
$site_title = get_bloginfo( 'name' );

$logo = $options['logo']['url'];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
		<link rel="icon" type="image/png" href="<?php echo $options['favicon']['thumbnail']; ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php
    wp_head();
		?>
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body id="index" <?php body_class('index'); ?>>
    <div class="again with nilooweb">

        <header class="main-navigation">

	        <div class="navigation-general container">
	          <div class="for-user">
							<button class="cart-btn">
						      <span class="font-icon icon-add-to-basket"></span>
									<span class="cart-btn-count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
						  </button>
              <div class="header-submenu" id="cartMenu">
							<?php woocommerce_mini_cart(); ?>
							</div>
              <button class="wishlist-btn notauthorized">
              	<span class="font-icon icon-fav-bt"></span>
              </button>

                <div class="profile-container notauthorized">
                    <div class="profile">
                        <span class="icon-profile-bt font-icon"></span>
                        <span id="profile-customer-name">کابر عزیز</span>
                        <div class="down-arrow">
                            <span class="font-icon icon-arrow-down"></span>
                        </div>
                        <div class="header-submenu" id="profileMenu">
                            <a href="/my-account">
                            <span class="font-icon icon-profile-detail color-green"></span>
                            <span>حساب کاربری</span>
                        </a>
                            <a href="/order-history">
                            <span class="font-icon icon-order-detail color-green"></span>
                            <span>پیگیری سفارش</span>
                        </a>
                            <a href="#logout" id="profile-customer-logout">
                            <span class="font-icon icon-logout-profile color-orang"></span>
                            <span>خروج از حساب</span>
                        </a>
                        </div>
                    </div>
                    <a class="login-register" type="button">ورود / ثبت نام</a>
                </div>

              </div>

              <div class="search-box">
                  <form method="get" action="<?php  echo get_bloginfo('url'); ?>/search">
                      <inpuy type="submit" id="search-btn"><span class="font-icon icon-search-header"></span></inpuy>
                      <input type="text" name="q" id="search-input" placeholder="جستجو..." autocomplete="off">
                  </form>
              </div>

              <div class="modlight">
                <a href="<?php  echo get_bloginfo('url'); ?>">
                	<img src="<?php echo $logo; ?>">
              	</a>
              </div>

              <span class="close-search">
              	<span class="font-icon icon-cancel"></span>
              </span>

            </div>

            <div class="search-open">
                <div class="container">

                    <div class="search-history">
                        <!--show after searching ,there is this script -->
                    </div>
                    <div class="search-result">

                    </div>
                </div>
            </div>

            <nav class="navigation-catrgories">
                <ul class="main-list">

                </ul>
            </nav>


        </header>
