<?php header_func();
$options = get_option( 'nilooweb' );
?>
	<div class="breadcrumb_wrap">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8">
					<?php
						if ( function_exists('yoast_breadcrumb') ){
							yoast_breadcrumb('<p id="blog-breadcrumbs">
								<span class="square"></span>','</p>');
						}
					?>
				</div>
			</div>
		</div>
	</div>

<div class="page_roll">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-md-9 pull-left">
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

				<!-- Comment -->
						<?php if(comments_open()){ ?>
						<div class="comment_wrapper">
							<div class="comment_header border_bt">
								<h3 class="comment_title">نظرات کاربران</h3>
							</div>

							<?php
								comments_template();
							?>
						</div>
						<?php } ?>

			</div>
			<!-- Sidebar -->
			<aside class="col-xs-6 col-sm-3 col-md-3 sidebar full_side" id="sidebar">
				<?php get_sidebar(); ?>
			</aside>
		</div>
	</div>
</div>

<?php
	footer_func(); 
?>
