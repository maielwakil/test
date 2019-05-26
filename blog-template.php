<?php 
/*
* Template Name: Blog Post
*/
?>
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

    <div class="section">
        <div class="component type--block">
            <div class="block__header">
                <div class="block__title">
                الاخبار
                </div>
            </div>
            <div class="block__main">
                <div class="component type--news-items"> 
                <?php 
                    // the query
                    $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
                    
                    <?php if ( $wpb_all_query->have_posts() ) : ?>                  
                        <!-- the loop -->
                        <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                        <div class="news-item">
                            <div class="image">
                                <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>"></a>
                            </div>
                            <div class="title">
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>                        
                            </div>
                        </div>
                        <?php endwhile; ?>                        
                   
                        <?php wp_reset_postdata(); ?>
                    
                    <?php else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>                                                              
                </div>
            </div> 
           
                
        </div>
    </div>      


    <?php get_footer(); ?>