<?php get_header (); ?>
<div class="container">
	<?php if (have_posts()) :
		while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('single-articles'); ?>>
			<h3><?php the_title(); ?></h3>
			<div class="single-post-head">
				<span class="post-date"><span><?php the_author() ?></span> - <?php the_time('j M, Y')?></span>
				<span class="post-comments"><?php comments_number('поки що немає коментарів', '1 коментар', '% коментарів'); ?></span>
			</div>
				<div class="single-content">
					<div class="single-img">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php the_content(); ?>
				</div>			
		</article>
		<div class="post-navigation">            	
           	<?php the_post_navigation(); ?>  
        </div>		
		<!-- Comments-->
			<?php if ( comments_open() || get_comments_number() ) :
					comments_template();
			?>
			<?php endif; ?>  
		<?php endwhile; ?>
	<?php endif; ?>
		
<?php get_footer (); ?>	
