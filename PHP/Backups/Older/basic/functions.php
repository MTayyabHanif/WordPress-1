<?php

/*-----------------------------------*/
/* Start Theme Functions */
/*-----------------------------------*/

// Set path to WooFramework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/includes/';

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', // Options panel settings and custom settings
				'includes/theme-functions.php', // Custom theme functions
				'includes/theme-actions.php', // Theme actions & user defined hooks
				'includes/hooks.php', // Hook Manager
				'includes/hooks.class.php', // Hook Functions
				'functions/admin-hooks.php',
				'includes/theme-actions.php' // Theme Actions

				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*---------------------------------------*/
/* You can add custom functions below */
/*---------------------------------------*/

/* Add menus */
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'bobcat-menu' => __( 'Bobcat Menu' ),
			'lynx-menu' => __( 'Lynx Menu' )
		)
	);
}






?>