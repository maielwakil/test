<?php             
                            $args = array(
                            'post_type'   => 'galary',
                            'post_status' => 'publish'
                            );         
                            $slider = new WP_Query( $args );if( $slider->have_posts() ) :               
                            while( $slider->have_posts() ) :  $slider->the_post();?> 
                            <p style='display:none;'></p>       
                            <?php $images = rwmb_meta( 'image_advanced', 'type=image_advanced&size=full');
                            foreach ( $images as $image )
                            { echo'<div class="bullet "></div>';}
                            endwhile;   endif;  ?>