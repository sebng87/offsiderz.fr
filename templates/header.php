<header class="main-header">
    <a class="ui logo" href="<?= esc_url(home_url('/')); ?>">
        <img src="<?= get_template_directory_uri(); ?>/dist/images/common/logo-white.png" alt="Flynt MC">
    </a>

    <button class="ui trigger hamburger cancel-btn collapsed" data-toggle="collapse" data-target="#main-navigation">
        <span></span>
        <span></span>
    </button>

    <div class="collapse" id="main-navigation">
        <div class="search-ovelay">
            <div class="container search-form">
                <?//= do_shortcode('[wcas-search-form]'); ?>
                <form action="/" method="get" role="search" class="form-inline" autocomplete="off">
                    <div class="container">
                        <div class="input-group">
                            <input name="s" type="search" class="form-control" placeholder="Rechercher" value="<?php the_search_query(); ?>">
                            <div class="input-group-addon">
                                <button type="submit" class="cancel-btn">
                                    <span class="icon icon-search"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <a href="#" class="trigger-search-overlay cancel-link">
                <span class="icon icon-close"></span>
            </a>
        </div>

        <?php get_template_part('templates/navigation'); ?>
    </div>
</header>
