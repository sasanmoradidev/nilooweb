<?php
get_header(); 
global $nilooweb;
$options = get_option('nilooweb');
$current_id = $wp_query->get_queried_object_id();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
$arcterm = get_category( $current_id);
$total = $arcterm->count;
$permalink = Get_home_url().'/category/'.$arcterm->slug.'/';
?>
	<div class="breadcrumb_wrap">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8">
					<?php			
						if ( function_exists('yoast_breadcrumb') ){
							yoast_breadcrumb('<p id="blog-breadcrumbs">','</p>');
						} 
					?>
				</div>
			</div>
		</div>
	</div>

	<!-- Category Content -->
	<div class="page_blog">
		<div class="container">
			<div class="row">
				<!-- Sidebar -->
				<aside class="col-6 col-md-4 full_side" id="sidebar">
					<div class="sidebar">
						<?php get_sidebar('sidebar'); ?>
						<?php if(!$options['sidebar-banner']==''){?>
							<?php if(!$options['sidebar-bannertitle']==''){?>
								<h4 class="sec_title2 widget-title"><span><?php echo $options['sidebar-bannertitle']; ?></span></h4>
							<?php } ?>
							<div class="sidebarbanner"><img src="<?php echo $options['sidebar-banner']['url']; ?>" alt="<?php echo $options['sidebar-bannertitle']; ?>" class="img-fluid"></div>
						<?php } ?>
					</div>
					<div class="sidebarbottom">
					</div>
				</aside>
				<div class="col-12 col-md-8 blogroll_info">
					<div class="fancy blog_header">
						<div class="block-gear">
							<h1><?php echo single_cat_title(); ?></h1>
							<?php
							if (!$options['article-page-desc']==''){
								echo '<p>'.$options['article-page-desc'].'</p>';
							}
							?>
						</div>
					</div>
					<div class="row">
					<?php 
						$args = array( 
							'post_type' => 'post', 
							'paged' => $paged ,
							'cat' => $current_id,
						);
						$posts = new WP_Query( $args );	
						$total = $posts->found_posts; 
						if( $posts->have_posts() ): 
							while( $posts->have_posts() ) : $posts->the_post(); ?>
							<div class="<?php if ($options['categorycol']==1){echo 'onecol my-2 col-12';} else {echo 'twocol col-12 col-xl-6';} ?> blog_item">
								<div class="inner-blog_item <?php if ($options['categorycol']==1){echo 'row';} else {echo '';} ?>">
									<div class="imagebox <?php if ($options['categorycol']==1){echo 'col-6';} else {echo '';} ?>">
									<?php if ( has_post_thumbnail() ) { ?>
										<a class="blog_img" href="<?php echo get_the_permalink(); ?>">
											<?php the_post_thumbnail('blog', 'home-blog-thumb img-fluid'); ?>
											<div class="overlay blue_bg">
												<div class="commentcount">
												<?php
												$num = '<i class="zmdi zmdi-menu zmdi-hc-fw"></i>';
												comments_number( 'no responses', 'one response', '%' . $num . ''); ?>
												</div>
											</div>
										</a>
									<?php } else { 
										echo '<a class="blog_img no_thumbnail" href="'.get_the_permalink().'">
												<div class="overlay blue_bg">
													<span class="date_wrap">' .get_the_date('d/m/Y'). '</span>
												</div>
											  </a>'; 
									}  ?>
									</div>
									<div class="thumbcnt <?php if ($options['categorycol']==1){echo 'col-6';} else {echo 'col-12';} ?>">
										<h2 class="blog_title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
										<?php $trimexcerpt = get_the_excerpt();
											  $shortexcerpt = mb_strimwidth( $trimexcerpt, 0 , $num_words = 120, $more = '… ' ); ?>
										<p><?php echo $shortexcerpt; ?></p>

										<div class="more_wrap">
											<span class="date_wrap"><?php echo jdate( 'd F y' ); ?></span>
											<a class="more more_blog" href="<?php echo get_the_permalink(); ?>">ادامه مطلب</a>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						</div>
						<!-- pagination	 -->	
						<?php	
						echo '<div class="box_archive-page">';
							$perpage = get_option('posts_per_page');
							if ($total % $perpage == 0) {
								$pages = intval ($total / $perpage);
							} else {
								$pages = intval ($total / $perpage)+1;
							}
							if($pages > 1) {
								echo '<ul class="archive-page pagination">';

										if ($paged != 1)
										echo '<li class="page first_page p-item"><a href="'.$permalink.'page/1/" class="p-link">1 <span></span></a></li>';	 	
									for ($i=1;$i<=$pages;$i++) {
										if ($i == $paged) {
											/** Previous Post Link */
											if($i > 1) {
												$prev_page_counter = $i-1;
												$prev_p = $permalink.'page/'.$prev_page_counter;
												echo '<li class="pagin_btn prev_btn p-item"><a href="'.$prev_p.'/" class="p-link"></a></li>';
											}
											echo '<li class="page current p-item"><a class="p-link">'.$i.'</a></li>';
											/** Next Post Link */
											if($i < $pages) {
												$next_page_counter = $i+1;
												$next_p = $permalink.'page/'.$next_page_counter;
												echo '<li class="pagin_btn next_btn p-item"><a href="'.$next_p.'/" class="p-link"></a></li>';
											}
										}
									}
									if ($paged != $pages)		
									echo '<li class="page last_page p-item"><a href="'.$permalink.'page/'.$pages.'/" class="p-link"><span></span>'.$pages.'</a></li>';											
								}
						echo '</div>';
						endif;
						wp_reset_postdata();
						?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>