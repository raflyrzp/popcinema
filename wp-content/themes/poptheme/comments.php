<?php
if (have_comments()) :
    wp_list_comments([
        'style' => 'ul',
        'short_ping' => true,
        'avatar_size' => 50,
    ]);
else :
    echo '<p>No comments yet. Be the first to comment!</p>';
endif;

comment_form();
