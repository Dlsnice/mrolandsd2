<?php get_header(); ?> 
<?php get_template_part('templates/template-parts/heros/blog', 'hero'); ?>
<main>
    <section id="posts-container" class="posts-container">
		<div id="post-block-wrapper">
			<div id="articles-wrapper" class="grid lg:grid-cols-3 gap-6">
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <?php get_template_part('templates/template-parts/blog/blog', 'content'); ?>
                <?php endwhile; ?>
			</div>
			<?php get_template_part('templates/template-parts/blog/blog', 'pagination'); ?>
			<?php else : ?>
			<h2>Page not Found</h2>
			<p>We're sorry, but the page you're looking for isn't here.</p>
			<p>Try searching for the page you are looking for or using the navigation in the header or sidebar</p>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer() ?>
<script>
	var body = document.querySelector('body');
	var show_categories = document.querySelector('.blog-topics');

	body.addEventListener("click", function () {
		show_categories.classList.remove('active');
	}, false);
	show_categories.addEventListener("click", function (ev) {
		show_categories.classList.add('active');
		ev.stopPropagation(); //this is important! If removed, both click events will occur
	}, false);
</script>