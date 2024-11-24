<?php
get_header();
$value = get_field('view');
update_post_meta(get_the_ID(), 'view', $value + 1);
?>

<div class="container">
    <div class="content">
        <?php while (have_posts()): ?>
            <?php the_post() ?>
            <div class="movie-thumbnail">
                <?php the_post_thumbnail() ?>
            </div>
            <h1 class="movie-title"><?php the_title() ?></h1>
            <p class="release-date">
                <?php
                $release_date = get_field('date');
                if ($release_date) {
                    echo '<strong>Release Date:</strong> ' . esc_html($release_date);
                } else {
                    echo '<strong>Release Date:</strong> Not specified.';
                }
                ?>
            </p>
            <div class="movie-view">View : <?= get_field('view') ?></div>
            <article class="movie-desc">
                <p><?php the_content() ?></p>
            </article>

            <!-- Casts -->
            <div class="movie-cast">
                <h2>Casts</h2>
                <?php
                $connected_casts = get_field('cast');
                if (!empty($connected_casts)): ?>
                    <ul class="cast-list">
                        <?php foreach ($connected_casts as $cast_id):
                            $cast = get_post($cast_id); // Ambil data Cast
                        ?>
                            <li class="cast-photo">
                                <?php echo get_the_post_thumbnail($cast_id, 'thumbnail'); ?>
                            </li>
                            <h2 class="cast-name"><?= $cast->post_title; ?></h2>
                            <p class="cast-desc"><?= $cast->post_content; ?></p>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No actors assigned to this post.</p>
                <?php endif; ?>
            </div>
            <!-- End Casts -->

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer() ?>