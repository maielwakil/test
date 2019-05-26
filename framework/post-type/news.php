<?php

// Register Careers custom Post Type
function news_post_type() {

    $labels = array(
        'name' => _x('news', 'Post Type General Name', 'magrabi-post-type'),
        'singular_name' => _x('news', 'Post Type Singular Name', 'magrabi-post-type'),
        'menu_name' => __('news', 'magrabi-post-type'),
        'parent_item_colon' => __('Parent news:', 'magrabi-post-type'),
        'all_items' => __('All news', 'magrabi-post-type'),
        'view_item' => __('View news', 'magrabi-post-type'),
        'add_new_item' => __('Add New news', 'magrabi-post-type'),
        'add_new' => __('Add New', 'magrabi-post-type'),
        'edit_item' => __('Edit news', 'magrabi-post-type'),
        'update_item' => __('Update news', 'magrabi-post-type'),
        'search_items' => __('Search news', 'magrabi-post-type'),
        'not_found' => __('Not found', 'magrabi-post-type'),
        'not_found_in_trash' => __('Not found in Trash', 'magrabi-post-type'),
    );
    $args = array(
        'labels' => $labels,
        'supports' => array('title','revisions','editor','thumbnail',),
        'taxonomies' => array('post_tag', 'category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 2,
        'menu_icon' => 'dashicons-clipboard',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    );
    register_post_type('news', $args);
}

// Hook into the 'init' action
add_action('init', 'news_post_type', 0);
