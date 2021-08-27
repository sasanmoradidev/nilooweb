<?php
 /*
 Template Name: Home frontpage
 */
 header_func();
global $nilooweb;
$options = get_option('nilooweb');
?>
<?php

if ( wp_is_mobile() ) {
  get_template_part('templates/home/main');
} else {
  get_template_part('templates/home/home-desktop');
}
?>
<?php
footer_func();
?>
