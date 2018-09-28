<?php

namespace Roots\Sage\Titles;

/**
* Page titles
*/
function title() {
    if (is_home()) {
        if (get_option('page_for_posts', true)) {
            return get_the_title(get_option('page_for_posts', true));
        } else {
            return __('Latest Posts', 'sage');
        }
    } 
    elseif (is_archive()) {
        if(is_shop()) {
            return sprintf(__('Tous les produits', 'sage'));
        } elseif(is_post_type_archive('events')) {
            return sprintf(__('Tous les événements', 'sage'));
        } else {
            return sprintf( __( '%s' ), single_cat_title( '', false ) );
            // return get_the_archive_title();
        }
    } 
    elseif (is_page('biographie')) {
        return sprintf(__('Flynt', 'sage'));
    } 
    elseif (is_search()) {
        return sprintf(__('Résultat de recherche pour %s', 'sage'), get_search_query());
    } 
    elseif (is_404()) {
        return __('Not Found', 'sage');
    } 
    else {
        return get_the_title();
    }
}
