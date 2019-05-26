<?php
/**
 * The template for displaying all single clinic posts
 * alfairoze theme
 */

get_header();
?> 
<?php
        // Start the loop.
        while ( have_posts() ) : the_post();?> 
        <h2><?php the_title(); ?></h2>
        <?php the_content();?>
        <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
		<?php
        // End the loop.
      endwhile; 
        ?>
<?php get_footer();?>