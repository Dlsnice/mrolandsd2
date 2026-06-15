<?php // Blogroll Content 
$post_date = get_the_date('M j, Y');
global $i;
?>

<article> 
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <div class="post-image">
            <?php if ( has_post_thumbnail() ) { ?>
                <img class="w-full" src="<?php the_post_thumbnail_url(); ?>" alt="Featured Image" />
            <?php } ?>
        </div>
        <div class="post-text">
            <h3><?php the_title(); ?></h3>
            <div class="post-meta">
                <span class="post-author">By <?php the_author(); ?></span>
                <span class="post-date"> / <?php echo $post_date ?></span>
            </div>
            <?php  

            $current_post_id = get_the_ID(); // id of current post in the loop
            $permalink = get_permalink( $current_post_id );
            $title = get_the_title( $current_post_id );  

            echo '<p class="blog-excerpt">' . excerpt(15) . '</p><span class="read-more btn primary">Keep Reading</span>' ?>
        </div>
    </a>	
</article>