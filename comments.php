 
<div class="comments">
			<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'Цей пост захищено паролем. Введіть пароль щоб подивитися коментарі.', 'vetapteka' ); ?></p>

			<?php
					return;
				endif;
			?>

			<?php if ( have_comments() ) : ?>
						<h3 class="comments-title"> <?php _e('Коментарі','vetapteka')?></h3>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
						<div class="navigation">
							<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Старі коментарі', 'vetapteka' ) ); ?></div>
							<div class="nav-next"><?php next_comments_link( __( 'Нові коментарі <span class="meta-nav">&rarr;</span>', 'vetapteka' ) ); ?></div>
						</div> <!-- .navigation -->
			<?php endif; // check for comment navigation ?>

			<div class="media-list">
               	<?php
					wp_list_comments(array(
							'callback' => 'vet_list_comment',
					));
				?>	                            
            </div>  

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
						<div class="navigation">
							<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Старі коментарі', 'vetapteka' ) ); ?></div>
							<div class="nav-next"><?php next_comments_link( __( 'Нові коментарі <span class="meta-nav">&rarr;</span>', 'vetapteka' ) ); ?></div>
						</div>
			<?php endif;  ?>

				<?php
					$num_comments = get_comments_number();
				if ( ! comments_open() && $num_comments == 0 ) : ?>
					<p class="nocomments"><?php _e( 'Коментарі закриті.' , 'vetapteka' ); ?></p>
				<?php endif;  ?>

			<?php endif; ?>
</div>
<div class="comments-form">
	<?php 
		$comments_args = array(
					'fields' => array (
							'author' => '<div class="form-field">' . '<input type="text" class="form-control" id="author" name="author" placeholder="Імя"' . esc_attr( $commenter['comment_author'] ) . $aria_req . $html_req . ' /></div>',
							'email'  => '<div class="form-field">' . '<input id="email" name="email" class="form-control" placeholder="Email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) .  esc_attr(  $commenter['comment_author_email'] ) . ' aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',
							),
					'comment_field'        => '<div class="form-textarea"><textarea id="comment" name="comment" cols="30" rows="7" class="form-control" placeholder="Повідомлення" aria-required="true" required="required"></textarea></div>',
					'title_reply'          => __( 'Залиште комментар' ),
					'title_reply_before'   => '<h3 class="comments-title">',
					'title_reply_after'    => '</h3>',
					'submit_button'        => '<button class="btn-main">%1$s</button>',						
		);
		comment_form($comments_args);
	?>
</div> 
