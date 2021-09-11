<?php
header_func();
global $nilooweb;
$options = get_option('nilooweb');
$current_id = $wp_query->get_queried_object_id();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
?>
<div id="filter-page" class="clearfix">
  <main>
    <div id="main-content" class="container">
      <h1 id="plp-title"><?php _e( 'نتیجه جستجو برای', 'locale' ); ?>: "<?php the_search_query(); ?>"</h1>
<?php ?>
      <div id="plp-search-sort">
      	<div class="search-in-these">
      		<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      			<span class="font-icon icon-search-header"></span>
      			<input id="filter-search" type="text" name="s" placeholder="جستجو در محصولات زیر...">
      			<span class="font-icon icon-cancel"></span>
      		</form>
      	</div>
        <?php
        	/**
        	 * Hook: woocommerce_before_shop_loop.
        	 *
        	 * @hooked woocommerce_output_all_notices - 10 -removed
        	 * @hooked woocommerce_result_count - 20 -removed
        	 * @hooked woocommerce_catalog_ordering - 30
        	 */
        	// do_action( 'woocommerce_before_shop_loop' );
        	do_action('woocommerce_before_shop_loop_ordering');
        ?>
      </div>
      
      <?php wp_pagination(); ?>

      <div id="filter" class=""><fieldset class="filters-fieldset">
        <?php
        /**
         * Hook: woocommerce_sidebar.
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action( 'woocommerce_sidebar' );
        ?>
      </fieldset></div>

      <div class="product_list grid af-product-list row" style="" id="product_list">
      <?php
      	global $wpdb;
      	$sku=get_search_query();
          $product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", $sku ) );
      ?>
      <?php global $paged;
      	if($paged < 2 && $product_id!=""){
      ?>
      <?php $any_php_variable = new WP_Query( array(  'post_type' => 'product', 'p' => $product_id ) ); ?>
      <?php while ( $any_php_variable->have_posts() ) : $any_php_variable->the_post(); ?>

        <!--post format or loop , or you can use the_title(),the_content() as well here. -->
        <?php	wc_get_template_part( 'mycontent', 'product' ); ?>

      <?php endwhile; wp_reset_postdata(); ?>
      <?php } ?>
      <!--normal search ----------------------------------->
              <?php
              $args = array(
       					'post_type' => 'product' ,
       					'posts_per_page' => 9,
       					'post_status ' => 'publish',
		             'paged' => $paged ,
       				);
       				$posts = new WP_Query( $args );
               ?>
      				<?php if(have_posts()) : ?>
      					<?php while($posts->have_posts() ) : $posts->the_post(); ?>
                  <?php	wc_get_template_part( 'mycontent', 'product' ); ?>
                <?php endwhile; ?>
              </div>
                <br clear="all">
      					<?php wp_pagination(); ?>
                <div class="___MyPaginate large">
                	<?php

                	/**
                	 * Hook: woocommerce_after_shop_loop.
                	 *
                	 * @hooked woocommerce_pagination - 10
                	 */
                	//do_action( 'woocommerce_after_shop_loop' );
                ?>
                </div>
      				<?php else : ?>
      					<div class="entry-content">
        <!--modify the else statement as well in normal search because it will show nothing found on matched sku --------------->
      						<?php if($product_id==""){ ?>
      						<p><?php echo esc_html__('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'your-theme'); ?></p>
      						<?php get_search_form(); ?>
      						<?php } ?>
      					</div><!-- .entry-content -->
      				<?php endif; ?>
      <!--normal search ----------------------------------->
    </div>
  </main><!-- #main -->
</div>

<?php
footer_func();
?>
