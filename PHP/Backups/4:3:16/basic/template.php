<?php

/**
 * Before Content
 * Wraps all projects content in wrappers which match the theme markup
 */
if ( ! function_exists( 'projects_before_content' ) ) {
	function projects_before_content() {
		?>
		<!-- #content Starts -->
		<?php content_before(); ?>
	    <div id="content" class="col-full">

	    	<div id="main-sidebar-container">

				<!-- #main Starts -->
				<?php main_before(); ?>
				<div id="main" class="col-left">

	    <?php
	} // End projects_before_content()
}

/**
 * After Content
 * Closes the wrapping divs
 */
if ( ! function_exists( 'projects_after_content' ) ) {
	function projects_after_content() {
		?>

				</div><!-- /#main -->
		        <?php main_after(); ?>

		        <?php do_action( 'projects_sidebar' ); ?>

	        </div><!-- /#main-sidebar-container -->

	    </div><!-- /#content -->
		<?php content_after(); ?>
	    <?php
	} // End projects_after_content()
}


?>
