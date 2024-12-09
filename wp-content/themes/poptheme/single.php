<?php
get_header();
$value = get_field('view');
update_post_meta(get_the_ID(), 'view', $value + 1);
?>

<div class="container">
    <div class="content">
        <?php while (have_posts()): the_post(); ?>
            <div class="movie-header">
                <?php if (has_post_thumbnail()): ?>
                    <div class="movie-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <h1 class="movie-title"><?php the_title(); ?></h1>
                <p class="release-date">
                    <strong>Release Date:</strong>
                    <?= get_field('date') ?: 'Not specified'; ?>
                </p>
                <p class="movie-view">Views: <?= esc_html($value + 1); ?></p>
            </div>

            <article class="movie-desc">
                <?php the_content(); ?>
            </article>

            <div class="movie-rating">
                <?php
                $ratings = [];
                foreach (get_post_meta(get_the_ID()) as $key => $value) {
                    if (strpos($key, 'rating_user_') === 0) {
                        $ratings[] = floatval($value[0]);
                    }
                }

                if ($ratings) {
                    $average_rating = array_sum($ratings) / count($ratings);
                    echo '<p><strong>Average Rating:</strong> ' . round($average_rating, 1) . '/10 (' . count($ratings) . ' votes)</p>';
                } else {
                    echo '<p><strong>Average Rating:</strong> No ratings yet.</p>';
                }
                ?>



                <?php if (is_user_logged_in()): ?>
                    <?php
                    $user_id = get_current_user_id();
                    $meta_key = 'rating_user_' . $user_id;
                    $user_rating = get_post_meta(get_the_ID(), $meta_key, true);
                    ?>
                    <form method="post">
                        <label for="user_rating">Rate this movie (1-10):</label>
                        <input type="number" name="user_rating" id="user_rating" min="1" max="10" required value="<?= esc_attr($user_rating); ?>">
                        <?php wp_nonce_field('save_movie_rating', 'movie_rating_nonce'); ?>
                        <button type="submit" name="submit_rating">Submit Rating</button>
                    </form>
                <?php else: ?>
                    <p><a href="<?= esc_url(wp_login_url()); ?>">Log in</a> to rate this movie.</p>
                <?php endif; ?>


            </div>

            <div class="movie-cast">
                <h2>Casts</h2>
                <?php
                $connected_casts = get_field('cast');
                if ($connected_casts): ?>
                    <ul class="cast-list">
                        <?php foreach ($connected_casts as $cast_id): ?>
                            <li class="cast-item">
                                <?= get_the_post_thumbnail($cast_id, 'thumbnail'); ?>
                                <p class="cast-name"><?= get_the_title($cast_id); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No actors assigned to this post.</p>
                <?php endif; ?>
            </div>
            <div class="movie-gallery">
                <h2>Gallery</h2>
                <?php
                $connected_gallery = get_field('gallery');
                if ($connected_gallery): ?>
                    <ul class="gallery-list">
                        <?php foreach ($connected_gallery as $gallery_id): ?>
                            <li class="gallery-item">
                                <?= get_the_post_thumbnail($gallery_id, 'thumbnail'); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Nothing here.</p>
                <?php endif; ?>
            </div>

            <div class="comments-section">
                <h2>Comments</h2>
                <?php comments_template(); ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer(); ?>