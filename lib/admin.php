<?php

namespace Roots\Sage\Admin;
use Roots\Sage\Assets;

/*********************
THEME SUPPORT
*********************/

function ofs_remove_support() {
    remove_theme_support( 'post-formats' );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\ofs_remove_support', 11 );

function ofs_remove_tag() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}

add_action('init', __NAMESPACE__ . '\\ofs_remove_tag');

/*********************
CLEAN THEME
*********************/

function ofs_disable_wp_emojicons() {
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}

add_action( 'init', __NAMESPACE__ . '\\ofs_disable_wp_emojicons' );

?>
