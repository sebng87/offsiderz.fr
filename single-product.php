<?php
/**
 * Products landing page
 */

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
use Roots\Sage\Titles;

?>

<?php
	/**
	 * woocommerce_before_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 */
	do_action( 'woocommerce_before_main_content' );
?>

<section class="main content">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php wc_get_template_part( 'content', 'single-product' ); ?>
	<?php endwhile; // end of the loop. ?>
</section>

<?php if (Setup\display_sidebar()) : ?>
    <aside class="sidebar">
        <?php include Wrapper\sidebar_path(); ?>
    </aside>
<?php endif; ?>

<?php
	/**
	 * woocommerce_after_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );
?>
