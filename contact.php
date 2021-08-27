<?php
 /*
 Template Name: Contact
 */
get_header();
global $nilooweb;
$options = get_option('nilooweb');
?>
<?php

get_template_part('templates/pages/contact');

?>
<?php
get_footer('inner'); 
?>