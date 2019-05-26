<?php
/* Template Name: Archive Page */
?>
<?php
get_header();
?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();
endwhile; ?>      
	
<?php
get_footer();?>
