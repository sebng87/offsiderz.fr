<?php
/**
 * Single variation cart button
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<div class="quantity-selector-container">
		<p class="label"><?= esc_html__( 'Quantity', 'woocommerce' ); ?></p>

		<div class="quantity-selector">
			<button type="button" class="minus cancel-btn"><span class="icon icon-minus"></span></button>
			<input readonly type="text" step="1" min="<?php apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ) ?>" max="<?php apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ) ?>" name="quantity" value="1" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
			<button type="button" class="plus cancel-btn"><span class="icon icon-plus"></span></button>
		</div>
	</div>

	<button type="submit" class="btn single_add_to_cart_button"><span><?php echo esc_html( $product->single_add_to_cart_text() ); ?></span></button>
	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
