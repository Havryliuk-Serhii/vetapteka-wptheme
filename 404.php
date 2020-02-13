<?php get_header(); ?>
	<div class="error-page" <?php echo vetapteka_get_background('error_bg'); ?>>
        <h1 class="main-title">404</h1>
        <h2 class="main-subtitle"><?php esc_html_e( 'Упсс... Нічого не знайдено.', 'vetapteka' ); ?></h2>
    </div>            
<?php get_footer(); ?>