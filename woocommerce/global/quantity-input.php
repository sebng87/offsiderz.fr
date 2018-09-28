<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

$is_woo = is_shop() || is_product_category() || is_product();

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	?>
    <div class="quantity quantity-selector-container">
		<?php if($is_woo): ?>
		<p class="label"><?= esc_html__( 'Quantity', 'woocommerce' ); ?></p>
		<?php endif; ?>

		<div class="quantity-selector">
			<button type="button" class="minus cancel-btn"><span class="icon icon-minus"></span></button>
			<input type="text"
                   step="<?= esc_attr( $step ); ?>"
                   min="<?= esc_attr( $min_value ); ?>"
                   max="<?= esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
                   name="<?= esc_attr( $input_name ); ?>"
                   value="<?= esc_attr( $input_value ); ?>"
                   class="input-text qty text"
                   size="4"
                   pattern="<?= esc_attr( $pattern ); ?>"
                   inputmode="<?= esc_attr( $inputmode ); ?>"
                   readonly
            >
			<button type="button" class="plus cancel-btn"><span class="icon icon-plus"></span></button>
		</div>
	</div>

	<!-- <div class="quantity">
		<input type="number" class="input-text qty text" step="" min="" max="" name="" value="" title="" size="4" pattern="" inputmode="" />
	</div> -->
	<?php
}
