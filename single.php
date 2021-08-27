<?php
get_header('home4');
?>
<?php
global $petro;
$options = get_option( 'petro' );
?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part('template-parts/content' , 'singletitle'); ?>
	<?php get_template_part('template-parts/content' , 'singleblock'); ?>
<?php
the_title();
the_content();

 ?>
<?php endwhile; ?>
<?php
	get_footer('home4');
?>
