<?php
// Register artwork Post Type
function artwork_post_type() {
	$labels = array(
		'name'                => __( 'Artworks', 'macroterm' ),
		'singular_name'       => __( 'Artworks', 'macroterm' ),
		'menu_name'           => __( 'Artworks', 'macroterm' ),
		'name_admin_bar'      => __( 'Artworks', 'macroterm' ),
		'add_new_item'          => __( 'Add artwork', 'macroterm' ),
		'add_new'               => __( 'Add artwork', 'macroterm' ),
		'new_item'              => __( 'New Product', 'macroterm' ),
	);
	$args = array(
	 	'label'               => __( 'Artworks', 'macroterm' ),
		'description'         => __( 'Artworks', 'macroterm' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', /* 'editor', 'comments' , 'page-attributes' , 'author' */ ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => true,
		'capability_type'     => 'page',				'show_in_nav_menus'   => true,
	);
	register_post_type( 'artwork', $args );
}
add_action( 'init', 'artwork_post_type', 0 );
	//  Register artwork Taxonomy
	 function artwork_taxonomy() {

		$labels = array(
			'name'                       => __( 'Artworks category', 'macroterm' ),
			 'singular_name'              => __( 'Artworks category', 'macroterm' ),
			 'menu_name'                  => __( 'Artworks category', 'macroterm' ),
		 );
		 $rewrite = array(
			 'slug'                       => __( 'artwork-category', 'macroterm' ),
			 'with_front'                 => true,
			 'hierarchical'               => true,
		 );
		 $args = array(
			 'labels'                     => $labels,
			 'hierarchical'               => true,
			 'public'                     => true,
			 'show_ui'                    => true,
			 'show_admin_column'          => true,
			 'show_in_nav_menus'          => true,
			 'show_tagcloud'              => false,
			 'rewrite'                    => $rewrite,			 			 'show_in_menu'               => true,					 'show_in_nav_menus'          => true,
		 );
	 register_taxonomy( 'artwork-category', array( 'artwork' ), $args );
	 }
	  add_action( 'init', 'artwork_taxonomy', 0 );

?>