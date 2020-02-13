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
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1307.8176495538244!2d28.114125630021707!3d49.03654301288969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4732a2975030267f%3A0x87efd780c7f1bfa!2z0JLQtdGC0LXRgNC40L3QsNGA0L3QsNGPINCw0L_RgtC10LrQsCAi0KfQvtGC0LjRgNC4INC70LDQv9C4Ig!5e0!3m2!1sru!2sua!4v1476185564812"></iframe>
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