<?php
/**
 * The template for displaying all single clinic posts
 * alfairoze theme
 */

get_header();
?> 
<div class="section">
    <div class="component type--block">
    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();?> 
    <div class="images2">
      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">    
    </div> 
    <div class="block__header">
        <div class="block__title"> <?php the_title(); ?></div>
    </div>
    <div class="block__main">
    <?php the_content();?>
        الدكترة الموجوده فى القسم : 
        
        <?php $terms =  wp_get_post_terms($post->ID, 'clinics');
              foreach ( $terms as $term ) {
               $name=$term->name;              
                $args = array(
                  'post_type' => 'doctors',                  
                  'tax_query' => array(
                    array(
                        'taxonomy' => 'clinics',
                        'field' => 'name',
                        'terms' =>$name
                    ),
                )
                  );                 
                  $slider = new WP_Query( $args );if( $slider->have_posts() ) :               
                    while( $slider->have_posts() ) :  $slider->the_post(); ?>
                    <div class="information">                    
                    <div class="details">
                    <div class="name">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>                   
                    </div>                    
                    </div>
                </div>
                   <?php  endwhile;   endif;    
          } ?>
        
    </div>
          
		<?php
        // End the loop.
      endwhile; 
        ?>
    </div>
</div>  


  
<?php get_footer();?>