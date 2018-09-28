<?php

namespace Roots\Sage\Woocommerce;
use Roots\Sage\Setup;

/*********************
 * WOOCOMMERCE
 *********************/

add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

/**
 * Breadcrumbs
 */
function ofs_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<ol class="ui breadcrumb woocommerce-breadcrumb" itemprop="breadcrumb">',
        'wrap_after'  => '</ol>',
        'before'      => '<li class="ui breadcrumb-item">',
        'after'       => '</li>',
        'home'        => _x( 'Accueil', 'breadcrumb', 'woocommerce' ),
    );
}
add_filter( 'woocommerce_breadcrumb_defaults', __NAMESPACE__ . '\\ofs_woocommerce_breadcrumbs' );

/**
 * Manage WooCommerce styles and scripts.
 */
function ofs_woocommerce_script_cleaner() {

	// Remove the generator tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
	// Unless we're in the store, remove all the cruft!
	if ( !is_woocommerce() && !is_cart() && !is_checkout() && !is_front_page() ) {
		wp_dequeue_style( 'woocommerce_frontend_styles' );
		wp_dequeue_style( 'woocommerce-general');
		wp_dequeue_style( 'woocommerce-layout' );
		wp_dequeue_style( 'woocommerce-smallscreen' );
		wp_dequeue_style( 'woocommerce_fancybox_styles' );
		wp_dequeue_style( 'woocommerce_chosen_styles' );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		// wp_dequeue_style( 'select2' );

		wp_dequeue_script( 'wc-add-payment-method' );
		wp_dequeue_script( 'wc-lost-password' );
		wp_dequeue_script( 'wc_price_slider' );
		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-add-to-cart' );
		wp_dequeue_script( 'wc-cart-fragments' );
		wp_dequeue_script( 'wc-credit-card-form' );
		wp_dequeue_script( 'wc-checkout' );
		wp_dequeue_script( 'wc-add-to-cart-variation' );
		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-cart' );
		wp_dequeue_script( 'wc-chosen' );
		wp_dequeue_script( 'woocommerce' );
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_script( 'jquery-blockui' );
		wp_dequeue_script( 'jquery-placeholder' );
		wp_dequeue_script( 'jquery-payment' );
		wp_dequeue_script( 'fancybox' );
		wp_dequeue_script( 'jqueryui' );
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\ofs_woocommerce_script_cleaner', 99 );

function ofs_woocommerce_dequeue_styles( $enqueue_styles ) {
    // ! is_account_page()
    if ( !is_woocommerce() && !is_cart() && !is_checkout() && !is_front_page() ) {
        unset( $enqueue_styles['woocommerce-general'] );
        unset( $enqueue_styles['woocommerce-layout'] );
        unset( $enqueue_styles['woocommerce-smallscreen'] );
    }
    return $enqueue_styles;
}
add_filter( 'woocommerce_enqueue_styles', __NAMESPACE__ . '\\ofs_woocommerce_dequeue_styles' );

/**
 * Manage WooCommerce styles and scripts.
 */
function ofs_products_placeholder( $image_url ) {
    $image_url = 'http://offsiderz.test/app/uploads/2017/09/placeholder.png';
    // $image_url = 'http://offsiderz.test/app/uploads/2017/09/product-placeholder-1.png';

    return $image_url;
}
add_filter( 'woocommerce_placeholder_img_src', __NAMESPACE__ . '\\ofs_products_placeholder', 10 );

/*********************
 * WOOCOMMERCE HOOKS
 *********************/

/**
 * Archive Products title
 * @see wc-template-hooks.php
 */
function ofs_archive_pdt_title( ) {
	echo '<h2 class="product-title h4">' . get_the_title() . '</h2>';
};

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
add_action( 'woocommerce_shop_loop_item_title', __NAMESPACE__ . '\\ofs_archive_pdt_title', 10, 0 );

/**
 * Mini Cart Buttons: View cart & Checkout
 */
remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10);
remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20);
add_action( 'woocommerce_widget_shopping_cart_buttons', __NAMESPACE__ . '\\ofs_shopping_cart_buttons', 10);
add_action( 'woocommerce_widget_shopping_cart_buttons', __NAMESPACE__ . '\\ofs_shopping_cart_checkout_buttons', 20 );

function ofs_shopping_cart_buttons( ) {
    echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn btn-secondary wc-forward"><span>' . esc_html__( 'View cart', 'woocommerce' ) . '</span></a>';
};

function ofs_shopping_cart_checkout_buttons( ) {
    echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="btn btn-secondary checkout wc-forward"><span>' . esc_html__( 'Checkout', 'woocommerce' ) . '</span></a>';
};


/**
 * Show notice if cart is empty.
 *
 * @see wc-template-functions.php
 */

