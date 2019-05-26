<?php get_header(); ?>
<?php
 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="section">
      <div class="component type--block">
        <div class="images1">
            <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>">
        </div> 
        <div class="block__header">
          <div class="block__title"> <?php the_title(); ?></div>
        </div>
        <div class="block__main">
            <?php the_content(); ?>
        </div>
      </div>
    </div>         
               
 <?php endwhile; endif; ?>
<?php
        // Start the Loop.
    while ( have_posts() ) :
        the_post();?>
        
    <?php endwhile;	?>


<?php get_footer(); ?>
