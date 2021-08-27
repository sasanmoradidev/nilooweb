<?php
// acf code
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyAlT5G1ZrYaBRdHG1NYAmUnzyylcrd4tzo';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAlT5G1ZrYaBRdHG1NYAmUnzyylcrd4tzo');
}
add_action('acf/init', 'my_acf_init');
// jpg to png for post ratings
function custom_rating_image_extension() {
	return 'png';
}
add_filter( 'wp_postratings_image_extension', 'custom_rating_image_extension' );
?>