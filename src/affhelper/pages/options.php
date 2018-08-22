<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
//require_once(PLUGIN_PATH_AFFCPA . 'control/options.php');
global $UTOOLS;
$UTOOLS->printHTMLHead();?>

<body>
<?php $UTOOLS->printTopMenu(); ?>
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
