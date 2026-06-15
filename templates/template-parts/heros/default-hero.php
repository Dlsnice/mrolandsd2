<?php
// Variables
$page_id = get_queried_object_id(); // Get the actual page id, not the id of the first post in the loop
$heading = carbon_get_post_meta( $page_id, 'heading' );
$content = carbon_get_post_meta( $page_id, 'content' );
$button_text = carbon_get_post_meta( $page_id, 'banner_button_text' );
$button_url = carbon_get_post_meta( $page_id, 'banner_button_url' );
$bg_image = carbon_get_post_meta( $page_id, 'bg_image' );

?>

<section id="banner" class="default-banner">
    <div class="flex flex-wrap lg:flex-nowrap items-center w-11/12 mx-auto banner-area max-w-screen-xl">  
      <div id="banner-left" class="flex flex-col">    
          <h1 class="w-full ">
            <?php if ( !empty($heading) ) { echo $heading; } else { the_title(); } ?>
          </h1>
          <?php if ($content) { ?>
          <div class="w-full description"><?php echo apply_filters( 'the_content', $content ) ?></div>
          <?php } ?>
          <?php if ($button_url) { ?>
          <div class="flex items-center hero-buttons">
            <a href="<?php echo $button_url ?>" class="btn primary"><?php echo $button_text ?></a> 
          </div>
          <?php } ?>
      </div>
    </div>
</section>

<?php if ($bg_image) : ?>
    <style>
      html #banner.global-banner {
          background: url(<?php echo $bg_image ?>) center no-repeat;
          background-size: cover;
      }
    </style>
<?php endif; ?>