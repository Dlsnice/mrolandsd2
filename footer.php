<?php

$footer_cta_heading = carbon_get_theme_option('footer_cta_heading');
$footer_cta_content = carbon_get_theme_option('footer_cta_content');
$footer_cta_btn_text = carbon_get_theme_option('footer_cta_btn_text');
$footer_cta_btn_link = carbon_get_theme_option('footer_cta_btn_link');

$ftr_logo = carbon_get_theme_option('ftr_logo');
$footer_background_image = carbon_get_theme_option('footer_background_image');

$ftr_social_icons = carbon_get_theme_option('ftr_social_icons');

$footer_phone = carbon_get_theme_option('footer_phone');
$footer_fax = carbon_get_theme_option('footer_fax');

$ftr_call_icon = carbon_get_theme_option('ftr_call_icon');
$ftr_fax_icon = carbon_get_theme_option('ftr_fax_icon');

$footer_address = carbon_get_theme_option('footer_address');
$footer_address_icon = carbon_get_theme_option('footer_address_icon');
$footer_address_link = carbon_get_theme_option('footer_address_link');

$footer_email = carbon_get_theme_option('footer_email');
$footer_email_icon = carbon_get_theme_option('footer_email_icon');

$footer_disclaimer = carbon_get_theme_option('footer_disclaimer');

$privacy_policy_text = carbon_get_theme_option('privacy_policy_text');
$privacy_policy_link = carbon_get_theme_option('privacy_policy_link');

$phone_number = carbon_get_theme_option('phone_number');

?>

<footer class="footer-sec" style="background-image: url('<?php echo $footer_background_image; ?>');">
	<div class="ftr-top-sec">
		<div class="container">
			<div class="ftr-top-blk">
				<div class="ftr-top-lft">
					<?php if (!empty($footer_cta_heading)): ?>
						<div class="ftr-text-heading">
							<?php echo esc_html($footer_cta_heading); ?>
						</div>
					<?php endif; ?>

					<?php if (!empty($footer_cta_content)): ?>
						<?php echo apply_filters('the_content', $footer_cta_content); ?>
					<?php endif; ?>

				</div>
				<?php if (!empty($footer_cta_btn_text) && !empty($footer_cta_btn_link)): ?>
					<div class="ftr-top-rgt"><a href="<?php echo esc_html($footer_cta_btn_link); ?>" class="cmn-btn"><?php echo esc_html($footer_cta_btn_text); ?></a></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="ftr-contact-blk">
			<div class="ftr-cont-lft">
				<div class="ftr-logo">
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo $ftr_logo;?>" alt="<?php bloginfo('name'); ?>" width="369" height="131"></a>
				</div>
				<div class="ftr-soci-blk">
					<?php if ($ftr_social_icons):
						foreach ($ftr_social_icons as $item): ?>
							<?php if ($item['ftr_social_icon']): ?>
								<a href="<?php echo esc_html($item['ftr_social_icon_link']); ?>" target="_blank" rel="noopener noreferrer">
									<img src="<?php echo esc_url($item['ftr_social_icon']); ?>"
										alt="<?php echo esc_html($item['ftr_social_icon_name']); ?>" width="42" height="38">
									</a>
							<?php endif; ?>
						<?php endforeach; endif; ?>
				</div>
			</div>
			<div class="ftr-cont-rgt">
				<div class="ftr-cont-blk">
					<div class="ftr-cont-itm">
						<div class="ftr-cont-icon">
							<img src="<?php echo $ftr_call_icon; ?>" alt="Footer Call" width="23" height="23">
						</div>
						<div class="ftr-cont-txt">
							<a href="tel:<?php echo normalize_phone(carbon_get_theme_option('footer_phone')); ?>"> <?php echo $footer_phone; ?></a>
						</div>
					</div>
					<div class="ftr-cont-itm">
						<div class="ftr-cont-icon"><img src="<?php echo $ftr_call_icon; ?>" alt="Footer Call" width="23" height="23"></div>
						<div class="ftr-cont-txt">
							<a href="tel:<?php echo normalize_phone(carbon_get_theme_option('phone_number')); ?>"><?php echo $phone_number; ?> (Toll-Free) </a>
							</div>
					</div>
					<div class="ftr-cont-itm fax">
						<div class="ftr-cont-icon"><img src="<?php echo $ftr_fax_icon; ?>" alt="Footer Fax" width="23" height="23"></div>
						<div class="ftr-cont-txt "><a><?php echo $footer_fax; ?></a>
						</div>
					</div>
				</div>

				<div class="ftr-cont-blk">
					<div class="ftr-cont-itm address">
						<div class="ftr-cont-icon"><img src="<?php echo $footer_address_icon; ?>" alt="Footer Address" width="25" height="20"></div>
						<div class="ftr-cont-txt"> <a href="<?php echo $footer_address_link; ?>" target="_blank" rel="noopener noreferrer"><?php echo $footer_address; ?></a></div>
					</div>
				</div>

				<div class="ftr-cont-blk">
					<div class="ftr-cont-itm email">
						<div class="ftr-cont-icon"><img src="<?php echo $footer_email_icon; ?>" alt="Footer Address" width="25" height="20"></div>
						<div class="ftr-cont-txt">
							<a href="mailto:<?php echo $footer_email; ?>"><?php echo $footer_email; ?></a>
						</div>
					</div>
				</div>

			</div>
		</div>

		<nav class="ftr-menu-blk">
			<div class="ftr-menu-lst">
				<?php wp_nav_menu(array(
					'container_id' => 'footer-menu',
					'container_class' => '',
					'menu_class' => '',
					'theme_location' => 'footer-menu',
					'li_class' => '',
					'fallback_cb' => false,
					'link_class' => '',
				)); ?>
			</div>
		</nav>

		<?php if (!empty($footer_disclaimer)): ?>
			<div class="ftr-desclaimer-txt">
				<?php echo apply_filters('the_content', $footer_disclaimer); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="copyrights">
		<div class="container">
			<div class="cpy-blk">
				<div class="cpy-inr">
				<p><span>Copyright &copy; <?php echo date("Y"); ?>
						<?php echo get_option('blogname') ?>.</span> <span>All Rights Reserved.</span> <a href="<?php echo $privacy_policy_link; ?>"> <?php echo $privacy_policy_text; ?></a></p>
				</div>

				<div class="juris-blk">
					<a href="https://jurisdigital.com/" target="_blank" rel="noopener noreferrer">Site
						By: <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/juris-logo.webp" alt="Juris Digitals Logo" width="117" height="20"></a>
				</div>
			</div>
		</div>
	</div>
