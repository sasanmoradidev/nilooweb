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

<body <?php body_class(); ?>>

    <div id="main" class="overflow-hidden">

        <section id="header" class="">
            <div class="container-fluid">
                <nav class="navbar w-100">
                    <span class="categoriesMenu"><i class="menu-icon"></i></span>
                    <div class="logopos">
                      <a class="navbar-brand" href="<?php  echo get_bloginfo('url'); ?>">
                          <img src="<?php echo $logo; ?>" alt="مد لایت">
                      </a>
                    </div>

                    <span class="mainMenu"><i class="profile-icon"></i></span>
                </nav>
            </div>
        </section>
