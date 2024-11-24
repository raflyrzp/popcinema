<?php
if (is_user_logged_in()) {
    wp_redirect(admin_url());
}

session_start()
?>

<?php get_header() ?>

<div class="container admin-page">
    <section class="login-section">
        <h1></h1>
        <?php if (isset($_SESSION['errors'])): ?>
            <?php foreach ($_SESSION['errors'] as $error): ?>

                <small><?= $error ?></small>

            <?php endforeach; ?>

            <?php session_destroy() ?>
        <?php endif; ?>

        <?php
        wp_login_form([
            'redirect' => admin_url(),
        ])
        ?>
    </section>
</div>
<?php get_footer() ?>