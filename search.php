<?php //get_template_part('templates/page', 'header'); ?>

<?php use Roots\Sage\Titles; ?>

<div class="page-header">
    <h1 class="ofs-subtitle h2"><?= Titles\title(); ?></h1>
</div>

<?php if (!have_posts()) : ?>
	<div class="alert alert-warning">
		Désolé, aucun résultat.
		<?php //_e('Sorry, no results were found.', 'sage'); ?>
	</div>

	<a href="<?= esc_url(home_url('/')); ?>" class="btn btn-secondary">
		<span>Retour à la page d'accueil</span>
	</a>
	<?php //get_search_form(); ?>
<?php else: ?>
<div class="results-container">
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/content', 'search'); ?>
<?php endwhile; ?>
</div>
<?php endif; ?>

<?php the_posts_navigation(); ?>
