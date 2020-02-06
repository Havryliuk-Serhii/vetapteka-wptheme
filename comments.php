 
<div class="comments">
			<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'Этот пост защищен паролем. Введите пароль чтобы просмотеть комментарии.', 'sd' ); ?></p>
						</div>
			<?php
					return;
				endif;
			?>
 
			<?php if ( have_comments() ) : ?>
						<h3 class="comments-title"> <?php _e('Коментарии','sd')?></h3>
						
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
						<div class="navigation">
							<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Старые коментарии', 'sd' ) ); ?></div>
							<div class="nav-next"><?php next_comments_link( __( 'Новые коментарии <span class="meta-nav">&rarr;</span>', 'sd' ) ); ?></div>
						</div> <!-- .navigation -->
			<?php endif; // check for comment navigation ?>
 
			<ul class="media-list">
               	<?php
					wp_list_comments(array(
							'callback' => 'sd_list_comment',
					));
				?>	                            
            </ul>  
       		                         
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
						<div class="navigation">
							<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Старые коментарии', 'sd' ) ); ?></div>
							<div class="nav-next"><?php next_comments_link( __( 'Новые коментарии <span class="meta-nav">&rarr;</span>', 'sd' ) ); ?></div>
						</div>
			<?php endif;  ?>
			 
				<?php
					$num_comments = get_comments_number();
				if ( ! comments_open() && $num_comments == 0 ) : ?>
					<p class="nocomments"><?php _e( 'Коментарии закрыты.' , 'striped' ); ?></p>
				<?php endif;  ?>
			 
			<?php endif; ?>
</div>
<div class="blog-form">
	<?php 
		$comments_args = array(
					'fields' => array (
							'author' => '<div class="form-group"><div class="col-md-6">' . '<input type="text" class="form-control" id="author" name="author" placeholder="Имя"' . esc_attr( $commenter['comment_author'] ) . $aria_req . $html_req . ' /></div></div>',
							'email'  => '<div class="form-group"><div class="col-md-6">' .
											'<input id="email" name="email" class="form-control" placeholder="Email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) .  esc_attr(  $commenter['comment_author_email'] ) . ' aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div></div>',
							),
					'comment_field'        => '<div class="form-group"><div class="col-md-12"><textarea id="comment" name="comment" cols="30" rows="7" class="form-control" placeholder="Сообщение" aria-required="true" required="required"></textarea></div></div>',
					'title_reply'          => __( 'Оставте комментарий' ),
					'title_reply_before'   => '<h3 class="comments-title">',
					'title_reply_after'    => '</h3>',
					'submit_button'        => '<button class="btn btn-main">%1$s</button>',
					'submit_field'         => '<div class="form-group"><div class="col-md-12"><div class="text-center">%1$s</div></div></div>',					
		);
		comment_form($comments_args);
	?>
</div>
