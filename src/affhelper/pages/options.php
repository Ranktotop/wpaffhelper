<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>
<div class="wrap woocommerce_affiliate_codes">
	<script>
				//todo: This should be enqued
				jQuery(document).ready(function(){
					jQuery('.woocommerce_affiliate_codes .documentation').hide().before('<p><a class="reveal-documentation" href="#">Documentation</a></p>')
					jQuery('.reveal-documentation').click(function(){
						jQuery(this).parent().siblings('.documentation').slideToggle();
						return false;
					});
				});
			</script>
		
		<?php
            if (isset($_POST['wc_affcodes'])) {
                echo '<div id="message" class="updated"><p>Settings saved</p></div>';
            }
            ?>
		
			<h2>WooCommerce Affiliate Codes</h2>

	<form method="post" id="woocommerce_affiliate_codes_form"
		action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
			
			<?php wp_nonce_field( 'save_affcodes', '_wcac_nonce' ); ?>

			<table class="widefat">
			<thead>
				<tr>
					<th colspan="2">Tracking-Code</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2"><small>Bspw: <?php echo htmlspecialchars('<script>alert("code");</script>'); ?></small></td>
				</tr>
				<tr><td style="width: 17%;"><h2>Aktueller Code:</h2></td>
					<td>TODO</td>
					</tr>					
				</tr>
			</tbody>
		</table>

		<p class="submit">
			<input type="submit" name="submit_wcac" class="button-primary"
				value="<?php _e('Save Changes') ?>" />
		</p>
	</form>	
</div>