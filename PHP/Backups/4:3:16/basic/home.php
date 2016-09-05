<?php
/**
 * Home Page Template
 *
 */

get_header();
?>

<nav id="menu">
	<?php wp_nav_menu('primary'); ?>
</nav>

    <!-- #content Starts -->
	<?php content_before(); ?>
    <div id="content" class="col-full">
    
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
    
            <?php get_sidebar(); ?>

		</div><!-- /#main-sidebar-container -->         

    </div><!-- /#content -->
	<?php content_after(); ?>

<?php get_footer('footer.php'); ?>