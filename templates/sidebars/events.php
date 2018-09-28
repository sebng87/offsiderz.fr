<?php
/**
 * Latest Events Sidebar
 */

$events = get_posts(
    array(
        'posts_per_page' => 3,
        'post_type' => 'events',
        'post_status' => 'publish',
        'orderby' => 'date',
        'exclude' => get_the_ID()
    )
);
?>

<section class="events widget">
    <h3>événements</h3>

    <?php if(!empty($events)): ?>
        <ul class="cancel-list">
            <?php foreach($events as $key => $event): ?>
                <li>
                    <a href="<?= get_permalink($event->ID); ?>" class="cancel-link">
                        <?php $event_date  = get_field('event_date', $event->ID); ?>
                       
                        <?php if(!empty($event_date)): ?>
                            <?php $day         = date( 'd', strtotime($event_date) ); ?>
                            <?php $month       = date( 'M', strtotime($event_date) ); ?>
                            
                            <div class="calendar">
                                <div class="calendar--inner">
                                    <span class="calendar--day"><?= $day; ?></span>
                                    <span class="calendar--month"><?= $month; ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="content">
                            <p class="title"><?= $event->post_title; ?></p>
                            
                            <?php $event_place  = get_field('event_place', $event->ID); ?>
                            <?php if(!empty($event_place)): ?>
                                <p>@<?= $event_place; ?></p>
                            <?php endif; ?>

                            <span class="readmore cancel-link">
                                <span class="icon icon-arrow-right"></span>
                                En savoir plus
                            </span>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="<?= get_post_type_archive_link('events'); ?>" class="btn btn-secondary"><span>Tous les événements</span></a>
    <?php else: ?>
        <p>Aucun événement récent</p>
    <?php endif; ?>

</section>

<?php //endif; ?>