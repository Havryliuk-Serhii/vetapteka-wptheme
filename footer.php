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
          <a href="<?php echo get_option('vk_icon'); ?>">
            <div class="vk"></div>
          </a>
          <a href="<?php echo get_option('ok_icon'); ?>">
            <div class="ok"></div>
          </a>
          <a href="<?php echo get_option('fb_icon'); ?>">
            <div class="fb"></div>
          </a>
          <a href="<?php echo get_option('gp_icon'); ?>">
            <div class="gp"></div>
          </a>		  
      </div>        	
      <div class="copyright">
				&copy;  <a href="<?php echo home_url(); ?>" title="<?php esc_attr( bloginfo('name') ); ?>"><?php bloginfo('name'); ?></a> <?php echo date("Y") ?>
      </div>             			
    </div>
  </footer>
<?php wp_footer(); ?>       
</body>
</html>


