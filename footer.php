<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vetapteka
 */

?>
    </div>          
  </main>
	<footer class="footer">
    <div class="container">
		  <div class="social-icon">
			  <?php if(!dynamic_sidebar( 'icons_footer' )): ?>
        <span class="footer-text">Место для иконок</span>
        <?php endif; ?>    
			</div>
      <div class="copyright">
				&copy;  <a href="<?php echo home_url(); ?>" title="<?php esc_attr( bloginfo('name') ); ?>"><?php bloginfo('name'); ?></a> <?php echo date("Y") ?>
      </div>             			
    </div>
  </footer>
<?php wp_footer(); ?>       
</body>
</html>


