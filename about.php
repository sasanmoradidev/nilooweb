<?php
 /*
 Template Name: About Me
 */
get_header();
global $nilooweb;
$options = get_option('nilooweb');
?>
<?php

get_template_part('templates/pages/about');

?>
<?php
get_footer('inner'); 
?>