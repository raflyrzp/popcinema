<?php
function popcinema_enqueue_styles()
{
    wp_enqueue_style('child-style', get_stylesheet_uri());
}
add_action('wp_enqueue_styles', 'popcinema_enqueue_styles');

// REGISTER MENU
function popcinema_register_menus()
{
    register_nav_menu('navbar-menu', 'Navbar Menu');
}
add_action('init', 'popcinema_register_menus');

// CUSTOM MENU ITEMS
function custom_menu_items($items, $args)
{
    if ($args->theme_location === 'navbar-menu') {
        if (is_user_logged_in()) {
            $logout_url = wp_logout_url(home_url());
            $items .= '<li class="menu-item"><a href="' . $logout_url . '">Logout</a></li>';
        } else {
            $login_url = wp_login_url();
            $register_url = wp_registration_url();
            $items .= '<li class="menu-item"><a href="' . $login_url . '">Login</a></li>';
            $items .= '<li class="menu-item"><a href="' . $register_url . '">Register</a></li>';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'custom_menu_items', 10, 2);


// LOGIN ERROR
function popcinema_login_error()
{
    session_start();
    $_SESSION['errors'] = ['Invalid Username or Password'];
    wp_redirect(home_url('/admeen'));
}
add_action('login_errors', 'popcinema_login_error');

// MOVIE POST
function movie_post_type_register()
{
    register_post_type('Movie', [
        'labels' => [
            'name' => 'Movies',
            'singular_name' => 'Movie',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Movie',
            'edit' => 'Edit',
            'edit_item' => 'Edit Movie',
            'new_item' => 'New Movie',
            'view' => 'View',
            'view_item' => 'View Movie',
            'search_items' => 'Search Movies',
            'not_found' => 'No Movies found',
            'not_found_in_trash' => 'No Movies found in Trash',
            'parent_item_colon' => '',
            'menu_name' => 'Movies',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'movies', 'with_front' => false],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
        'menu_icon' => 'dashicons-video-alt',
    ]);

    flush_rewrite_rules(false);
}
add_action('init', 'movie_post_type_register');


// CAST POST
function cast_post_type_register()
{
    register_post_type('Cast', [
        'labels' => [
            'name' => 'Casts',
            'singular_name' => 'Cast',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Cast',
            'edit' => 'Edit',
            'edit_item' => 'Edit Cast',
            'new_item' => 'New Cast',
            'view' => 'View',
            'view_item' => 'View Cast',
            'search_items' => 'Search Casts',
            'not_found' => 'No Casts found',
            'not_found_in_trash' => 'No Casts found in Trash',
            'parent_item_colon' => '',
            'menu_name' => 'Casts',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'casts', 'with_front' => false],
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-admin-users',
    ]);

    flush_rewrite_rules(false);
}
add_action('init', 'cast_post_type_register');


// REGISTER TAXONOMY
function popcinema_register_taxonomy_genre()
{
    register_taxonomy('genre', ['movie'], [
        'label' => 'Genre',
        'public' => true,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'genre']
    ]);
}
add_action('init', 'popcinema_register_taxonomy_genre');


// GALLERY
function popcinema_custom_gallery()
{
    register_post_type('Gallery', [
        'labels' => [
            'name' => 'Gallery',
            'singular_name' => 'Gallery',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Gallery',
            'edit' => 'Edit',
            'edit_item' => 'Edit Gallery',
            'new_item' => 'New Gallery',
            'view' => 'View',
            'view_item' => 'View Gallery',
            'search_items' => 'Search Gallery',
            'not_found' => 'No Gallery found',
            'not_found_in_trash' => 'No Gallery found in Trash',
            'parent_item_colon' => '',
            'menu_name' => 'Gallery'
        ],
        'public' => true,
        'rewrite' => ['slug' => 'gallery', 'with_front' => false],
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
    flush_rewrite_rules(false);
}

add_action('init', 'popcinema_custom_gallery');


// RATING
function save_movie_rating()
{
    if (
        isset($_POST['submit_rating'], $_POST['user_rating'], $_POST['movie_rating_nonce']) &&
        wp_verify_nonce($_POST['movie_rating_nonce'], 'save_movie_rating') &&
        is_user_logged_in()
    ) {
        $post_id = get_the_ID();
        $user_id = get_current_user_id();
        $user_rating = floatval($_POST['user_rating']);

        if ($user_rating >= 1 && $user_rating <= 10) {
            $meta_key = 'rating_user_' . $user_id;

            if (get_post_meta($post_id, $meta_key, true)) {
                update_post_meta($post_id, $meta_key, $user_rating);
            } else {
                add_post_meta($post_id, $meta_key, $user_rating);
            }
        }
    }
}
add_action('template_redirect', 'save_movie_rating');
