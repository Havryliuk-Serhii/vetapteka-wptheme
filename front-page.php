<?php get_header()?>
	<div class="hero" <?php echo vetapteka_get_background('hero_bg'); ?>>
		<div class="container">
			<img class="logo-image" src="<?php bloginfo('template_url'); ?>/img/new-logo.png" alt="logo-image">
			<h1 class="welcome"><?php bloginfo('description'); ?></h1>
		</div>
	</div>
<?php 
	get_template_part( 'template-parts/frontpage' , 'about' );
	get_template_part( 'template-parts/frontpage' , 'offers' );
	get_template_part( 'template-parts/frontpage' , 'blog' );
	get_template_part( 'template-parts/frontpage' , 'contacts' );
 ?>
<?php get_footer()?>