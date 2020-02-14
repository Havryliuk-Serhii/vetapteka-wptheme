<?php
/**
 * The template for displaying  section Contacts.
 */
?>
	<div class="contact" id="contacts" <?php echo vetapteka_get_background('contacts_bg'); ?>>
		<div class="container">
			<div class="feature-header-lite text-center">
				<h2 class="feature-title"><?php esc_html_e( 'Контакти','vetapteka' ) ?></h2>
			</div>
			<div class="foto-image">
				<img class="foto" src="<?php bloginfo('template_url'); ?>/img/аптека.jpg" alt="foto">
			</div>
			<div class="contact-area">
				<div class="our-location">
					<?php if(!dynamic_sidebar( 'map' )): ?>
                	<?php endif; ?>						
				</div>
				<div class="contact-info">
					<div class="info-bottom">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/img/map-icon.png " alt="map icon">
						<span class="item-bottom">
							<?php echo get_option('my_adress'); ?>
						</span>
					</div>
					<div class="info-bottom">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/img/time-icon.png" alt="time icon">
							<span class="item-bottom">
								<?php echo get_option('my_time'); ?>
							</span>
					</div>
					<div class="info-bottom">
						<img class="icon" src="<?php bloginfo('template_url'); ?>/img/telefone-icon.png" alt="telefone icon">
							<span class="item-bottom">
								<?php echo get_option('my_phone'); ?>
							</span>
					</div>
				</div>
			</div>
		</div>
	</div>