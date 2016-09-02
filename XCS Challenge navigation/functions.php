<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to WooFramework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/includes/';

// Don't load alt stylesheet from WooFramework
if ( ! function_exists( 'woo_output_alt_stylesheet' ) ) {
	function woo_output_alt_stylesheet () {}
}

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'tnla49pj66y028vef95h2oqhkir0tf3jr' );

// WooFramework
require_once ( $functions_path . 'admin-init.php' );	// Framework Init

if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {
	//Enable Tumblog Functionality and theme is upgraded
	update_option( 'woo_needs_tumblog_upgrade', 'false' );
	update_option( 'tumblog_woo_tumblog_upgraded', 'true' );
	update_option( 'tumblog_woo_tumblog_upgraded_posts_done', 'true' );
	require_once ( $functions_path . 'admin-tumblog-quickpress.php' );  // Tumblog Dashboard Functionality
}

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 				// Options panel settings and custom settings
				'includes/theme-functions.php', 			// Custom theme functions
				'includes/theme-actions.php', 				// Theme actions & user defined hooks
				'includes/theme-comments.php', 				// Custom comments/pingback loop
				'includes/theme-js.php', 					// Load JavaScript via wp_enqueue_script
				'includes/theme-plugin-integrations.php',	// Plugin integrations
				'includes/sidebar-init.php', 				// Initialize widgetized areas
				'includes/theme-widgets.php',				// Theme widgets
				'includes/theme-advanced.php',				// Advanced Theme Functions
				'includes/theme-shortcodes.php',	 		// Custom theme shortcodes
				'includes/woo-layout/woo-layout.php',		// Layout Manager
				'includes/woo-meta/woo-meta.php',			// Meta Manager
				'includes/woo-hooks/woo-hooks.php'			// Hook Manager
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

// Load WooCommerce functions, if applicable.
if ( is_woocommerce_activated() ) {
	locate_template( 'includes/theme-woocommerce.php', true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'canvas', get_template_directory_uri() . '/style.css' );

}

?>



<?php 
/*-----------------------------------------------------------------------------------*/
/* Start rewrite logo link */
/*-----------------------------------------------------------------------------------*/
/*function woo_logo () {
    $settings = woo_get_dynamic_values( array( 'logo' => '' ) );
    // Setup the tag to be used for the header area (`h1` on the front page and `span` on all others).
    $heading_tag = 'span';
    if ( is_home() || is_front_page() ) { $heading_tag = 'h1'; }

    // Get our website's name, description and URL. 
    $site_title = get_bloginfo( 'name' );
    $site_url = 'http://singularityu.org/';
    $site_description = get_bloginfo( 'Singularity University presents: the XCS Challenge' );
?>
<div id="logo">
<?php
    // Website heading/logo and description text.
    if ( ( '' != $settings['logo'] ) ) {
        $logo_url = $settings['logo'];
        if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
        echo '<a href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( $site_title ) . '" /></a>' . "\n";
    } // End IF Statement
    echo '<' . $heading_tag . ' class="site-title"><a href="' . esc_url( $site_url ) . '">' . $site_title . '</a></' . $heading_tag . '>' . "\n";
    if ( $site_description ) { echo '<span class="site-description">' . $site_description . '</span>' . "\n"; }
?>
</div>
<?php
} // End woo_logo() */
/*-----------------------------------------------------------------------------------*/
/* End rewrite logo link */
/*-----------------------------------------------------------------------------------*/
?>



<?php

/*-----------------------------------------------------------------------------------*/
/* Start Menus */
/*-----------------------------------------------------------------------------------*/

/*------------------- Register Menus ---------------------*/
 add_action( 'init', 'woo_custom_add_menu_locations', 10 );

function woo_custom_add_menu_locations () {
    // Create an array of the menu locations we'd like to register.
    $menus = array(
                'finance-menu' => __( 'Finance Menu', 'woothemes' ),
                'manufacturing-menu' => __( 'Manufacturing Menu', 'woothemes' ),
                'summit-menu' => __( 'Summit Menu', 'woothemes' )
            ); 
    // Call the WordPress register_nav_menus() function and pass it our array of menu locations.
    register_nav_menus( $menus );
} 
/*----------------- End Register Menus -------------------*/

?>

<?php

/*------------------ Finance Menu: --------------------*/

add_action( 'woo_nav_after', 'woo_custom_add_secondary_menu', 10 );
 
function woo_custom_add_secondary_menu () {
 
    $menu_location = 'finance-menu';
 
    if ( is_page(array(5,10,8,891,1015)) ) {
        echo '
<div id="' . $menu_location . '-container" class="col-full custom-menu-location">' . "
";
            wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => $menu_location, 'menu_class' => 'nav fl', 'menu_id' => 'main-nav', 'theme_location' => $menu_location ) );
        echo '</div>
 
<!--/#' . $menu_location . '-container .col-full-->' . "
";
}

/*------------------ End Finance Menu --------------------*/

/*----------------- Manufacturing Menu: ------------------*/

    $menu_location = 'manufacturing-menu'; 
 
    if ( is_page(array(12,14,16,881,1019)) ) {
        echo '
<div id="' . $menu_location . '-container" class="col-full custom-menu-location">' . "
";
            wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => $menu_location, 'menu_class' => 'nav fl', 'menu_id' => 'main-nav', 'theme_location' => $menu_location ) );
        echo '</div>
 
<!--/#' . $menu_location . '-container .col-full-->' . "
";
}
/*----------------- End Manufacturing Menu ------------------*/

/*---------------------- Summit Menu: -----------------------*/

    $menu_location = 'summit-menu'; 
 
    if ( is_page(array(21,23,25,889,1017)) ) {
        echo '
<div id="' . $menu_location . '-container" class="col-full custom-menu-location">' . "
";
            wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => $menu_location, 'menu_class' => 'nav fl', 'menu_id' => 'main-nav', 'theme_location' => $menu_location ) );
        echo '</div>
 
<!--/#' . $menu_location . '-container .col-full-->' . "
";
    }
 

/*---------------------- End Summit Menu ----------------------*/

} // End woo_custom_add_secondary_menu()

/*-----------------------------------------------------------------------------------*/
/* End Menus */
/*-----------------------------------------------------------------------------------*/

?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>