<?php
/**
 * Archive Template
 *
 * The archive template is a placeholder for archives that don't have a template file. 
 * Ideally, all archives would be handled by a more appropriate template according to the
 * current page context (for example, `tag.php` for a `post_tag` archive).
 *
 */

 //global $options;
 get_header();
?>

<nav id="lynx-menu">
    <?php wp_nav_menu( array( 'theme_location' => 'lynx-menu' ) );  // Lynx menu ?>
</nav>

<?php //wp_nav_menu( array( 'theme_location' => 'lynx-menu' ) ); ?>

    <!-- #content Starts -->
	<?php content_before(); ?>
    <div id="content lynx-content" class="col-full">
    
    	<div id="main-sidebar-container">    
		
            <!-- #main Starts -->
            <?php main_before(); ?>
            <section id="main" class="col-left">
            	
			<?php get_template_part( 'loop', 'archive' ); ?>
    
    <?php include ('lynx-advanced-form.php'); // Custom everything form ?>


            </section><!-- /#main -->
            <?php main_after(); ?>
    

    <?php include ('sidebar-canadian-lynx.php'); // Custom bobcat sidebar ?>
    
		</div><!-- /#main-sidebar-container -->         

		<?php //get_sidebar( 'alt' ); ?>       

    </div><!-- /#content -->
	<?php content_after(); ?>
		
<?php get_footer(); ?>