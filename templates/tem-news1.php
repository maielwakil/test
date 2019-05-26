    <?php /* Template Name: news1*/ ?>
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
            <div class="slideshow-container">
				<div class="mySlides fade">
					<div class="block__main">
						<div class="component type--news-items">
                        <?php $counter = 0;?>
                        <?php
                            $args = array(
                            'post_type'   => 'post',
                            'post_status' => 'publish'
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
							<?php if($counter % 6 == 0){echo ' </div></div></div><div class="mySlides fade"><div class="block__main"><div class="component type--news-items">';}?>		 
                        <?php  endwhile; endif;  ?>  
						</div>
					</div>
				</div>	
				<br>
				<div class="block__footer">
					<div class="block__links">
					  <a class="prev" onclick="plusSlides(-1)">السابق</a>
					  					
					  <a class="next" onclick="plusSlides(1)">التالى</a>
					</div>
				</div>
				 
			</div>
			<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}    
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none";  
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";  
			  dots[slideIndex-1].className += " active";
			}
			</script>
                
        </div>
    </div>      


    <?php get_footer(); ?>