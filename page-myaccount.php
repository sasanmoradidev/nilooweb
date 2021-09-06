<?php
 /*
 Template Name: my account
 */
header_func();
global $nilooweb;
$options = get_option('nilooweb');
?>

<div id="profile-page">
  <div class="container">
    <?php the_content(); ?>
    <!-- Sidebar -->
    <!--<aside class="col-xs-6 col-sm-3 col-md-3 sidebar full_side" id="sidebar">
    	<?php //get_sidebar(); ?>
    </aside>-->
  </div>
</div>
<?php
footer_func();
?>
