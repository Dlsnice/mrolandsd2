<?php get_header(); ?> 
<?php get_template_part('templates/template-parts/heros/single', 'hero'); ?>
<main>
	<section id="blog-post-wrapper">
		<div class="container-inner">
			<div id="post-content">
				<?php if ( has_post_thumbnail() ) { ?>
					<img src="<?php the_post_thumbnail_url(); ?>" alt="Featured Image" class="featured-image">
				<?php } ?>
				<?php the_content();?>
				<?php 
					$author_id = $post->post_author;
					$headshot = carbon_get_user_meta( $author_id, 'headshot' );
					$bio_content = carbon_get_user_meta( $author_id, 'bio_content' );
					$display_name = carbon_get_user_meta( $author_id, 'display_name' );
				?>
				<div id="post-author" class="grid-container-12">
					<div id="author-image">
						<img src="<?php echo $headshot; ?>" alt="Author Photo" />
					</div>
					<div id="author-content">
						<h4 id="author-name"><?php echo $display_name; ?></h4>
						<?php echo wpautop(wp_kses_post($bio_content)); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>