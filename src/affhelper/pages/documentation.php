<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>

	<div class="wcac_documentation">
		<h2>Documentation</h2>
		<h3>Simple Redirects</h3>
		<p>Simple redirects work similar to the format that Apache uses: the
			affiliate should be relative to your WordPress root. The
			affiliatecode can be either a full URL to any page on the web, or
			relative to your WordPress root.</p>
		<h4>Example</h4>
		<ul>
			<li><strong>affiliate:</strong> /old-page/</li>
			<li><strong>affiliatecode:</strong> /new-page/</li>
		</ul>

		<h3>Wildcards</h3>
		<p>To use wildcards, put an asterisk (*) after the folder name that
			you want to redirect.</p>
		<h4>Example</h4>
		<ul>
			<li><strong>affiliate:</strong> /old-folder/*</li>
			<li><strong>affiliatecode:</strong> /redirect-everything-here/</li>
		</ul>

		<p>You can also use the asterisk in the affiliatecode to replace
			whatever it matched in the affiliate if you like. Something like
			this:</p>
		<h4>Example</h4>
		<ul>
			<li><strong>affiliate:</strong> /old-folder/*</li>
			<li><strong>affiliatecode:</strong> /some/other/folder/*</li>
		</ul>
		<p>Or:</p>
		<ul>
			<li><strong>affiliate:</strong> /old-folder/*/content/</li>
			<li><strong>affiliatecode:</strong> /some/other/folder/*</li>
		</ul>
	</div>