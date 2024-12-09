<?= get_header(); ?>
<?php
$wp_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => $paged,
    'meta_key' => 'rating',
    'orderby' => 'rating',
    'order' =>  'DESC'
]);
?>


<section class="hero">
    <div class="judul">
        <div class="isi-judul">
            <h1><?php bloginfo('name') ?></h1>
            <p><?php bloginfo('description') ?></p>
        </div>
    </div>
    <!-- <img src="<?= get_theme_file_uri('/assets/images/bg') . "/movies.jpg" ?>"> -->
</section>


<div class="container">

    <section class="content">
        <h1>Recomendation</h1>
        <div class="movie-list">
            <?php $i = 1 ?>
            <?php while ($wp_query->have_posts() && $i <= 4): ?>
                <?php
                $wp_query->the_post();
                $i++;
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

    <a href="#" class="back-to-top-btn" title="Back to Top">&#129121;</a>

</div>


<?= get_footer(); ?>