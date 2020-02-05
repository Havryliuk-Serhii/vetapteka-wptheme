<?php get_header(); ?> 
	<div class="container">   
	<?php if ( have_posts() ) : ?>
		<h3>
			<?php
				printf( esc_html__( 'Результати пошуку для: %s', 'vetapteka' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h3>
		<?php
			while ( have_posts() ) : the_post(); ?>
			<article class="post-articles" id="post-<?php the_ID(); ?>">
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
			<?php endwhile; ?>
			<div class="post-navigation">            	
              	<?php the_post_navigation(); ?>  
            </div>
	<?php else: ?>
			<p>По Вашому запиту нічого не знайдено</p>				
	<?php endif; ?>
<?php get_footer (); ?>