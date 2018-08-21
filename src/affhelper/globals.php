<?php

//Plugin Path
define( 'PLUGIN_PATH_AFFCPA', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL_AFFCPA', plugin_dir_url( __FILE__ ) );

//Ressoruces
global $AFFCPA_RESURL_CSS;
$AFFCPA_RESURL_CSS = PLUGIN_URL_AFFCPA . 'pages/ressources/css/';
global $AFFCPA_RESURL_JS;
$AFFCPA_RESURL_JS = PLUGIN_URL_AFFCPA . 'pages/ressources/js/';
global $AFFCPA_RESURL_IMG;
$AFFCPA_RESURL_IMG = PLUGIN_URL_AFFCPA . 'pages/ressources/img/';
global $AFFCPA_MENUPAGE_URL;
$AFFCPA_MENUPAGE_URL = admin_url() . 'admin.php?page=';

//Menu Items
global $MENU_NAME_OPTIONS;
$MENU_NAME_OPTIONS ='Affiliate CPA-Helper';
global $MENU_SLUG_OPTIONS;
$MENU_SLUG_OPTIONS ='affcpa_options';
global $MENU_NAME_GENERAL;
$MENU_NAME_GENERAL ='General';
//Sublevel -> List Projects
global $MENU_NAME_PROJECTS_EDIT;
$MENU_NAME_PROJECTS_EDIT ='Projects';
global $MENU_SLUG_PROJECTS_EDIT;
$MENU_SLUG_PROJECTS_EDIT ='affcpa_projects_edit';
//Sublevel -> List AdvNetworks
global $MENU_NAME_ADVNETWORKS_EDIT;
$MENU_NAME_ADVNETWORKS_EDIT ='Advertising Networks';
global $MENU_SLUG_ADVNETWORKS_EDIT;
$MENU_SLUG_ADVNETWORKS_EDIT ='affcpa_advnetworks_edit';
//Sublevel -> Add AdvNetwork
global $MENU_NAME_ADVNETWORKS_ADD;
$MENU_NAME_ADVNETWORKS_ADD ='Add Advertising-Network';
global $MENU_SLUG_ADVNETWORKS_ADD;
$MENU_SLUG_ADVNETWORKS_ADD ='affcpa_advnetworks_add';


//Database
global $wpdb;
global $AFFCPA_TABLE_ADVNETWORKS;
$AFFCPA_TABLE_ADVNETWORKS = $wpdb->prefix . 'affcpa_advnetworks';
global $AFFCPA_TABLE_ADVNETWORKS_VERSION;
$AFFCPA_TABLE_ADVNETWORKS_VERSION = '1.0';
global $AFFCPA_TABLE_PROJECTS;
$AFFCPA_TABLE_PROJECTS = $wpdb->prefix . 'affcpa_projects';
global $AFFCPA_TABLE_PROJECTS_VERSION;
$AFFCPA_TABLE_PROJECTS_VERSION = '1.0';






































































































































































































































