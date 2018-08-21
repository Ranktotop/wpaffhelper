<?php
class Affcpa_Menu
{
    private static $instance;

    /* ...... */
    static function GetInstance()
    {
        if (! isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //Load Menu
    public function create_menu()
    {
        //Menu Items
        global $MENU_NAME_OPTIONS;
        global $MENU_SLUG_OPTIONS;
        
        global $MENU_NAME_GENERAL;
        
        global $MENU_NAME_PROJECTS_EDIT;
        global $MENU_SLUG_PROJECTS_EDIT;
        
        //Sublevel -> List AdvNetworks
        global $MENU_NAME_ADVNETWORKS_EDIT;
        global $MENU_SLUG_ADVNETWORKS_EDIT;
        
        //Sublevel -> Add AdvNetwork
        global $MENU_NAME_ADVNETWORKS_ADD;
        global $MENU_SLUG_ADVNETWORKS_ADD;
        
        //Admin Menu
        //Toplevel -> Admin-Menu
        add_menu_page($MENU_NAME_OPTIONS, $MENU_NAME_OPTIONS, 'manage_options',$MENU_SLUG_OPTIONS, array(
            $this,
            'build_options'
        ));
        
        //Toplevel -> Duplicate
        add_submenu_page($MENU_SLUG_OPTIONS, $MENU_NAME_GENERAL, $MENU_NAME_GENERAL, 'manage_options',$MENU_SLUG_OPTIONS);
        
        //Sublevel -> Projects
        add_submenu_page($MENU_SLUG_OPTIONS, $MENU_NAME_PROJECTS_EDIT, $MENU_NAME_PROJECTS_EDIT, 'manage_options',$MENU_SLUG_PROJECTS_EDIT, array(
            $this,
            'build_projects'
        ));
        
        //Sublevel -> List Advnetworks
        add_submenu_page($MENU_SLUG_OPTIONS, $MENU_NAME_ADVNETWORKS_EDIT, $MENU_NAME_ADVNETWORKS_EDIT, 'manage_options',$MENU_SLUG_ADVNETWORKS_EDIT, array(
            $this,
            'build_advnetworks'
        ));   
        
        //Sublevel -> Add Advnetwork
        add_submenu_page(null, $MENU_NAME_ADVNETWORKS_ADD, $MENU_NAME_ADVNETWORKS_ADD, 'manage_options',$MENU_SLUG_ADVNETWORKS_ADD, array(
            $this,
            'build_advnetworks'
        ));   
    }
    function build_options()
    {
        require_once (PLUGIN_PATH_AFFCPA . "pages/options.php");
    }    
    
    function build_projects()
    {
        //require_once (PLUGIN_PATH_AFFCPA . "pages/projects.php");
    }
    
    function build_advnetworks()
    {
        require_once (PLUGIN_PATH_AFFCPA . 'pages/advnetworks.php');
    }
    
   

    //Start Function
    public function init()
    {
        add_action('admin_menu', array(
            $this,
            'create_menu'
        ));      
    }
}
defined('ABSPATH') or die('No script kiddies please!');

$affcpa_menu = Affcpa_Menu::GetInstance();
$affcpa_menu->init();
?>