<?php

/*
 * Changes excerpt title from 'Excerpt' to 'Title'
*/

add_action( 'admin_init',  'change_excerpt_box_title' );
function change_excerpt_box_title() {
    remove_meta_box( 'postexcerpt', 'speakers', 'side' );
    add_meta_box('postexcerpt', __('Title'), 'post_excerpt_meta_box', 'speakers', 'normal', 'high');
} 
?>

<?php
// HIDE THE SLUG METABOX AND SLUG SCREEN OPTIONS
   function hide_slug_options() {
    global $post;
    global $pagenow;
    $hide_slugs = "<style type=\"text/css\">#slugdiv, [for=\"slugdiv-hide\"] { display: none; }</style>\n";
    if (is_admin() && $pagenow=='post-new.php' OR $pagenow=='speakers.php') print($hide_slugs);
   }
   add_action( 'admin_head', 'hide_slug_options'  );

?>






