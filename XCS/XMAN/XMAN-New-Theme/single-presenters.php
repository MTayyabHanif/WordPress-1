<?php
/**
 * Archive Template
 *
 * The archive template is a placeholder for archives that don't have a template file. 
 * Ideally, all archives would be handled by a more appropriate template according to the
 * current page context (for example, `tag.php` for a `post_tag` archive).
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;
 get_header();

?>      

    <!-- #content Starts -->
	<?php woo_content_before(); ?>

    <div id="content" class="col-full everythingpresenters">
    
    	<div id="main-sidebar-container">    
		
            <!-- #main Starts -->
            <?php woo_main_before(); ?>

            <section id="main" class="col-left">
            	
<!--body content-->  

<?php
  woo_loop_before();
  
  if (have_posts()) { $count = 0;
    while (have_posts()) { the_post(); $count++;
      
      woo_get_template_part( 'content', get_post_type() ); // Get the post content template file, contextually.
    }
  }

  ?>
<br><br>    

</div>                    
            </section><!-- /#main -->

            <?php woo_main_after(); ?>

            <?php get_sidebar(); ?>
    
		</div><!-- /#main-sidebar-container -->         

<div id="content" class="col-full shortcodeeverythingpresenters">
<?php woo_content_after();
echo do_shortcode('[jwl-utmce-widget id=205]'); // Text on 
?>
</div>   

		<?php get_sidebar( 'alt' ); ?>       

    </div><!-- /#content -->
		
<?php get_footer(); ?>