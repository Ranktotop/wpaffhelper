<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
require_once(PLUGIN_PATH_AFFCPA . 'control/advnetworks.php');
global $AFFCPA_RESURL_CSS;
//Menu Items
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

global $AFFCPA_MENUPAGE_URL;
?>



<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?php echo $AFFCPA_RESURL_CSS ?>menupage.css">
   <title>CSS MenuMaker</title>
</head>
<body>
<div id='affcpa_menu'>
<ul>
   <li class='active'><a href='<?php echo $AFFCPA_MENUPAGE_URL.$MENU_SLUG_OPTIONS ?>'><span><?php echo $MENU_NAME_GENERAL ?></span></a></li>
   <li><a href='<?php echo $AFFCPA_MENUPAGE_URL.$MENU_SLUG_ADVNETWORKS_ADD ?>'><span><?php echo $MENU_NAME_ADVNETWORKS_ADD ?></span></a></li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>

<div class="wrap woocommerce_affiliate_codes">	
		<?php
            if (isset($_POST['advertisingNetworks'])) {
                echo '<div id="message" class="updated"><p>Settings saved!</p></div>';
            }
            ?>
		
			<h2><?php _e("Advertising Networks")?></h2>

	<form method="post" id="form_advnetworks_list"
		action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
			
			<?php wp_nonce_field( 'formSource', '_form_advnetworks_list' ); ?>
		<h2 class="affcpa_h2"><?php _e('Existing Networks')?>:</h2>
		<table class="widefat">
			<thead>
				<tr>
					<th colspan="2"><?php _e('Name')?></th>
					<th colspan="2"><?php _e('Google Account ID')?></th>
					<th colspan="2"><?php _e('Google Conversion ID')?></th>
					<th colspan="2"><?php _e('Bing Account ID')?></th>
					<th colspan="1"><?php _e('Delete')?></th>
				</tr>
			</thead>
			<tbody>
				<?php echo $advnetworks->expandAdvNetworkRows(); ?>
			</tbody>
		</table>	
		<p class="submit">
			<input type="submit" name="submit_form_advnetworks_change" class="button-primary"
				value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>
</body>
<html>
