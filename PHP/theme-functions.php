<?php

/*-----------------------------------------------------------------------------------*/
/* Includes > Theme Functions */
/*-----------------------------------------------------------------------------------*/









/*-----------------------------------------------------------------------------------*/
/* Google Maps */
/*-----------------------------------------------------------------------------------*/

/*function woo_maps_contact_output($args){

	$key = get_option('woo_maps_apikey');

	// No More API Key needed

	if ( !is_array($args) )
		parse_str( $args, $args );

	extract($args);
	$mode = '';
	$streetview = 'off';
	$map_height = get_option('woo_maps_single_height');
	$featured_w = get_option('woo_home_featured_w');
	$featured_h = get_option('woo_home_featured_h');
	$zoom = get_option('woo_maps_default_mapzoom');
	$type = get_option('woo_maps_default_maptype');
	$marker_title = get_option('woo_contact_title');
	if ( $zoom == '' ) { $zoom = 6; }
	$lang = get_option('woo_maps_directions_locale');
	$locale = '';
	if(!empty($lang)){
		$locale = ',locale :"'.$lang.'"';
	}
	$extra_params = ',{travelMode:G_TRAVEL_MODE_WALKING,avoidHighways:true '.$locale.'}';

	if(empty($map_height)) { $map_height = 250;}

	if(is_home() && !empty($featured_h) && !empty($featured_w)){
	?>
    <div id="single_map_canvas" style="width:<?php echo intval( $featured_w ); ?>px; height: <?php echo intval( $featured_h ); ?>px"></div>
    <?php } else { ?>
    <div id="single_map_canvas" style="width:100%; height: <?php echo $map_height; ?>px"></div>
    <?php } ?>
    <?php $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min'; ?>
    <script src="<?php echo esc_attr( esc_url( get_template_directory_uri() . '/includes/js/markers' . $suffix . '.js' ) ); ?>" type="text/javascript"></script>
    <script type="text/javascript">
		jQuery(document).ready(function(){
			function initialize() {


			<?php if($streetview == 'on'){ ?>


			<?php } else { ?>

			  	<?php switch ($type) {
			  			case 'G_NORMAL_MAP':
			  				$type = 'ROADMAP';
			  				break;
			  			case 'G_SATELLITE_MAP':
			  				$type = 'SATELLITE';
			  				break;
			  			case 'G_HYBRID_MAP':
			  				$type = 'HYBRID';
			  				break;
			  			case 'G_PHYSICAL_MAP':
			  				$type = 'TERRAIN';
			  				break;
			  			default:
			  				$type = 'ROADMAP';
			  				break;
			  	} ?>

			  	var myLatlng = new google.maps.LatLng(<?php echo $geocoords; ?>);
				var myOptions = {
				  zoom: <?php echo $zoom; ?>,
				  center: myLatlng,
				<?php if(get_option('woo_maps_scroll') == 'true'){ ?>
				  scrollwheel: false,
				  <?php } ?>
				  mapTypeId: google.maps.MapTypeId.<?php echo $type; ?>
				};
			  	var map = new google.maps.Map(document.getElementById("single_map_canvas"),  myOptions);

				<?php if($mode == 'directions'){ ?>
			  	directionsPanel = document.getElementById("featured-route");
 				directions = new GDirections(map, directionsPanel);
  				directions.load("from: <?php echo esc_js( $from ); ?> to: <?php echo esc_js( $to ); ?>" <?php if($walking == 'on'){ echo $extra_params;} ?>);
			  	<?php
			 	} else { ?>

			 		<?php
			 			$map_vars = array(
			 				'the_title' => $marker_title,
			 				'callout' => get_option('woo_maps_callout_text'),
			 				'the_link' => get_permalink( get_the_id() ),
			 				'root' => esc_url( get_template_directory_uri() )
			 			);
			 		?>
			 		var mapData = <?php echo json_encode( $map_vars ); ?>;

			 		var root = mapData.root;
			 		var callout = mapData.callout;
			 		var the_link = mapData.the_link;
			 		var the_title = mapData.the_title;

			  		var point = new google.maps.LatLng(<?php echo $geocoords; ?>);

	  			<?php
			 	if(is_page()){
			 		$custom = get_option('woo_cat_custom_marker_pages');
					if(!empty($custom)){
						$color = $custom;
					}
					else {
						$color = get_option('woo_cat_colors_pages');
						if (empty($color)) {
							$color = 'red';
						}
					}
			 	?>
			 		var color = '<?php echo $color; ?>';
			 		createMarker(map,point,root,the_link,the_title,color,callout);
			 	<?php } else { ?>
			 		var color = '<?php echo get_option('woo_cat_colors_pages'); ?>';
	  				createMarker(map,point,root,the_link,the_title,color,callout);
				<?php
				}
					if(isset($_POST['woo_maps_directions_search'])){ ?>

					directionsPanel = document.getElementById("featured-route");
 					directions = new GDirections(map, directionsPanel);
  					directions.load("from: <?php echo htmlspecialchars($_POST['woo_maps_directions_search']); ?> to: <?php echo $address; ?>" <?php if($walking == 'on'){ echo $extra_params;} ?>);



					directionsDisplay = new google.maps.DirectionsRenderer();
					directionsDisplay.setMap(map);
    				directionsDisplay.setPanel(document.getElementById("featured-route"));

					<?php if($walking == 'on'){ ?>
					var travelmodesetting = google.maps.DirectionsTravelMode.WALKING;
					<?php } else { ?>
					var travelmodesetting = google.maps.DirectionsTravelMode.DRIVING;
					<?php } ?>
					var start = '<?php echo htmlspecialchars($_POST['woo_maps_directions_search']); ?>';
					var end = '<?php echo $address; ?>';
					var request = {
       					origin:start,
        				destination:end,
        				travelMode: travelmodesetting
    				};
    				directionsService.route(request, function(response, status) {
      					if (status == google.maps.DirectionsStatus.OK) {
        					directionsDisplay.setDirections(response);
      					}
      				});

  					<?php } ?>
				<?php } ?>
			<?php } ?>


			  }
			  function handleNoFlash(errorCode) {
				  if (errorCode == FLASH_UNAVAILABLE) {
					alert("Error: Flash doesn't appear to be supported by your browser");
					return;
				  }
				 }



		initialize();

		});
	jQuery(window).load(function(){

		var newHeight = jQuery('#featured-content').height();
		newHeight = newHeight - 5;
		if(newHeight > 300){
			jQuery('#single_map_canvas').height(newHeight);
		}

	});

	</script>

<?php
}
*/

?>








