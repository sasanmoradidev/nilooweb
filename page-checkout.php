<?php
 /*
 Template Name: checkout and cart
 */
header_func();
global $nilooweb;
$options = get_option('nilooweb');
?>

<div class="page_roll">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="single_wrapper">
					<div class="page_info ">
						<div class="content_page">
							<div class="fancy">
								<h1 class="sec_title"><?php echo get_the_title(); ?></h1>
							</div>
							<?php the_content(); ?>
						</div>
					</div>
				</div>

			</div>
			<!-- Sidebar -->
			<!--<aside class="col-xs-6 col-sm-3 col-md-3 sidebar full_side" id="sidebar">
				<?php //get_sidebar(); ?>
			</aside>-->
		</div>
	</div>
</div>

<?php
footer_func();
?>
