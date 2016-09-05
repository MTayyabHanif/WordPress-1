<?php
/**
 * Single Post Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a post ('post' post_type).
 * @link http://codex.wordpress.org/Post_Types#Post
 *
 */

get_header();
?>  

<nav id="bobcat-menu">
	<?php wp_nav_menu( array( 'theme_location' => 'bobcat-menu' ) ); ?>
</nav>
    <!-- #content Starts -->
	<?php content_before(); ?>
    <div id="content bobcats-content" class="col-full">
    
    	<div id="main-sidebar-container">    

            <!-- #main Starts -->
            <?php main_before(); ?>
            <section id="main">                       
<?php
	loop_before();
	
	if (have_posts()) { $count = 0;
		while (have_posts()) { the_post(); $count++;
			
			get_template_part( 'content', get_post_type() ); // Get the post content template file, contextually.
		}
	}
	
	loop_after();
?>     
            </section><!-- /#main -->
            <?php main_after(); ?>
    
        <?php include ('sidebar-bobcats.php'); // Custom bobcat sidebar ?>

		</div><!-- /#main-sidebar-container -->         


    </div><!-- /#content -->
	<?php content_after(); ?>

<?php get_footer('footer.php'); ?>




