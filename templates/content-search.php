<?php
	$thumbnail = get_the_post_thumbnail_url($post->ID, 'large');

    if(empty($thumbnail)) {
		$thumbnail = get_template_directory_uri().'/dist/images/products/placeholder.png';
	}
?>

<article <?php post_class(); ?>>
	<div class="visual">
		<a href="<?php the_permalink(); ?>" class="cancel-link">
			<img src="<?= $thumbnail; ?>" alt="<?php the_title(); ?>">	
		</a>
	</div>

	<div class="content">
		<a href="<?php the_permalink(); ?>" class="cancel-link">
			<h2 class="product-title h4">
				<?php the_title(); ?>
			</h2>

			<?php if($post->post_type === 'product'): ?>
			<span class="price">
				<?= wc_get_product( $post->ID )->get_price(); ?>€
			</span>

			<span class="btn btn-secondary">
				<span>voir le produit</span>
			</span>
			<?php else: ?>
				<p><?php the_excerpt(); ?></p>
				<span class="btn btn-secondary">
					<span>voir l'événement</span>
				</span>
			<?php endif; ?>
		</a>
	</div>
	
	<?php //var_dump($post); ?>
</article>
