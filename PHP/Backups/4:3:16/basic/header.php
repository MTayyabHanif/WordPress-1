
<?php
/* Header Template */
?><!DOCTYPE html>
<?php
	$site_title = get_bloginfo( 'name' ); // Get site's title
	$site_url = network_site_url( '/' ); // Get site's url
	$site_description = get_bloginfo( 'description' ); // Get site description
?>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Exo+2|Signika:400,700,600|Istok+Web|Hammersmith+One|Chivo|Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>" />
<title>
<?php echo $site_title;?>
</title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<!-- Start JBox Install -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jboxcdn.com/0.3.2/jBox.min.js"></script>
<link href="http://code.jboxcdn.com/0.3.2/jBox.css" rel="stylesheet">
<!-- End JBox Install -->
</head>
<body>
<div id="wrapper">

	<div id="inner-wrapper">

<header id="header" class="col-full">
<?php echo '<a href="'.$site_url.'">'.$site_title.'</a>'; // Hyperlinked site title in header ?> 
</header>
