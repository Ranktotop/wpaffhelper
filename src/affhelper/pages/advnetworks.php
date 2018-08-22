<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
require_once(PLUGIN_PATH_AFFCPA . 'control/advnetworks.php');
global $UTOOLS;
$UTOOLS->printHTMLHead();?>

<body>
<?php $UTOOLS->printTopMenu(); ?>
<div class="wrap affcpa_content">	
		<?php
            if (isset($_POST['advertisingNetworks'])) {
                echo '<div id="message" class="updated"><p>Settings saved!</p></div>';
            }
            ?>
            <div id="pageHeading"><h2><?php _e("Advertising Networks")?></h2></div>
			

	<form method="post" id="form_advnetworks_list"
		action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
			
			<?php wp_nonce_field( 'formSource', '_form_advnetworks_list' ); ?>
		<h3><?php _e('Existing Networks')?>:</h3>
		<table class="affcpa_table affcpa_table-rounded">
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
			<input type="submit" name="submit_form_advnetworks_change" class="affcpa-btn"
				value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>
</body>
<html>
