<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;

 woo_footer_top();
 	woo_footer_before();
?>
	<footer style="color:#203a8e;" id="footer" class="col-full" align="center">
		
		&copy; <?php echo date("Y") ?> <a style="color:#203a8e;" href="http://singularityu.org/">Singularity Education Group.</a> All Rights Reserved. <a style="color:#203a8e;" href="http://exponential.singularityu.org/terms-of-use/"> Terms of Use.</a>		

	</footer>

	<?php woo_footer_after(); ?>

	</div><!-- /#inner-wrapper -->

</div><!-- /#wrapper -->

<div class="fix"></div><!--/.fix-->

<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>