<?php
// Variables
$page_id = get_queried_object_id(); // Get the actual page id, not the id of the first post in the loop
$heading = carbon_get_post_meta( $page_id, 'heading' );
$content = carbon_get_post_meta( $page_id, 'content' );
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