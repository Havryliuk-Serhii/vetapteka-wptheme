<?php
/**
 * The template for displaying  section About.
 */
?>
<?php
$id = 3; 
$posts_about = new WP_Query(array('cat' => $id, 'posts_per_page' => 1));
?>
<div class="about-us" id="about">
	<div class="container">
		<div class="feature-header text-center">
			<h2 class="feature-title"><?php esc_html_e( 'Про мене','vetapteka' ) ?></h2>
		</div>
		<?php if ( $posts_about->have_posts() ) : 
		 	while ( $posts_about->have_posts() ) : $posts_about->the_post(); ?>
		<div class="post-about-us">
			<?php the_content(); ?>	
		</div>
		<div class="img-about-us">
			<?php the_post_thumbnail('spec_thumb'); ?>
		</div>		
		<? endwhile; 
			endif;
			wp_reset_query();			
		?>
	</div>
</div>
