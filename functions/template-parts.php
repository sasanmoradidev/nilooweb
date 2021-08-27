<?php

function woocommerce_template_single_sharing () {
	$title= urlencode(get_the_title());
	$url= urlencode(get_permalink());
	$homeurl= urlencode(get_bloginfo('url'));
	$desc = urlencode(get_the_excerpt());
	$share = '<button class="share"></button><div class="share-options">';
	$share .= '';
	$share .= '<a href="https://api.whatsapp.com/send?text=' . $url . '" class="share-option whatsapp" target="_blank">
		<img src="https://www.banimode.com//themes/new/assets/images/logo/whatsapp.svg" alt="واتس اپ"></a>';
	$share .=	'<a href="https://telegram.me/share/url?text=' . $url . '" class="share-option telegram" target="_blank">
		<img src="https://www.banimode.com//themes/new/assets/images/logo/telegram.svg" alt="تلگرام"></a>';
	$share .= '<a href="https://twitter.com/intent/tweet?text=' . $url . '" class="share-option twitter" target="_blank">
		<img src="https://www.banimode.com//themes/new/assets/images/logo/twitter.svg" alt="توییتر"></a>';
	$share .= '	<a href="mailto:?body=' . $url . '" class="share-option google" target="_blank">
		<img src="https://www.banimode.com//themes/new/assets/images/logo/gmail.svg" alt="ایمیل"></a>';
	$share .= '</div>';
	print_r( $share );
	return $share;
}

//Show Social Links
function sociallinks () {  ?>
	<div class="social_wrap">
	<?php $options = get_option( 'nilooweb' ); ?>
	<?php if ($options['facebook']) { ?><a href="<?php echo $options['facebook']; ?>" title="Facebook" target="_blank" rel="nofollow" class="f-facebook"><i class="zmdi zmdi-facebook"></i></a><?php } ?>
	<?php if ($options['twitter']) { ?><a href="<?php echo $options['twitter']; ?>" title="Twitter" target="_blank" rel="nofollow" class="f-twitter"><i class="zmdi zmdi-twitter"></i></a><?php } ?>
	<?php if ($options['googleplus']) { ?><a href="<?php echo $options['googleplus']; ?>" title="Google+" target="_blank" rel="nofollow" class="f-googleplus"><i class="zmdi zmdi-google-plus"></i></a><?php } ?>
	<?php if ($options['instagram']) { ?><a href="<?php echo $options['instagram']; ?>" title="Instagram" target="_blank" rel="nofollow" class="f-instagram"><i class="zmdi zmdi-instagram"></i></a><?php } ?>
	<?php if ($options['linkedin']) { ?><a href="<?php echo $options['linkedin']; ?>" title="Linkedin" target="_blank" rel="nofollow" class="f-linkedin"><i class="zmdi zmdi-linkedin"></i></a><?php } ?>
	<?php if ($options['pinterest']) { ?><a href="<?php echo $options['pinterest']; ?>" title="Pinterest" target="_blank" rel="nofollow" class="f-pinterest"><i class="zmdi zmdi-pinterest"></i></a><?php } ?>
	<?php if ($options['telegram']) { ?><a href="<?php echo $options['telegram']; ?>" title="Telegram" target="_blank" rel="nofollow"><i class="zmdi zmdi-mail-send"></i></a><?php } ?>
	</div>
<?php }

//Nilooweb Copyright
function nilooweb_copyright() {
	echo '<p class="nilooweb"><a href="http://nilooweb.ir">'.__('طراح وبسایت','nilooweb').'</a>: '.__('نیلو وب','nilooweb').'</p>';
}

?>
