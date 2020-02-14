<?php
/**
 * The template for displaying  section Blog.
 */
?>
<div class="blog" id="blog">
	<div class="container">
		<div class="feature-header text-center">
			<h2 class="feature-title"><?php esc_html_e( 'Блог','vetapteka' ) ?></h2>
		</div>
        <?php
            $id = 9; 
            $posts_blog = new WP_Query(array('cat' => $id, 'posts_per_page' => 2));
        ?>
		<?php if ($posts_blog->have_posts() ) : ?>
            <?php while ($posts_blog->have_posts() ) : $posts_blog->the_post(); ?> 
        <article id="post-<?php the_ID(); ?>" <?php post_class('articles'); ?>>		 
            <div class="post-img">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
            </div>
            <div class="post-head">
           	    <span class="post-date"><span><?php the_author(); ?></span> - <?php the_time('j M, Y')?></span>
				<span class="post-comments"><?php comments_popup_link('немає коментарів', '1 коментр', '% коментарів')?></span>
            </div>
                <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <a class="read-more" href="<?php the_permalink() ?>"><?php esc_html_e( 'Далі','vetapteka' ) ?></a>
        </article>
            <?php endwhile;?>        
			<?php else : ?>
					<p><?php esc_html_e('Записів немає','vetapteka' ) ?></p>
		<?php endif;
            wp_reset_query();
        ?>         		                              			
	</div>
</div>

