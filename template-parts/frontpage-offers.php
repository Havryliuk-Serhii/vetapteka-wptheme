<?php
/**
 * The template for displaying  section Offers.
 */
?>

<div class="offers" id="offers" <?php echo vetapteka_get_background('offers_bg'); ?>>
			<div class="container">
				<div class="feature-header-lite text-center">
					<h2 class="feature-title"><?php esc_html_e( 'Пропонуємо','vetapteka' ) ?></h2>
				</div>
				<div id="captioned-gallery">
					<?php $slider = new WP_Query( array('post_type' => 'slider','posts_per_page' => 5, 'order' => 'ASC') ); ?>
					<figure class="slider">
						<?php if ($slider->have_posts()) :
						  	while ($slider->have_posts()) : $slider->the_post(); ?>
				  			<figure>
								<?php the_post_thumbnail(); ?>
							</figure>
							<?php endwhile; ?>
						<?php endif; wp_reset_query(); ?>	
					</figure>
				</div>
				<div class="testimonials">
                    <div class="feature-header-lite text-center">
                        <h2 class="feature-title"><?php esc_html_e( 'Відгуки','vetapteka' ) ?></h2>
                    </div>
                     <!--  Carousel start -->
                    <div  class="owl-carousel owl-theme">
                    	<?php
                    	 $testimonial_slider = new WP_Query( array('post_type' => 'testimonial_slider','posts_per_page' => 3, 'order' => 'ASC') ); ?>
                    	<?php if ($testimonial_slider->have_posts()) :
						  		while ($testimonial_slider->have_posts()) : $testimonial_slider->the_post(); ?> 
                        <div class="testimonials-inner">
                                <div class="testimonial-foto">
	                                  <?php the_post_thumbnail('testimonial_thumb'); ?>             
	                            </div>
								<h4 class="testimonial-author"><?php the_author(); ?></h4>
								<div class="testimonial-text"><?php the_content(); ?></div>								
                        </div>
						<?php endwhile; ?>
						<?php endif;
								wp_reset_query();
						?>
					</div>	
				</div>
			</div>
		</div>
