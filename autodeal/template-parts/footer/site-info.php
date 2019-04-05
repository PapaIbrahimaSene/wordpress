<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage autodeal
 */

?>
<div class="site-info">
	<div class="container">
		<p><?php echo esc_html(get_theme_mod('autodeal_footer_text',__('WordPress Theme By','autodeal'))); ?> <?php autodeal_credit(); ?></p>
	</div>
</div>