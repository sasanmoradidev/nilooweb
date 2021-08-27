<?php
 /*
 Template Name: Artworks
 */
get_header();
global $nilooweb;
$options = get_option('nilooweb');
?>
<?php

get_template_part('templates/pages/artworks');

?>
<?php
get_footer('inner'); 
?>