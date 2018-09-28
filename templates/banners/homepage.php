<?php

// $event = get_posts(
//     array(
//         'posts_per_page' => 1,
//         'post_type' => 'events',
//         'post_status' => 'publish',
//         'orderby' => 'date'
//     )
// );

// $desc = get_field('event_homepage', $event[0]->ID);
// $date = get_field('event_date', $event[0]->ID);

// if(function_exists('ofs_get_human_date')) {
//     $date = ofs_get_human_date($date); 
// }
?>


<section class="homepage-banner">
    <div class="banner lazy" data-src="<?= get_template_directory_uri(); ?>/dist/images/backgrounds/hp-banner.jpg">
        <div class="banner--inner">
            <div class="banner--visual">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/common/ca-va-bien-se-passer-cover.png" alt="Ça va bien se passer">
            </div>

            <div class="banner--content">
                <h1 class="ofs-title">
                    « Ça va bien s’passer »<br>
                    Nouvel album – 26/10/2018
                </h1>

                <h2>En concert à La Machine du Moulin Rouge le 5 décembre 2018</h2>
    
                <a href="<?= home_url('/evenements/flynt-machine-moulin-rouge/'); ?>" class="btn">
                    <span>voir l'événement</span>
                </a>
            </div>
        </div>

        <!-- <p class="banner--legend">© Little Shao</p> -->
    </div>
</section>
