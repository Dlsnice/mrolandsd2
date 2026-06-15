<section id="banner" class="global-banner">
    <div class="flex flex-wrap lg:flex-nowrap items-center w-11/12 mx-auto banner-area max-w-screen-xl">  
      <div id="banner-left" class="flex flex-col basis-full">    
          <h1 class="w-full">
          <?php  
          if( is_category() ) : single_term_title();
          elseif ( is_search() ) : printf( esc_html__( 'Search Results for: %s', 'jdxstarter' ), get_search_query() );
          elseif ( is_404() ) : echo 'Hey hey, the page your looking for does not exist';
          elseif ( is_tag() ) : single_tag_title(); 
          else : the_title();
          endif;
          ?></h1>
      </div>
</section>