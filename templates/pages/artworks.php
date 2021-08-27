<?php
global $nilooweb;
$options = get_option('nilooweb');

$taxonomy = get_queried_object();
$title = $taxonomy->name;
$desc = $taxonomy->description;
?>
<main class="dsn-grid-color">


	<section class="content-block box-desc  section-padding pb-0">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<!--<h3 class="mb-30"><?php echo $title; ?></h3>-->
					<?php if($desc) : ?>
					<p><?php echo $desc; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php if(have_posts()) : ?>
	<div class="proj-container p-img section-padding pt-0">
		<div class="container">
			<div class="row">
			<?php
			while(have_posts()) : the_post(); ?>
				<?php
				$gsize = get_field('size');
				$id = get_the_ID();

				$img = get_the_post_thumbnail_url($id, 'products'); ?>
				<div class="col-lg-6">
					<div class="box-im">
						<div class="image-zoom" data-dsn-grid="parallax" data-dsn-grid-move="20">
							<a class="single-image" href="<?php echo $img; ?>"></a>
							<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="caption"><span>Size: <?php echo $gsize['width'], 'mm', '×', $gsize['height'], 'mm'; ?></span> - Year: <?php the_field('year'); ?></div>
					</div>
				</div>
	
			<?php endwhile; ?>
			</div>
		</div>
	</div>
	
	<?php endif; ?>
	
	<!--<div class="content-block proj-full">
		<div class="box-im">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/project/lg-1.jpg" alt="">
		</div>
	</div>-->
</main>