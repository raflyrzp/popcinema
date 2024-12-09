<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo("name") ?></title>

    <?php wp_head(); ?>
</head>

<body>
    <nav>
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo("name"); ?></a></h1>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <?php
        wp_nav_menu([
            'theme_location' => 'navbar-menu',
            'container_class' => 'navbar',
            'menu_class' => 'menu',
            'fallback_cb' => false,
        ]);
        ?>
    </nav>