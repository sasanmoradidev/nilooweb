<?php
 /*
 
 */
get_header();
global $nilooweb;
$options = get_option('nilooweb');

$taxonomy = get_queried_object();
$title = $taxonomy->name;
$desc = $taxonomy->description;

?>

<?php get_template_part('templates/pages/artworks'); ?>
<?php 
get_footer('inner'); 
?>