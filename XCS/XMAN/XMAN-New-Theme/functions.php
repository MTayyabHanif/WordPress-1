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

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'canvas', get_template_directory_uri() . '/style.css' );

}


add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

// add tag support to pages
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');


// apply tags to attachments
function wptp_add_tags_to_attachments() {
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
?>

<?php
// HIDE THE SLUG METABOX AND SLUG SCREEN OPTIONS
   function hide_slug_options() {
    global $post;
    global $pagenow;
    $hide_slugs = "<style type=\"text/css\">#slugdiv, [for=\"slugdiv-hide\"] { display: none; }</style>\n";
    if (is_admin() && $pagenow=='post-new.php' OR $pagenow=='presenters.php') print($hide_slugs);
   }
   add_action( 'admin_head', 'hide_slug_options'  );

?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Creates 'title' custom meta box */
/*-----------------------------------------------------------------------------------*/
/**
 * Adds a social media box to the main column on the 'Presenters' post edit screens.
 */
// Add the Meta Box
function add_title_meta_box() {
    add_meta_box(
        'title_meta_box', // $id
        'Title', // $title 
        'show_title_meta_box', // $callback
        'presenters', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_title_meta_box');

// Field Array
$prefix = 'title_';
$title_meta_fields = array(
    array(
        'desc'  => '<br>Example: CEO of XYZ Corp.',
        'id'    => $prefix.'text',
        'type'  => 'text'
    ),
);

// The Callback
// The Callback
function show_title_meta_box() {
global $title_meta_fields, $post;
// Use nonce for verification
echo '<input type="hidden" name="title_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
     
    // Begin the field table and loop
    echo '<table class="form-table" style="width:0px;">';
    foreach ($title_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th style="padding:0;"><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td style="padding-left:0px;">';
                switch($field['type']) {
                    // case items will go here
// text
case 'text':
    echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" />
        <br /><span class="description">'.$field['desc'].'</span>';
break;
                } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_title_meta($post_id) {
    global $title_meta_fields;
     
    // verify nonce
    if (!wp_verify_nonce($_POST['title_meta_box_nonce'], basename(__FILE__))) 
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['presenters']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
     
    // loop through fields and save the data
    foreach ($title_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_title_meta');
/*-----------------------------------------------------------------------------------*/
/* End of new 'title' custom field */
/*-----------------------------------------------------------------------------------*/
?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Creates social media custom meta box */
/*-----------------------------------------------------------------------------------*/
/**
 * Adds a social media box to the main column on the 'Presenters' post edit screens.
 */
// Add the Meta Box
function add_socialmedia_meta_box() {
    add_meta_box(
        'socialmedia_meta_box', // $id
        'Social Media', // $title 
        'show_socialmedia_meta_box', // $callback
        'presenters', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_socialmedia_meta_box');

// Field Array
$prefix = 'socialmedia_';
$socialmedia_meta_fields = array(
    array(
        'label'=> '<div class="socialmedia-prepend" style="font-size: 13px; line-height: 19px; height:20px; float:left;">Twitter <img src="/manufacturing/wp-content/uploads/sites/14/2015/07/twitter-icon-30.png" width="13px" height="13px"></div>',
        'desc'  => 'Add your <b style="color:#5ea9dd;">Twitter URL</b> here.',
        'id'    => $prefix.'twitterbox',
        'type'  => 'text'
    ),
        array(
        'label'=> '<div class="socialmedia-prepend" style="font-size: 13px; line-height: 19px; height:20px; float:left;">Facebook <img src="/manufacturing/wp-content/uploads/sites/14/2015/08/fb_black-30.png" width="13px" height="13px"></div>',
        'desc'  => 'Add a <b style="color:#405E9B;">Facebook URL</b> here.',
        'id'    => $prefix.'facebookbox',
        'type'  => 'text'
    ),
            array(
        'label'=> '<div class="socialmedia-prepend" style="font-size: 13px; line-height: 19px; height:20px; float:left;">LinkedIn <img src="/manufacturing/wp-content/uploads/sites/14/2015/07/linkedin-icon-30.png" width="13px" height="13px"></div>',
        'desc'  => 'Add your <b style="color:#1985BC;">LinkedIn URL</b> here.',
        'id'    => $prefix.'linkedinbox',
        'type'  => 'text'
    ),
        array(
        'label'=> '<div class="socialmedia-prepend" style="font-size: 13px; line-height: 19px; height:20px; float:left;">Google Plus <img src="/manufacturing/wp-content/uploads/sites/14/2015/08/google-plus-blk-30.png" width="14px" height="14px"></div>',
        'desc'  => 'Add a <b style="color:#DD4B39;">Google Plus URL</b> here.',
        'id'    => $prefix.'googlebox',
        'type'  => 'text'
    ),
        array(
        'label'=> '<div class="socialmedia-prepend" style="font-size: 13px; line-height: 19px; height:20px; float:left;">Custom link <img src="/manufacturing/wp-content/uploads/sites/14/2015/07/custom-link-30.png" width="13px" height="13px"></div>',
        'desc'  => 'Add a <b style="color:#5A6CAC;">Custom URL</b> here.',
        'id'    => $prefix.'customlinkbox',
        'type'  => 'text'
    ),

);

// The Callback
function show_socialmedia_meta_box() {
global $socialmedia_meta_fields, $post;
// Use nonce for verification
echo '<input type="hidden" name="socialmedia_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
     
    // Begin the field table and loop
    echo '<table class="form-table" style="width:0px;">';
    foreach ($socialmedia_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th style="padding:16px 0px 20px 0px;"><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td style="padding-left:0px;">';
                switch($field['type']) {
                    // case items will go here
                    // text
case 'text':
    echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" class"socialmedia-prepended" value="'.$meta.'" size="60" />
        <br /><span class="description">'.$field['desc'].'</span>';
break;


// textarea
case 'textarea':
    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
        <br /><span class="description">'.$field['desc'].'</span>';
break;

// checkbox
case 'checkbox':
    echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
        <label for="'.$field['id'].'">'.$field['desc'].'</label>';
break;
                    // select
case 'select':
    echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
    foreach ($field['options'] as $option) {
        echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
    }
    echo '</select><br /><span class="description">'.$field['desc'].'</span>';
break;
                } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_socialmedia_meta($post_id) {
    global $socialmedia_meta_fields;
     
    // verify nonce
    if (!wp_verify_nonce($_POST['socialmedia_meta_box_nonce'], basename(__FILE__))) 
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['presenters']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
     
    // loop through fields and save the data
    foreach ($socialmedia_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_socialmedia_meta');
/*-----------------------------------------------------------------------------------*/
/* End of new social media custom field */
/*-----------------------------------------------------------------------------------*/
?>






<?php
/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>

