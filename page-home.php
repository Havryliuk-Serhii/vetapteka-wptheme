<?php
/* 
Template Name: Home Page
*/

$about_us_title        = get_post_meta(10, 'about_us_title', true);
$offers_title              = get_post_meta(10, 'offers_title', true);
$testimonials_title    = get_post_meta(10, 'testimonials_title', true);
$contact_title         = get_post_meta(10, 'contact_title', true);
$btn_contact         = get_post_meta(10, 'btn_contact', true);
$btn_shop              = get_post_meta(10, 'btn_shop', true);
$test_person_1          = get_post_meta(10, 'test_person_1', true);
$test_person_2          = get_post_meta(10, 'test_person_2', true);
$test_person_3          = get_post_meta(10, 'test_person_3', true);

get_header(); ?>
    <div class="hero ">
    	<div class="container">	
        	<img class="logo-image wow fadeInLeft" src="<?php bloginfo('template_url'); ?>/img/new-logo.png" alt="logo-image">
				<h1 class="welcome wow fadeInRight"><?php bloginfo('description'); ?></h1>
			</div>
	</div>
	<div class="about-us"  id="about-us">
        <div class="container">
				<div class="feature-header text-center">
					<h2 class="feature-title"><?php echo $about_us_title; ?></h2>
				</div>	
				<div class="post-about-us wow fadeInLeft">
					<?php if(!dynamic_sidebar( 'abouttext_widget' )): ?>
                        <span class="slider-text">Місце для тексту</span>
                    <?php endif; ?>    
				</div>
				<div class="img-about-us">
				<img class="wow fadeInRight" src="<?php bloginfo('template_url'); ?>/img/аптекар.png" alt="аптекар">
				</div>
			</div>
    </div>
		<div class="offers" id="offers">
		    <div class="container">
				<div class="feature-header text-center">
					<h2 class="feature-title-lite"><?php echo $offers_title; ?></h2>
				</div>	
				<img class="offers-image" src="<?php bloginfo('template_url'); ?>/img/пропонуємо.png" alt="пропонуємо">
				</div>
				<div class="wow zoomInDown">
				<?php if(!dynamic_sidebar( 'carousel_slides' )): ?>
    <span class="slider-text">Место для слайдера</span>
<?php endif; ?>    
            </div>
				<p class="offers-buttons">
					<a href="#contact" class="btn btn-contact"><?php echo $btn_contact; ?></a>
					<a href="shop.html" class="btn btn-shop"><?php echo $btn_shop; ?></a>
				</p>
                
		    </div>
		</div>
		<div class="testimonials" id="testimonials">
		    <div class="container">
				<div class="feature-header text-center">
					<h2 class="feature-title"><?php echo $testimonials_title; ?></h2>
				</div>	
				<div class="testimonials-inner-large">
				    <div class="testimonial-person">
					<div class="testimonial-foto wow fadeInLeft">
						<img  src="<?php bloginfo('template_url'); ?>/img/фото-1.jpg" alt="testimonial author foto">
					</div>
					<span class="testimonial-author"><?php echo $test_person_1; ?></span>
					</div>
					<div class="wow fadeInRight">
					<?php if(!dynamic_sidebar( 'testimonial_widget1' )): ?>
					<?php endif; ?> 
					</div>
				</div>
           <div class="testimonials-inner">
                    <div class="testimonial-person">
                        <div class="testimonial-foto wow fadeInLeft">
                            <img src="<?php bloginfo('template_url'); ?>/img/фото-2.jpg" alt="testimonial author foto">
                        </div>
                        <span class="testimonial-author"><?php echo $test_person_2; ?></span>
					</div>
					<div class="wow fadeInRight">
					<?php if(!dynamic_sidebar( 'testimonial_widget2' )): ?>
					<?php endif; ?> 
					</div>
				</div>
           <div class="testimonials-inner">
               <div class="testimonial-person">
					<div class="testimonial-foto wow fadeInLeft">
						<img src="<?php bloginfo('template_url'); ?>/img/фото-3.jpg" alt="testimonial author foto">
					</div>
					<span class="testimonial-author"><?php echo $test_person_3; ?></span>
					</div>
					<div class="wow fadeInRight">
					<?php if(!dynamic_sidebar( 'testimonial_widget3' )): ?>
					<?php endif; ?> 
				    </div>
					
				</div>
            
					
				
			</div>
		</div>

<div class="contact" id="contact">
		    <div class="container">
				<div class="feature-header text-center">
					<h2 class="feature-title-lite"><?php echo $contact_title; ?></h2>
				</div>	
				<div class="foto-image">
					<img class="foto wow fadeInLeft" src="<?php bloginfo('template_url'); ?>/img/аптека.jpg" alt="foto">
				</div>
				<div class="contact-info wow fadeInRight">
					<?php if(!dynamic_sidebar( 'text_widget' )): ?>
                        <span class="slider-text">Місце для тексту</span>
                    <?php endif; ?>   
				
				</div>
		</div>
		</div>
			<div class="our-location">
				<?php if(!dynamic_sidebar( 'map' )): ?>
                <?php endif; ?>   
		    </div>
		


<?php get_footer(); ?>
