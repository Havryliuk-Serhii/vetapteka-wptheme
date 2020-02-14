<?php get_header (); ?>
	<div class="container">
		<div class="page-wrapper">
			<?php while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('post-articles'); ?>>
				<div class="post-img">
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
				</div>
				<div class="post-content">
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<div class="post-head">
							<span class="post-date"><span><?php the_author(); ?></span> - <?php the_time('j M, Y')?></span>
							<span class="post-comments"><?php comments_popup_link('немає коментарів', '1 коментр', '% коментарів')?></span>
						</div>
						<?php the_content(); ?>
						<a class="read-more" href="<?php the_permalink() ?>"><?php echo __('Далі', 'vetapteka')?></a>
				</div>						
			</article>
			<div class="post-navigation">            	
              	<?php the_post_navigation(); ?>  
            </div>
            <?php if ( comments_open() || get_comments_number() ) :
				comments_template();
			?>
			<?php endif; ?>  
			<?php endwhile; ?>
		</div>	 	
<?php get_footer (); ?>			