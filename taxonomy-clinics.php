<?php
/* Template Name: Archive Page Custom */
?>
<?php
get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>
<div class="section">
    <div class="component type--block">
    <div class="images2">
        <?php echo wp_get_attachment_image( $term->term_image, 'full' ); ?>
    </div> 
    <div class="block__header">
        <div class="block__title"> <?php echo apply_filters( 'the_title', $term->name );  ?></div>
    </div>
    <div class="block__main">
        <p><?php echo esc_html($term->description); ?></p>
        الدكترة الموجوده فى القسم : 
        <?php  
        if ( have_posts() ): while ( have_posts() ): the_post();
        ?>
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        <?php endwhile; ?>
<?php else: ?>
<h2 class="post-title">No News in <?php echo apply_filters( 'the_title', $term->name ); ?></h2>
<?php endif; ?>
    </div>
    </div>
</div>  

  


<?php
get_footer();?>
