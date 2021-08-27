<?php
 /*
 Template Name: News
 */
get_header();
global $nilooweb;
$options = get_option('nilooweb');
?>
<?php

get_template_part('templates/pages/news');

?>
<?php
get_footer('inner'); 
?>