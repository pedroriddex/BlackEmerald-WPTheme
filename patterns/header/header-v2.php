<?php
/**
 * Title: Header V.2
 * Slug: blackemerald/headerv2
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header with site title and navigation.
 *
 * @package WordPress
 * @subpackage Black_Emerald
 * @since Black Emerald 1.0
 */

?>
<!-- wp:group {"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","alignItems":"center"}} -->
		<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
			<!-- Logo a la izquierda -->
			<!-- wp:site-logo {"width":60,"height":60,"align":"left"} /-->
			
			<!-- Menú al centro -->
			<!-- wp:navigation {"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} /-->
			
			<!-- 2 Botones a la derecha -->
			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"primary","textColor":"base"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-base-color has-text-color has-background wp-element-button">Botón 1</a></div>
				<!-- /wp:button -->
				
				<!-- wp:button {"backgroundColor":"secondary","textColor":"base"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-secondary-background-color has-base-color has-text-color has-background wp-element-button">Botón 2</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
