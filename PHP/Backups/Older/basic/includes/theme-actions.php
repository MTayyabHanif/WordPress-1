<?php

/*------------------------------------------------------------------------------------

TABLE OF CONTENTS
- Theme Setup
- Conditionals






- Theme Setup
- Add Google Maps to HEAD
- Load style.css in the <head>
- Add custom styling
- Add layout to body_class output
- Navigation
- Post More
- Video Embed
- Single Post Author
- Yoast Breadcrumbs
- Subscribe & Connect
- Optional Top Navigation (WP Menus)
- Footer Widgetized Areas
- Add customisable footer areas
- Add customisable post meta
- Add Post Thumbnail to Single posts on Archives
- Post Inside After
- Modify the default "comment" form field.
- Add theme default comment form fields.
- Add theme default comment form arguments.
- Activate shortcode compatibility in our new custom areas.
- Enqueue Dynamic CSS
- Load responsive IE scripts
- Load site width CSS in the header
- Function to optionally remove responsive design and load in fallback CSS styling.
- Remove responsive design in IE8
- Adjust the homepage query, if using the "Magazine" page template as the homepage.
- Enable Tumblog
- Full width header
- Full width footer
- Full Width Markup Functions
- Full width body classes
- Optionally load custom logo.
- Optionally load the mobile navigation toggle.
- Add widgetized header area
- Show page content on portfolio page

------------------------------------------------------------------------------------*/

// Navigation
add_action( 'header_after','nav', 10 );

// Primary Menu
add_action( 'nav_inside','nav_primary', 10 );

// Subscribe links in navigation
add_action( 'nav_inside','nav_subscribe', 25 );

// Search in navigation
add_action( 'nav_inside','nav_search', 25 );

// Side Navigation wrappers
add_action( 'nav_inside', 'nav_sidenav_start', 15 );
add_action( 'nav_inside', 'nav_sidenav_end', 30 );

// Author Box
add_action( 'wp_head', 'author', 10 );

// Single post navigation
add_action( 'post_after', 'postnav', 10 );

// Add Google Fonts output to HEAD
add_action( 'wp_head', 'google_webfonts', 10 );

// Breadcrumbs
if ( isset( $options['breadcrumbs_show'] ) && $options['breadcrumbs_show'] == 'true' ) {
	add_action( 'loop_before', 'breadcrumbs', 10 );
}

// Optional Top Navigation (WP Menus)
add_action( 'top', 'top_navigation', 10 );

/*-----------------------------------------------------------------------------------*/
/* Theme Setup */
/*-----------------------------------------------------------------------------------*/
/**
 * Theme Setup
 *
 * This is the general theme setup, where we add_theme_support(), create global variables
 * and setup default generic filters and actions to be used across our theme.
 *
 */

add_action( 'after_setup_theme', 'themes_setup' );

if ( ! function_exists( 'themes_setup' ) ) {
	function themes_setup () {


		// Menu Locations
		if ( function_exists( 'wp_nav_menu') ) {
			add_theme_support( 'nav-menus' );
			register_nav_menus(
				array(
					'primary-menu' 	=> __( 'Primary Menu', 'themes' )
					)
				);
			register_nav_menus(
				array(
					'top-menu' 		=> __( 'Top Menu', 'themes' )
					)
				);
		}

	} // End themes_setup()
}






/*-----------------------------------------------------------------------------------*/
/* Optional Top Navigation (WP Menus)  */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'top_navigation' ) ) {
function top_navigation() {
	if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) {
?>
	<div id="top">
		<div class="col-full">
			<?php
				echo '<h3 class="top-menu">' . get_menu_name( 'top-menu' ) . '</h3>';
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav top-navigation fl', 'theme_location' => 'top-menu' ) );
			?>
		</div>
	</div><!-- /#top -->
<?php
	}
} // End top_navigation()
}

/*-----------------------------------------------------------------------------------*/
/* Footer Widgetized Areas  */
/*-----------------------------------------------------------------------------------*/

add_action( 'footer_top', 'footer_sidebars', 30 );

if ( ! function_exists( 'footer_sidebars' ) ) {
function footer_sidebars() {
	$settings = get_dynamic_values( array( 'biz_disable_footer_widgets' => '', 'footer_sidebars' => '4' ) );

	$footer_sidebar_total = 4;
	$has_footer_sidebars = false;

	// Check if we have footer sidebars to display.
	for ( $i = 1; $i <= $footer_sidebar_total; $i++ ) {
		if ( active_sidebar( 'footer-' . $i ) && ( $has_footer_sidebars == false ) ) {
			$has_footer_sidebars = true;
		}
	}

	// If footer sidebars are available, we're on the "Business" page template and we want to disable them, do so.
	if ( $has_footer_sidebars && is_page_template( 'template-biz.php' ) && ( 'true' == $settings['biz_disable_footer_widgets'] ) ) {
		$has_footer_sidebars = false;
	}

	$total = $settings['footer_sidebars'];
	if ( '0' == $settings['footer_sidebars'] ) { $total = 0; } // Make sure the footer widgets don't display if the "none" option is set under "Theme Options".

	// Lastly, we display the sidebars.
	if ( $has_footer_sidebars &&  $total > 0 ) {
?>
<section id="footer-widgets" class="col-full col-<?php echo esc_attr( intval( $total ) ); ?>">
	<?php $i = 0; while ( $i < intval( $total ) ) { $i++; ?>
		<?php if ( active_sidebar( 'footer-' . $i ) ) { ?>
	<div class="block footer-widget-<?php echo $i; ?>">
    	<?php sidebar( 'footer-' . $i ); ?>
	</div>
        <?php } ?>
	<?php } // End WHILE Loop ?>
	<div class="fix"></div>
</section><!--/#footer-widgets-->
<?php

	} // End IF Statement
} // End footer_sidebars()
}

/*-----------------------------------------------------------------------------------*/
/* Add customisable footer areas */
/*-----------------------------------------------------------------------------------*/

/**
 * Add customisable footer areas.
 *
 */
/*
if ( ! function_exists( 'footer_left' ) ) {
function footer_left () {
	$settings = get_dynamic_values( array( 'footer_left' => 'true', 'footer_left_text' => '[site_copyright]' ) );

	do_atomic( 'footer_left_before' );

	$html = '';

	if( 'true' == $settings['footer_left'] ) {
		$html .= '<p>' . stripslashes( $settings['footer_left_text'] ) . '</p>';
	} else {
		$html .= '[site_copyright]';
	}

	$html = apply_filters( 'footer_left', $html );

	echo $html;

	do_atomic( 'footer_left_after' );
} // End footer_left()
}

if ( ! function_exists( 'footer_right' ) ) {
function footer_right () {
	$settings = get_dynamic_values( array( 'footer_right' => 'true', 'footer_right_text' => '[site_credit]' ) );

	do_atomic( 'footer_right_before' );

	$html = '';

	if( 'true' == $settings['footer_right'] ) {
		$html .= '<p>' . stripslashes( $settings['footer_right_text'] ) . '</p>';
	} else {
		$html .= '[site_credit]';
	}

	$html = apply_filters( 'footer_right', $html );

	echo $html;

	do_atomic( 'footer_right_after' );
} // End footer_right()
}
*/




?>
