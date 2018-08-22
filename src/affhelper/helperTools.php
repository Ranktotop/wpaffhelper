<?php
defined('ABSPATH') or die('No script kiddies please!');

class helperTools
{
    function printHTMLHead(){
        global $AFFCPA_RESURL_CSS;
        ?>
        <!doctype html>
		<html lang=''>
        <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo $AFFCPA_RESURL_CSS ?>menupage.css">
        </head>
        <?php
    }

    function printTopMenu()
    {        
        
        $currentPageSlug = $this->getCurrentPageSlug();
        //Menu URL-Base
        global $AFFCPA_MENUPAGE_URL;
        
        // Menu Items
        global $MENU_SLUG_OPTIONS;
        global $MENU_NAME_GENERAL;
        
        $page_options = $currentPageSlug == $MENU_SLUG_OPTIONS ? ' class="active"' : "";
        
        global $MENU_NAME_PROJECTS_EDIT;
        global $MENU_SLUG_PROJECTS_EDIT;
        $page_projects_edit = $currentPageSlug == $MENU_SLUG_PROJECTS_EDIT ? ' class="active"' : "";
        
        // Sublevel -> List AdvNetworks
        global $MENU_NAME_ADVNETWORKS_EDIT;
        global $MENU_SLUG_ADVNETWORKS_EDIT;
        $page_advnetworks_edit = $currentPageSlug == $MENU_SLUG_ADVNETWORKS_EDIT ? ' class="active"' : "";
        
        // Sublevel -> Add AdvNetwork
        global $MENU_NAME_ADVNETWORKS_ADD;
        global $MENU_SLUG_ADVNETWORKS_ADD;
        $page_advnetworks_add = $currentPageSlug == $MENU_SLUG_ADVNETWORKS_ADD ? ' class="active"' : "";         
        ?>
<div id='affcpa_menu'>
	<ul>		
		<?php $this->printMenuItems()	?>
	</ul>
</div>
<?php
    }
    
    private function printMenuItems(){
        global $MENUITEMS;
        foreach($MENUITEMS as $item){
           echo $this->getMenuItem($item[0],$item[1]);
        }
    }       
    
    private function getMenuItem($name, $slug){
        global $AFFCPA_MENUPAGE_URL;
        $currentMenuItem = $this->getCurrentPageSlug() == $slug ? ' class="active"' : ""; 
       return '<li '.$currentMenuItem.'><a href="'.$AFFCPA_MENUPAGE_URL.$slug.'"><span>'.$name.'</span></a></li>';
    }
    
    private function getCurrentPageSlug(){
        global $AFFCPA_MENUPAGE_URL;
        return str_replace($AFFCPA_MENUPAGE_URL,'',$this->getCurrentURL());
    }
    
    private function getCurrentURL(){
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }
}
