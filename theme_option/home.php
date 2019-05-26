<?php

/* Template Name: homePage*/



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

    <div class="section">

      <div class="component type--block">

        <div class="block__header">

          <div class="block__title">العيادات الخاصة</div>

        </div>

        <div class="block__main">

          <div class="component type--clinics">

                  <?php

                  $clinics = get_clinics( array(

                    'orderby' => 'name',

                    'order'   => 'ASC'

                ) );

                $befor1='<div class="clinic"><div class="image"><a href="';

                $after1='">';

                $befor2='</a></div><div class="name"><a href="';

                $after2='">'; 

                $end='</a></div></div>';               

                foreach( $clinics as $clinic ) {

                 $link=get_clinic_link( $clinic->term_id );                    

                  echo  $befor1 ;echo $link;echo $after1;echo wp_get_attachment_image( $clinic->term_image, 'full' );echo $befor2;echo $link;echo $after2;echo$clinic->name;echo $end; 

                } 

                  

                  ?>                  

          </div>

        </div>        

      </div>

      </div>  

    

      <div class="section">

        <div class="component type--block">

          <div class="block__header">

            <div class="block__title">الاطباء المتخصصون</div>

          </div>

          <div class="block__main">

            <div class="component type--doctors">

            <div class="doctors">

            <?php $counter = 0;?>

            <?php

                $args = array(

                'post_type'   => 'doctors',

                'post_status' => 'publish'

                );   

                            

                $slider = new WP_Query( $args );if( $slider->have_posts() ) :               

                while( $slider->have_posts() ) :  $slider->the_post(); $counter++ 

             ?>        

                <div class="doctor <?php if($counter==1){echo 'previous';} else{ if($counter==2){echo 'active';} else{ if($counter==3){echo 'next';} } } ?> ">

                  <div class="information">

                    <div class="image">

                      <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a>

                    </div>

                    <div class="details">

                      <div class="name">

                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                      </div>

                      <div class="special">

                        <a href="#"><?php echo the_field( 'spical' ); ?></a>

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

              <?php  endwhile; else : esc_html_e( 'No contentdoctors in the your websit', 'text-domain' );  endif;  ?>  

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

      </div>      

      <div class="section">

          <div class="component type--block theme--programs">

              <div class="block__header">

                <div class="block__title">برامج العناية بالصحة</div>

              </div>

              <div class="block__main">

                <div class="component type--programs">

                <?php

                    $args = array(

                    'post_type'   => 'program_care',

                    'post_status' => 'publish'

                    ); 

                                

                    $slider = new WP_Query( $args );if( $slider->have_posts() ) :               

                    while( $slider->have_posts() ) :  $slider->the_post();

                    ?>

                    <div class="program <?php $true=get_field( 'offer-care' );  if ($true ==1){ echo 'style--discount';}?>">

                      <div class="title">

                      <?php the_title();?>

                      </div>

                      <div class="description">

                      <?php  the_content();?> 

                      </div>

                      <div class="price">

                    الاشتراك السنوى <?php  $true=get_field( 'offer-care' );  if ($true ==1){ ?><span class="current-price"><?php echo the_field( 'dicout_price' );?></span><span class="old-price"><?php echo the_field( 'price' ); ?></span> <?php } else {?><span class="current-price"><?php echo the_field( 'price' ); ?></span><?php } ?> جنيها

                      </div>

                      <a class="button" href="<?php the_permalink();?>">اشترك الان</a>

                    </div> 

                    <?php  endwhile; else : esc_html_e( 'No content in the your websit', 'text-domain' );  endif;  ?>                     

                </div>

              </div>

              <div class="block__footer">

                <div class="block__links">

                  <a href="<?php echo get_home_url(); ?>/program">اعرض الكل</a>

                </div>

              </div>

          </div>

      </div>

      <div class="section">

        <div class="component type--block">

          <div class="block__header">

            <div class="block__title">احدث الاخبار</div>

          </div>

          <div class="block__main">

            <div class="component type--news-items"> 

            <?php $counter = 0;?>

            <?php

                $args = array(

                'post_type'   => 'news',

                'post_status' => 'publish',

                'posts_per_page'=>'3'

                );                

                $slider = new WP_Query( $args );if( $slider->have_posts() ) :               

                while( $slider->have_posts() ) :  $slider->the_post(); $counter++ 

             ?>                         

              <div class="news-item">

                <div class="image">

                  <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>"></a>

                </div>

                <div class="title">

                  <a href="<?php the_permalink();?>"><?php the_title();?></a>

                </div>

              </div>

              <?php  endwhile; else : esc_html_e( 'No slider image in the your websit', 'text-domain' );  endif;  ?>        

            </div>

          </div>

          <div class="block__footer">

            <div class="block__links">

              <a href="<?php echo get_home_url(); ?>/news">اعرض الكل</a>

            </div>

          </div>

        </div>

      </div>      

      <div class="section">

        <div class="component type--block theme--appointment">

          <div class="block__header">

            <div class="block__title">تحديد موعد زيارة</div>

          </div>

          <div class="block__main">

          <?php echo do_shortcode( '[contact-form-7 id="77" title="Contact form 1"]' ); ?>

          </div>

        </div>

      </div>

    <?php get_footer();?>