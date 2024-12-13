<?php get_header() ?>

<?php
$wp_query = new WP_Query([
    'post_type' => 'post',
])
?>

<div class="container">
    <section class="content">
        <h1>Movie List</h1>
        <div class="movie-list">
            <?php $i = 1 ?>
            <?php while ($wp_query->have_posts()): ?>
                <?php
                $wp_query->the_post();
                ?>

                <div class="movie-card">
                    <a href="<?php the_permalink() ?>">
                        <div class="thumbnail">
                            <?php
                            the_post_thumbnail()
                            ?>
                        </div>

                        <div class="movie-info">
                            <h2>
                                <?php the_title() ?>
                            </h2>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</div>
<?php get_footer() ?>