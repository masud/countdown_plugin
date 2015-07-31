<?php
/*
Plugin Name: CountDown
Plugin URI: 
Version: 1.0
Author: m$d
Authro URI : http://www.github.com/masud
Description: Supercharge your WordPress optin plugin
License: GPLv2 or later
Text Domain: cd
*/

define("MSD_COUNTDOWN", "msd_countdown");



require_once 'helper/views.php';


add_action('init', function(){
	require_once 'actions/countdown_action.php';
	
	require_once 'shortcode/countdown.php';


});

// create custom plugin settings menu
add_action('admin_menu', 'msd_create_countdown_menu');
function msd_create_countdown_menu() {
	//create new top-level menu
	add_menu_page(
	  	'CountDown Menu', 
	  	'CountDown', 
	  	'administrator', 
	  	__FILE__, 
	  	'msd_countdown_settings_page',
		'dashicons-admin-plugins'
	);

	

}




function msd_countdown_settings_page(){
	$data 		= array();
	$countdown_event_id 	= get_option(MSD_COUNTDOWN);
	$countdown_event 	  	= get_post($countdown_event_id);
	$countdown_event_meta   = get_post_meta( $countdown_event_id );
	

	$data['msd_countdown_event_start']  = $countdown_event_meta && $countdown_event_meta['msd-countdown-date'][0] ?
								        $countdown_event_meta['msd-countdown-date'][0] : "";	

	//echo "<pre>";var_dump($data); die();

	echo msd_view(__DIR__."/views/inc/registration/countdown_html.php", $data);
}

class MSD_COUNTDOWN
{
    /** * Hook WordPress */
    public function __construct() {
      add_action('wp_enqueue_scripts',	  [$this, 'msd_loaOptinFontentScripts']);
      add_action('admin_enqueue_scripts', [$this, 'msd_loadBackendScriptsCountdown']);
    }

    /**
     * Load Frontend Scripts
     *
     * @access public
     * @return void
     * @since 0.1
     */

    function msd_loadBackendScriptsCountdown(){
    
    wp_enqueue_script('MSD_COUNTDOWN_MOMENT_JS' ,'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',array('jquery'));       
    wp_enqueue_script('MSD_COUNTDOWN_BOOTSTRAP_JS', plugins_url('assets/vendor/bootstrap/js/bootstrap.min.js', __FILE__), array('jquery'));  

    
    wp_enqueue_script('MSD_COUNTDOWN_DATETIME_JS', plugins_url('assets/vendor/bootstrapdatetime/js/bootstrap-datetimepicker.min.js', __FILE__), array('jquery'));  
    wp_enqueue_script('MSD_COUNTDOWN_APP_JS', plugins_url('assets/js/app.js', __FILE__), array('jquery'));   
   
    wp_enqueue_style('MSD_COUNTDOWN_DATETIME_CSS' , plugins_url('assets/vendor/bootstrapdatetime/css/bootstrap-datetimepicker.min.css', __FILE__));     
    wp_enqueue_style('MSD_COUNTDOWN_BOOTSTRAP_CSS', plugins_url('assets/vendor/bootstrap/css/bootstrap.min.css', __FILE__));  
    wp_enqueue_style('MSD_COUNTDOWN_FONTAWESOME' ,plugins_url('assets/vendor/font-awesome/css/font-awesome.min.css', __FILE__));
    wp_enqueue_style( '-MSD_COUNTDOWN_STYLE_CSS', plugins_url('assets/css/style_.css', __FILE__), array());
    }


    function msd_loaOptinFontentScripts(){

         $msd_countdown_id   = get_option(MSD_COUNTDOWN);  
         $msd_countdown_start   = get_post_meta($msd_countdown_id, 'msd-countdown-date', true);  

         // echo "<pre>";var_dump($msd_countdown_start); die();

         //COUNTDOWN Event Days -->
        $msd_countdown_start1   = date("d M Y h:m:s", strtotime($msd_countdown_start)); 

      

        wp_enqueue_style( '-MSD_COUNTDOWN_FONT_STYLE_CSS', plugins_url('assets/css/style.css', __FILE__), array());    
        wp_enqueue_style('MSD_COUNTDOWN_DATETIME_CSS' , plugins_url('assets/vendor/bootstrapdatetime/css/bootstrap-datetimepicker.min.css', __FILE__));     
  
        
        wp_enqueue_script('MSD_COUNTDOWN_MOMENT_JS' ,'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',array('jquery'));       
        wp_enqueue_script('MSD_COUNTDOWN_DATETIME_JS', plugins_url('assets/vendor/bootstrapdatetime/js/bootstrap-datetimepicker.min.js', __FILE__), array('jquery'));  
        wp_enqueue_script('MSD_COUNTDOWN_COUNTDOWN', plugins_url('assets/vendor/countdown/jquery.countdown.min.js', __FILE__), array('jquery'));   
    	wp_enqueue_script('MSD_COUNTDOWN_COUNTDOWN_JS', plugins_url('assets/js/countdown.js', __FILE__), array('jquery'));   
      
        wp_enqueue_script('MSD_COUNTDOWN_APP_JS', plugins_url('assets/js/app.js', __FILE__), array('jquery'));   
        wp_localize_script('MSD_COUNTDOWN_APP_JS', 'msd_countdown_event_start', $msd_countdown_start1);


    }

}

// Kickstart the class
new MSD_COUNTDOWN();

