<nav class="pagination">
	<?php the_posts_pagination( array(
	'screen_reader_text' => ' ', 
    'mid_size'  => 2,
    'prev_text' => __( 'Previous', 'textdomain' ),
    'next_text' => __( 'Next', 'textdomain' ),
) ); ?>
</nav>