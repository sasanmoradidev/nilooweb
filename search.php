<?php get_header(); ?>

<div class="container maindiv archive-posts">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php
    $description = get_the_archive_description();
		if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
    <?php while(have_posts()){ the_post();?>
			<div class="col-lg-3">
				<div class="box-search">
					<div class="img">
						<a href="<?php the_permalink();?>">
							<?php
								if (has_post_thumbnail()) {
									// the_post_thumbnail('blog');
									the_post_thumbnail();
								} else { ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo get_the_title(); ?>" >
							<?php } ?>
						</a>
					</div>
					<div class="content">
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
					</div>
				</div>
			</div>
    <?php } wp_reset_postdata();?>
  <?php wp_pagenavi(); ?>

</div>


<?php get_footer(); ?>
