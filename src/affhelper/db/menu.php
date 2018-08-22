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
        $this->registerMenuItem(null,$MENU_NAME_GENERAL,$MENU_SLUG_OPTIONS,'build_options');        
        
        //Sublevel -> Projects
        $this->registerMenuItem(null,$MENU_NAME_PROJECTS_EDIT,$MENU_SLUG_PROJECTS_EDIT,'build_projects');
        
        //Sublevel -> List Advnetworks
        $this->registerMenuItem(null,$MENU_NAME_ADVNETWORKS_EDIT,$MENU_SLUG_ADVNETWORKS_EDIT,'build_advnetworks');         
        
        //Sublevel -> Add Advnetwork
        $this->registerMenuItem(null,$MENU_NAME_ADVNETWORKS_ADD,$MENU_SLUG_ADVNETWORKS_ADD,'build_advnetworks');         
       
    }
    
    function registerMenuItem($parentSlug=null,$name,$slug,$functionName=null){
        global $MENUITEMS;
        $menuItem = array();
        array_push($menuItem, $name, $slug);
        array_push($MENUITEMS,$menuItem);
        add_submenu_page($parentSlug, $name, $name, 'manage_options',$slug,array(
            $this,
            $functionName
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