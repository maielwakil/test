<?php
/**
 * The template for displaying all single  doctoes
 * alfairoze theme
 */

get_header();
?> 
 
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
                    </div>
                </div>
                <div class="special-derails">
                      <div class="special">
                            <?php echo the_field( 'spical' ); ?>
                      </div>
                  </div>
                         
            </div>
        </div>
       <?php  $images = rwmb_meta( 'image_advanced', 'type=image_advanced&size=full'); if($images) {?>
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
       <?php } ?>
       
        
         
		<?php 
        // End the loop.
        endwhile;
        ?>
<?php get_footer();?>
