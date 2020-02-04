<?php get_header (); ?>
<div class="container">
	<?php if (have_posts()) :
		while (have_posts()) : the_post(); ?>
		<article class="single-articles" id="post-<?php the_ID(); ?>">
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
		<!--
			<div class="comments">
				<h3 class="comments-title">Комментарии</h3>
					<div class="media-list">
						<div class="media-heading">
							<div class="media-img">
								<a href="#"><img class="media-object img-rounded" src="img/User-512.png" alt="..."></a>
							</div>
							<h4>Дима<span>02 December 2019</span></h4>												
						</div>
						<div class="media-body">
							<p> Odit nostrum et debitis reiciendis ullam quam corrupti modi, porro similique, voluptatem cumque tempore, ratione libero harum pariatur error veritatis aliquid laboriosam.</p>
							<a href="#">Ответить</a>
						</div>							                                       
					</div>       
			</div>
		-->
					<!-- Comments form -->
					<!--
					<div class="comments-form">
						<h3 class="comments-title">Оставте комментарий</h3>
						<div class="form-field">
							<input type="text" class="form-control" placeholder="Имя">
						</div>
						<div class="form-field">
							<input type="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-textarea">
							<textarea name="comment" id="" cols="30" rows="7" class="form-control" placeholder="Сообщение"></textarea>
						</div>
						<button class="btn-main"> Отправить </button>						
					</div>	
					-->		
<?php get_footer (); ?>						