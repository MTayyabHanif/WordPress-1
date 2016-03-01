<?php
/**
 * Default Content Template
 *
 * This template is the default content template. It is used to display the content of a
 * template file, when no more specific content-*.php file is available.
 *
 * @package WooFramework
 * @subpackage Template
 */

/**
 * Settings for this template file.
 *
 * This is where the specify the HTML tags for the title.
 * These options can be filtered via a child theme.
 *
 * @link http://codex.wordpress.org/Plugin_API#Filters
 */

?>
<div class="presenterspagetable">
    <div id="tableonepresenters">
    <?php if ( has_post_thumbnail() ): // pulling featured image to top - changed to align left ('aligncenter' for centering)?>
    <?php the_post_thumbnail( array(750,900), array( 'class' => 'aligncenter' ) ); ?>
    <?php endif; ?>
<?php
$title_before = '<h1 class="title" style="text-align:center;">';
$title_after = '</h1>';

if ( ! is_single() ) {
  $title_before = $title_before . '<a href="' . get_permalink( get_the_ID() ) . '" rel="bookmark" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
  $title_after = '</a>' . $title_after;
}



$page_link_args = apply_filters( 'woothemes_pagelinks_args', array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) );

woo_post_before();
?>
<article <?php post_class(); ?>>
<?php
  woo_post_inside_before();
?>  
<header>
    <?php the_title( $title_before, $title_after ); ?>
  </header>
<?php
  woo_post_meta();
?> 



<div class="excerptpresenterspage">
<?php // adds custom field DH created to frontend
$meta_values = get_post_meta( get_the_ID(), 'title_text', true) ;
if( ! empty( $meta_values ) ) {
  echo $meta_values;
}
?>
</div>

<?php /*
//Pulls in Excerpt 

echo '<div class="excerptpresenterspage">'; 
$my_excerpt = get_the_excerpt();
if ( '' != $my_excerpt ) {
  // Some string manipulation performed
}
echo $my_excerpt; // Outputs the processed value to the page 
echo  '</div>' ; */
?> 


<div class="socialmedialinks">

<?php // adds custom field DH created to frontend
$meta_values = get_post_meta( get_the_ID(), 'socialmedia_twitterbox', true) ;
if( ! empty( $meta_values ) ) {
  echo '<a href="';
  echo $meta_values;
  echo '" target="_blank">';
  echo '<img src="/manufacturing/wp-content/uploads/sites/14/2015/08/Twitter-icon-351.png"></a>';
}
?>

<?php // adds custom field DH created to frontend
$meta_values = get_post_meta( get_the_ID(), 'socialmedia_facebookbox', true) ;
if( ! empty( $meta_values ) ) {
  echo '<a href="';
  echo $meta_values;
  echo '" target="_blank">';
  echo '<img src="/manufacturing/wp-content/uploads/sites/14/2015/08/FB-Icon-35.png"></a>';
}
?>

<?php // adds custom field DH created to frontend
$meta_values = get_post_meta( get_the_ID(), 'socialmedia_linkedinbox', true) ;
if( ! empty( $meta_values ) ) {
  echo '<a href="';
  echo $meta_values;
  echo '" target="_blank">';
  echo '<img src="/manufacturing/wp-content/uploads/sites/14/2015/08/LinkedIn-Icon-351.png"></a>';
}
?>

<?php // adds custom field DH created to frontend
$meta_values = get_post_meta( get_the_ID(), 'socialmedia_googlebox', true) ;
if( ! empty( $meta_values ) ) {
  echo '<a href="';
  echo $meta_values;
  echo '" target="_blank">';
  echo '<img src="/manufacturing/wp-content/uploads/sites/14/2015/08/G-Icon-351.png"></a>';
}
?>

<?php // adds custom field DH created to frontend
$meta_values = get_post_meta( get_the_ID(), 'socialmedia_customlinkbox', true) ;
if( ! empty( $meta_values ) ) {
  echo '<a href="';
  echo $meta_values;
  echo '" target="_blank">';
  echo '<img src="http://exponential.singularityu.org/manufacturing/wp-content/uploads/sites/14/2015/08/Custom-Icons-35.png"></a>';
}
?>

</div>
</div>

    <div id="tabletwopresenters">
  <section class="entry" style="max-width:610px;">
      <?php // text editor content
        the_content();
        wp_link_pages( $page_link_args ) ;
      ?>

</div>


  </section><!-- /.entry -->
<?php
  woo_post_inside_after();
?>
</article><!-- /.post -->
<?php
  woo_post_after();
  comments_template();
?>