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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<main class="main">
			<div class="container">
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
						<a class="read-more" href="<?php the_permalink() ?>"><?php echo __('Далі', 'vetapteka')?></a>
						</div>						
					</article>	
				<?php endwhile; 
						else : ?>
						<p>Записів немає.</p>
				<?php endif; ?>
			</div>			
			<!-- Pagination -->
			<?php vet_pagination(); ?>
			<!--
			<div class="pagination">
				<a href="#">«</a>
				<a href="#">1</a>
				<a class="active" href="#">2</a>
				<a href="#">3</a>
				<a href="#">»</a>
			</div>
			-->  			
		</main>
<?php get_footer();
