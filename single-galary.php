<?php
/**
 * The template for displaying all single  doctoes
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
<?php
        // Start the loop.
        while ( have_posts() ) : the_post();?>
        <div class="section size--container">
            <div class="component type--doctor">
                <div class="information">
                    <div class="image">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="details">
                    <div class="name">
                    <?php the_title(); ?>
                    
                    </div>
                    <div class="special">
                        <?php echo the_field( 'spical' ); ?> 
                    </div>
                    </div>
                </div>
                <div class="social">
                    <ul>
                      <li><a href="<?php echo the_field( 'linkedin' ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                      <li><a href="<?php echo the_field( 'twitter' ); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="<?php echo the_field( 'whatsapp' ); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                      <li><a href="<?php echo the_field( 'youtube' ); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                      <li><a href="<?php echo the_field( 'facebook' ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>               
            </div>
        </div>
        <div class="section">
          <div class="component type--block">
            <div class="block__header">
              <div class="block__title">صور العمليات والحالات الخاصة به</div>
            </div>
            <div class="block__main">
              <div class="component type--images">
              <?php                  
                $images = rwmb_meta( 'image_advanced', 'type=image_advanced&size=full');
                foreach ( $images as $image )
                {
                  echo "<div class='image'><a href='{$image['full_url']}' title='{$image['title']}' rel='thickbox'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' /></a></div>";
                }
                ?>               
                          
              </div>
            </div>
          </div>
        </div>
        <div class="section">
          <div class="component type--block">
            <div class="block__header">
              <div class="block__title">فيديوهات العمليات والحالات الخاصة به</div>
            </div>
            <div class="block__main">
              <div class="component type--images">
              <?php                  
                $videos = rwmb_meta( 'video', 'type=video');
                foreach ( $videos as $video )
                {
                  echo "<video width='320' height='240' controls>
                          <source src='{$video['src']}' type='video/mp4'>
                        </video>";
                }
                ?>                          
              </div>
            </div>
          </div>
        </div>
         
		<?php 
        // End the loop.
        endwhile;
        ?>
<?php get_footer();?>
