<?php /* Template Name:services Page*/ ?>
<?php get_header(); ?>
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
        <?php $counter = - 1;?>
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
        <div class="component type--services">
			    <?php
              $args = array(
              'post_type'   => 'services',
              'post_status' => 'publish'
              );                
              $service = new WP_Query( $args );if( $service->have_posts() ) :               
              while( $service->have_posts() ) :  $service->the_post();                 
          ?>
            <div class="service">
              <div class="information">
                <div class="title">
                  <?php $image=get_field('icon');?>
                  <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>"> <?php the_title(); ?></a>
                </div>
                <div class="description">
                    <?php the_content(); ?>
                </div>
              </div>
              <div class="images">
                  <div class="component type--main-slider">
                  <div class="slides">
                    <div class="slide active">
                      <div class="image">
                        <?php $image1=get_field('slider_iamge1');?>
                        <img src="<?php echo $image1['url']; ?>">
                      </div>
                    </div> 
                    <div class="slide">
                      <div class="image">
                      <?php $image2=get_field('slider_iamge2');?>
                      <img src="<?php echo $image2['url']; ?>">
                      </div>
                    </div>      
                    <div class="slide">
                      <div class="image">
                      <?php $image3=get_field('slider_iamge3');?>
                      <img src="<?php echo $image3['url']; ?>">
                      </div>
                    </div>                       
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
                  </div>
                </div>
              </div>
            </div>          
          <?php  endwhile; endif; ?>
        </div>
     </div>   
      

<?php get_footer(); ?>