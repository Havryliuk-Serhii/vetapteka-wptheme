<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vetapteka
 */

get_header(); ?>
	<div class="container">
		<div class="page-wrapper">
			<?php if (have_posts()) :
			while (have_posts()) : the_post(); ?>
				<article class="post-articles">
					<div class="post-img">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
					</div>
					<div class="post-content">
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<div class="post-head">
							<span class="post-date"><span><?php the_author(); ?></span> - <?php the_time('j M, Y')?></span>
							<span class="post-comments"><?php comments_popup_link('немає коментарів', '1 коментр', '% коментарів')?></span>
						</div>
						<?php the_excerpt(); ?>
						<a class="read-more" href="<?php the_permalink() ?>"><?php esc_html_e( 'Далі','vetapteka' ) ?></a>
					</div>						
				</article>	
			<?php endwhile; 
					else : ?>
						<p>Записів немає.</p>
			<?php endif; ?>					
			<!-- Pagination -->
			<?php vet_pagination(); ?>
		</div>			
<?php get_footer();
