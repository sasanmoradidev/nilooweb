<?php
/**
Include ACF Plugin
**/

add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/includes/acf/';
    return $path;
}
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/includes/acf/';
    return $dir;
}
include_once( get_stylesheet_directory() . '/includes/acf/acf.php' );
/**
Include Redux Framework
**/
// include_once( get_stylesheet_directory() . '/includes/redux-framework/redux-core/framework.php' );
include_once( get_stylesheet_directory() . '/functions/admin-settings.php' );
/**
General Settings
**/
add_action('after_setup_theme', 'nilooweb_theme_setup');
function nilooweb_theme_setup(){

  load_theme_textdomain('nilooweb', get_template_directory() . '/languages');
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	//Remove Default Wordpress Gallery Styles
	add_filter( 'use_default_gallery_style', '__return_false' );
}
/**
 disable gutenberg
**/
//Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
  // Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
  Proper way to enqueue scripts and styles
**/
function nilooweb_scripts() {
	//Scripts
  if ( wp_is_mobile() ) {
	wp_enqueue_script( 'libjs', get_template_directory_uri() . '/assets/js/mobile/lib.min.js', array(), '1.0', true );
	wp_enqueue_script( 'swiper-bundle.min', get_template_directory_uri() . '/assets/js/mobile/swiper-bundle.min.js', array(), '1.0', true );
	wp_enqueue_script( 'custome', get_template_directory_uri() . '/assets/js/mobile/custome.js', array(), '1.0', true );
  } else {
  wp_enqueue_script( 'myjquery', get_template_directory_uri() . '/assets/js/desktop/jquery.min.js', array(), '1.0', false );
  wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/assets/js/desktop/bootstrap.min.js', array(), '1.0', false );
  wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/desktop/owl.carousel.min.js', array(), '1.0', false );
  // wp_enqueue_script( 'mini-cart', get_template_directory_uri() . '/assets/js/desktop/mini-cart.js', array(), '1.0', false );
  wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/desktop/custom.js', array(), '1.0', false );
  wp_enqueue_script( 'footer', get_template_directory_uri() . '/assets/js/desktop/footer.js', array(), '1.0', true );
  }


	if ( is_singular() ) {
		// wp_enqueue_script( 'comment-reply' );
	}

  if ( wp_is_mobile() ) {
	//Styles
  wp_enqueue_style( 'lib.min', get_template_directory_uri() .'/assets/css/mobile/lib.min.css' );
  wp_enqueue_style( 'swiper-bundle.min', get_template_directory_uri() .'/assets/css/mobile/swiper-bundle.min.css' );
  wp_enqueue_style( 'style', get_template_directory_uri() .'/assets/css/mobile/style.css' );
  } else {
	//Styles
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/desktop/bootstrap.v4.css' );
  wp_enqueue_style( 'carousel.min', get_template_directory_uri() .'/assets/css/desktop/owl.carousel.min.css' );
  wp_enqueue_style( 'styles.min', get_template_directory_uri() .'/assets/css/desktop/styles.min.css' );
  wp_enqueue_style( 'plp.min', get_template_directory_uri() .'/assets/css/desktop/plp.min.css' );
  wp_enqueue_style( 'style', get_template_directory_uri() .'/assets/css/desktop/style.css' );
  }
}
add_action( 'wp_enqueue_scripts', 'nilooweb_scripts' );


/**
 Starndard Image Sizes
**/
add_action('after_setup_theme', 'nilooweb_image_sizes');
function nilooweb_image_sizes(){
    add_image_size( 'slidercarousel', 196, 380, true ); // (cropped)
    add_image_size( 'mobileswiper', 600, 720, true ); // (cropped)
    add_image_size( 'mobilerelated', 250, 286, true ); // (cropped)
    add_image_size( 'mobilecartitems', 350, 420, true ); // (cropped)
    add_image_size( 'offproducts', 696, 936, true ); // (cropped)
    add_image_size( 'products_desktop', 350, 420, true ); // (cropped)
    add_image_size( 'products_desktop_thumb', 70, 93, true ); // (cropped)
    add_image_size( 'blog_desktop', 300, 200, true ); // (cropped)
    add_image_size( 'minicartthumb', 97, 118, true ); // (cropped)
    add_image_size( 'wc_single_thumb', 86, 102, true ); // (cropped)
}
/**
 Custom funtions
**/
// header distinguish mobile device
function header_func(){
  if ( wp_is_mobile() ) {
    get_header('mobile');
  } else {
    get_header();
  }
}
// footer distinguish mobile device
function footer_func(){
  if ( wp_is_mobile() ) {
    get_footer('mobile');
  } else {
    get_footer();
  }
}
/**
 Register Menu Locations
**/
add_action('after_setup_theme', 'nilooweb_menus');
function nilooweb_menus(){
    register_nav_menus( array(
		'main'  => __( 'Main Menu', 'nilooweb' ),
		'category'  => __( 'Mobile Categories Menu', 'nilooweb' ),
	) );
}
/**
 Register Sidebar
**/
add_action('after_setup_theme', 'nilooweb_sidebars');
function nilooweb_sidebars(){
	register_sidebar(array(
		'name'          => __('sidebar','nilooweb'),
		'id'            => 'sidebar-blog',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget fancy %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="sec_title2 widget-title"><span>',
		'after_title'   => '</span></h4>'
	));
}

