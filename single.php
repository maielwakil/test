<?php
/**
 * The template for displaying all single posts
 * alfairoze theme
 */

get_header();
?> 
    <div class="section size--container">
    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();?>
        <div class="component type--news-item">
          <div class="image">
            <img src="<?php the_post_thumbnail_url() ?>" alt="">
          </div>
          <div class="title">
          <?php the_title(); ?>
          </div>
          <div class="description">
          <?php the_content();?>
          </div>
        </div>
        <?php // End the loop.
        endwhile;
        ?>
      </div>
      <div class="section">
        <div class="component type--block">
          <div class="block__header">
            <div class="block__title">اخبار متعلقة</div>
          </div>
          <div class="block__main">
          <?php echo do_shortcode( '[custom-related-posts title="" none_text="None found" order_by="tags" order="ASC"]' ); ?>
          </div>
        </div>
      </div>
      
<?php get_footer();?>