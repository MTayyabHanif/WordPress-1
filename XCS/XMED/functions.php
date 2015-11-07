<? php 

// don't run Wisepops script on live stream page
function live_stream_stop_script() {
    if( !is_page( 6911 )){
// Scripts below for removing Wisepops on a specific page: 
       wp_enqueue_script(
       	'wisepops',
       	'https://singularityxcs.wufoo.com/embed/p1uexrpy0hqbkdf/def/field7=');
    wp_enqueue_script(
    	'script',
    	'//wisepops.com/default/index/get-loader?user_id=6108');
    }
}
add_action('wp_enqueue_scripts', 'live_stream_stop_script');

?>

