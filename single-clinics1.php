<?php
/**
 * The template for displaying all single posts
 * alfairoze theme
 */

get_header();
?> 
<div class="section theme--main-slider">
        <div class="component type--main-slider">
            <div class="slides">
                <?php $counter = -1;?>
            <?php
                $args = array(
                'post_type'   => 'slider_image',
                'post_status' => 'publish'
                );                
                $slider = new WP_Query( $args );if( $slider->have_posts() ) :               
                while( $slider->have_posts() ) :  $slider->the_post(); $counter++ 
             ?>
                <div class="slide <?php if($counter ==0) {esc_html_e('active', 'text-domain') ;} ?>">
                    <div class="image">
                         <?php the_content();?>
                    </div>
                </div>
                
        <?php  endwhile; 
                else :
                esc_html_e( 'No slider image in the your websit', 'text-domain' );
                endif;
        ?>        
                
            </div>
          <div class="controllers">
            <div class="navigator">
              <div class="controller next">
                <i class="fas fa-chevron-left rtl-only"></i>
                <i class="fas fa-chevron-right ltr-only"></i>
              </div>
              <div class="controller previous">
                <i class="fas fa-chevron-right rtl-only"></i>
                <i class="fas fa-chevron-left ltr-only"></i>
              </div>
            </div>
            <div class="bullets">
            <?php $counter = -1;?>
            <?php
                $args = array(
                'post_type'   => 'slider_image',
                'post_status' => 'publish'
                );                
                $slider = new WP_Query( $args );if( $slider->have_posts() ) :               
                while( $slider->have_posts() ) :  $slider->the_post(); $counter++ 
             ?>
              <div class="bullet <?php if($counter ==0) {esc_html_e('active', 'text-domain') ;} ?>"></div>
              <?php  endwhile; endif; ?>        
            </div>
          </div>
        </div>
    </div> 
    <div class="section size--container">
    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();?>
        <div class="component type--news-item">
          <div class="image">
            <img src="<?php the_post_thumbnail_url() ?>" alt="">
          </div>
          <div class="title">
          <?php the_title(); ?>
          </div>
          <div class="description">
          <?php the_content();?>
          </div>
        </div>
        <?php // End the loop.
        endwhile;
        ?>
      </div>
      <div class="section">
        <div class="component type--block">
          <div class="block__header">
            <div class="block__title">اخبار متعلقة</div>
          </div>
          <div class="block__main">
          <?php echo do_shortcode( '[custom-related-posts title="" none_text="None found" order_by="tags" order="ASC"]' ); ?>
          </div>
        </div>
      </div>
      
<?php get_footer();?>