/******widget search change*****/
function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div><span class="dot"><input type="text" value="' . get_search_query() . '" placeholder="'. esc_attr__( 'Search' ) .'"  name="s" id="s" /></span>
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'my_search_form', 100 );
/*****end custom search widget*****/



/*****creating custom widget for posts with thumbnails*******/
class Lastpost_Widget extends WP_Widget{
function __construct() {
	parent::__construct(
		'lastpost_widget', // Base ID
		'آخرین مطالب', // Name
		array('description' => __( 'نمایش پست های اخیر. همراه با تصاویر بند انگشتی و عنوان'))
	   );
}
function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
	return $instance;
}

function form($instance) {
	if( $instance) {
		$title = esc_attr($instance['title']);
		$numberOfListings = esc_attr($instance['numberOfListings']);
	} else {
		$title = '';
		$numberOfListings = '';
	}
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'lastpost_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'lastpost_widget'); ?></label>
			<select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
				<?php for($x=1;$x<=10;$x++): ?>
				<option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
				<?php endfor;?>
			</select>
		</p>
	<?php
}

function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	$numberOfListings = $instance['numberOfListings'];
	echo $before_widget;
	if ( $title ) {
		echo $before_title . $title . $after_title;
	}
	$this->getLastpostListings($numberOfListings);
	echo $after_widget;
}

function getLastpostListings($numberOfListings) { //html
	global $post;
	//add_image_size( 'lastpost_widget_size', 85, 45, false );
	$listings = new WP_Query();
	$listings->query('post_type=post&posts_per_page=' . $numberOfListings );
	if($listings->found_posts > 0) {
		echo '<ul class="lastpost_widget">';
			while ($listings->have_posts()) {
				$listings->the_post();
				$imageattr = array(
					'class' => 'lastpost_widget_size',
					'alt' =>   get_the_title() ,
				);
				$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'sidebarblog', $imageattr) : '<div class="noThumb"></div>';
				$listItem = '<li class="clearfix">' . '<a href="' . get_permalink() . '" class="postimage">' . $image . '</a>';
				$listItem .= '<a href="' . get_permalink() . '" class="postlink" >';
				$listItem .= get_the_title() . '</a></li>';
				//$listItem .= '<span>Added ' . get_the_date() . '</span></li>';
				echo $listItem;
			}
		echo '</ul>';
		wp_reset_postdata();
	}else{
		echo '<p style="padding:25px;">No listing found</p>';
	}
}

} //end class Lastpost_Widget
register_widget('Lastpost_Widget');
/*****end creating custom widget for posts with thumbnails*******/

// nav walker for header menu
class IBenic_Walker extends Walker_Nav_Menu {

	// Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;
    	$classes = $item->classes;

			$output .= "<li>";

      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
      	$output .= '<a href="' . $permalink . '">';
      } else {
      	$output .= '<span>';
      }

      $output .= $title;
      if( $permalink && $permalink != '#' ) {
      	$output .= '</a>';
      } else {
      	$output .= '</span>';
      }

      if($depth == 0 && in_array( 'menu-item-has-children', $classes) ){
        $output .= "<div class='category-details'>";
        $output .= "<div class='container'>";
      }
      if($depth == 0 && in_array( 'menu-item-has-children', $classes)){
        $output .= "</div'>";
        $output .= "</div'>";
      }
    }

    function start_lvl(&$output, $depth = 0, $args = NULL) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"submenu\">\n";
    }

/*
    function end_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

      if($depth == 0){
        $output .= "</div'>";
        $output .= "</div'>";
      }
  		$output .= "</li>";
    }
*/
}

// nav walker for header menu
class IBenic_Walker2 extends Walker_Nav_Menu {

	// Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;
    	$classes = $item->classes;

			$output .= "<li>";

      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
      	$output .= '<a href="' . $permalink . '">';
      } else {
      	$output .= '<span>';
      }

      $output .= $title;
      if( $permalink && $permalink != '#' ) {
      	$output .= '</a>';
      } else {
      	$output .= '</span>';
      }

    }

    function start_lvl(&$output, $depth = 0, $args = NULL) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul>\n";
    }

/*
    function end_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

      if($depth == 0){
        $output .= "</div'>";
        $output .= "</div'>";
      }
  		$output .= "</li>";
    }
*/
}
/**
this code shows php template file is used for the page in bottom of page
*/
function meks_which_template_is_loaded() {
	if ( is_super_admin() ) {
		global $template;
    print_r($template);
	}
}
// enable this for activate
//add_action( 'wp_footer', 'meks_which_template_is_loaded' );
// ****************************

//pagination
function wp_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }
    if($pages != 1) {
        echo '<ul class="pagination">';
        if($paged > 1) echo "<li class='pagination-prev'><a class='pagination-item' href='".get_pagenum_link($paged - 1)."'>صفحه قبل</a></li>";
        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class='pagination-item active'><a class='pagination-link'>".$i."</a></li>":"<li class='pagination-item'><a class='pagination-link' href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
            }
        }
        if ($paged < $pages) echo "<li class='pagination-next'><a class='pagination-item' href='".get_pagenum_link($paged + 1)."'>صفحه بعد</a></li>";
        echo '</ul>';
    }
}

// *******
