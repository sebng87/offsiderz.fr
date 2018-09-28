<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
    <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
</div>

<a href="<?= esc_url(home_url('/')); ?>" class="btn btn-secondary">
    <span>Retour à la page d'accueil</span>
</a>

<?php //get_search_form(); ?>