</footer>

</div> <!-- end #wrapper -->

<button onclick="scrollToTop()" class="scroll-top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
		<path
			d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
	</svg></button>
<script>
	function scrollToTop() {
		window.scroll({ top: 0, left: 0, behavior: 'smooth' });
	}
	function trackScroll() {
		let scroller = document.querySelector('.scroll-top');
		if (window.pageYOffset > 50) {
			scroller.style.visibility = 'visible';
		} else {
			scroller.style.visibility = 'hidden';
		}
	}
	window.addEventListener('scroll', trackScroll);
</script>
<?php wp_footer(); ?>
<script>
	setTimeout(function () {
		function launchLightbox(val) {
			var players = VidyardV4.api.getPlayersByUUID(val);
			var player = players[0];
			player.showLightbox();
		}
	}, 2500); 
</script>
<script>
	// Close main nav when mobile nav item is clicked. 

	document.addEventListener('DOMContentLoaded', function () {
		// Get all anchor links with an href attribute containing '#'
		const anchorLinks = document.querySelectorAll('a[href*="#"]');

		// Get the checkbox input with classname '.side-menu'
		const sideMenuCheckbox = document.querySelector('.side-menu');

		// Add a click event listener to each anchor link
		anchorLinks.forEach(link => {
			link.addEventListener('click', function (event) {
				// Check if the href attribute contains '#'
				if (link.href.includes('#')) {
					// Uncheck the checkbox
					sideMenuCheckbox.checked = false;
				}
			});
		});
	});
</script>
</body>

</html>