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

<nav id="bobcat-menu">
    <?php wp_nav_menu( array( 'theme_location' => 'bobcat-menu' ) );  // Bobcat menu ?>
</nav>

<?php //wp_nav_menu( array( 'theme_location' => 'bobcat-menu' ) ); ?>

    <!-- #content Starts -->
	<?php content_before(); ?>
    <div id="content bobcats-content" class="col-full">
    
    	<div id="main-sidebar-container">    
		
            <!-- #main Starts -->
            <?php main_before(); ?>
            <section id="main" class="col-left">
            	
			<?php get_template_part( 'loop', 'archive' ); ?>

            </section><!-- /#main -->
            
            <!--Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>-->

            <!--Gender:
            <input type="radio" name="gender"
            <?php //if (isset($gender) && $gender=="female") echo "checked";?>
            value="female">Female
            <input type="radio" name="gender"
            <?php //if (isset($gender) && $gender=="male") echo "checked";?>
            value="male">Male -->
            
            
            


            <?php main_after(); ?>
    
    <?php include ('sidebar-bobcats.php'); // Custom bobcat sidebar ?>

            <?php //get_sidebar('sidebar-bobcats.php'); ?>
    
		</div><!-- /#main-sidebar-container -->         

    </div><!-- /#content -->
	<?php content_after(); ?>
		
<?php get_footer(); ?>