// define the woocommerce_cart_is_empty callback
function ofs_action_woocommerce_cart_is_empty() {
    echo '<p class="ui alert alert-danger has-icon cart-empty"><span class="icon icon-round icon-close"></span>' . apply_filters( 'wc_empty_cart_message', __( 'Your cart is currently empty.', 'woocommerce' ) ) . '</p>';
};

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', __NAMESPACE__ . '\\ofs_action_woocommerce_cart_is_empty', 10);


/**
* Remove password strength indicator
*/

function ofs_remove_password_strength() {
	if(wp_script_is( 'wc-password-strength-meter', 'enqueued' )){
		wp_dequeue_script( 'wc-password-strength-meter' );
	}
}
add_action( 'wp_print_scripts', __NAMESPACE__ . '\\ofs_remove_password_strength', 100 );

/**
 * Breadcrumb fix
 */

function ofs_breadcrumb_fix( $defaults ) {
    if(is_account_page()) {
        $defaults[1][0] = 'Mon compte';
	}
	
	if(is_post_type_archive('events') || is_singular('events')) {
		$defaults[1][0] = 'événements';
	}

	// var_dump($defaults);
	
    return $defaults;
}
add_filter( 'woocommerce_get_breadcrumb', __NAMESPACE__ . '\\ofs_breadcrumb_fix' );

/**
 * Unset billing address fields
 */

function ofs_unset_billing_fields( $fields ) {
    unset($fields['billing_company']);
    unset($fields['billing_address_2']);
	unset($fields['billing_state']);
	
	$fields['billing_phone']['required'] = false;

    return $fields;
}

add_filter( 'woocommerce_billing_fields' , __NAMESPACE__ . '\\ofs_unset_billing_fields' );

/**
 * Unset shipping fields
 */

function ofs_unset_shipping_fields( $fields ) {
    unset($fields['shipping_company']);
    unset($fields['shipping_address_2']);


    return $fields;
}

add_filter( 'woocommerce_shipping_fields' , __NAMESPACE__ . '\\ofs_unset_shipping_fields' );

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */

function ofs_related_products_args( $args ) {
    $args['posts_per_page'] = 3;
    return $args;
}

add_filter( 'woocommerce_output_related_products_args', __NAMESPACE__ . '\\ofs_related_products_args' );

/**
 * Default WooCommerce product gallery
 */
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


/**
 * Ensure cart contents update when products are added to the cart via AJAX
 *
 * @see https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
 */

function ofs_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
?>
<?php if(WC()->cart->get_cart_contents_count() > 0): ?>
<a class="cart-counter cancel-link" href="<?= wc_get_cart_url(); ?>">
    <?php echo sprintf ( _n( '%d article', '%d articles', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
</a>
<?php else: ?>
    <a href="<?= wc_get_cart_url(); ?>" class="cart-counter cancel-link">panier</a>
<?php endif; ?>
<?php
	$fragments['a.cart-counter'] = ob_get_clean();
	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments',  __NAMESPACE__ . '\\ofs_add_to_cart_fragment');

/**
 * Open external link in new tabs
 */

// For archive page
function ofs_add_target_blank( $link, $product ){
	if ( 'external' === $product->get_type() ) { 
			$link = sprintf( '<a href="%s" target="_blank" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button product_type_%s"><span>%s</span></a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( $product->get_id() ),
			esc_attr( $product->get_sku() ),
			esc_attr( isset( $quantity ) ? $quantity : 1 ),
			esc_attr( $product->get_type() ),
			esc_html( $product->add_to_cart_text() )
		);
	}
	return $link;
}

add_filter('woocommerce_loop_add_to_cart_link', __NAMESPACE__ . '\\ofs_add_target_blank', 10, 2 );

// For single page 
// @see: /templates/single-product/add-to-cart/external.php
function ofs_external_add_to_cart() {
    global $product;

    if (! $product->add_to_cart_url() ) {
    	return;
    }

    $product_url = $product->add_to_cart_url();
	$button_text = $product->single_add_to_cart_text();
	
    do_action( 'woocommerce_before_add_to_cart_button' ); ?>

    <p class="cart">
		<a href="<?= esc_url( $product_url ); ?>" rel="nofollow" class="single_add_to_cart_button button alt" target="_blank">
			<span><?= esc_html( $button_text ); ?></span>	
		</a>
    </p>

    <?php do_action( 'woocommerce_after_add_to_cart_button' );
}

remove_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
add_action( 'woocommerce_external_add_to_cart',  __NAMESPACE__ . '\\ofs_external_add_to_cart', 30 );


/**
 * Remove product metas from single page 
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


/**
 * Update Payment button copy
 */
function ofs_available_payment_gateways($_available_gateways) {
    if (isset($_available_gateways["paypal"])) {
        $_available_gateways["paypal"]->order_button_text = "Payer avec PayPal ou par CB";
    }
    
    return $_available_gateways;
}

add_action( 'woocommerce_available_payment_gateways',  __NAMESPACE__ . '\\ofs_available_payment_gateways', 30 );