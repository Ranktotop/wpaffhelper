<?php
/*
 Plugin Name: Affiliate CPA-Helper
 Plugin URI: https://www.rank-to-top.de/
 Description: Support Creation of Tracking-Pages and URLs for Affiliates
 Version: 1.0
 Author: Marc Meese
 Author URI: https://www.rank-to-top.de/
 Min WP Version: 1.5
 Max WP Version: 5.0.4
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
require_once('helperTools.php');
require_once('globals.php');
require_once( PLUGIN_PATH_AFFCPA . 'db/database.php');
require_once( PLUGIN_PATH_AFFCPA . 'db/menu.php');

//Tracking JS Code
function affcpa_fire_trackingcodes() {
    wp_register_script( 'affcpa_tracking_script', PLUGIN_URL_AFFCPA .'pages/ressources/js/tracker.php', array('jquery'),'1.0', true);
    wp_enqueue_script('affcpa_tracking_script');
}

//Stylesheets
function affcpa_loadStyle()
{
    wp_enqueue_style( 'affcpa_basic_stylesheet', PLUGIN_URL_AFFCPA .'pages/ressources/css/style.css');
}

function affcpa_install() {    
    $affcpa_db = new affcpa_db();
    $affcpa_db->installAdvNetworksDB();
    $affcpa_db->installProjectsDB();   
}

register_activation_hook( __FILE__, 'affcpa_install' );
add_action( 'wp_enqueue_scripts','affcpa_fire_trackingcodes');
add_action('admin_enqueue_scripts', 'affcpa_loadStyle' );

?>