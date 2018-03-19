<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PCCS
 */

?>
</main>

<footer class="footer">
	<div class="uk-block uk-block-primary uk-contrast site-alert">
		<div class="uk-container uk-container-center">
			<div class="uk-grid">
				<div class="uk-width-large-3-4 uk-container-center">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-medium-7-10">
							<h4 class="uk-margin-small-top"><?php the_field('_call_to_action_text','option'); ?></h4>
						</div>
						<div class="uk-width-medium-3-10">
							<a href="<?php the_field('_call_to_action_button_link','option'); ?>" class="uk-button uk-button-success"><?php the_field('_call_to_action_button_text','option'); ?><i class="uk-icon-angle-right uk-hidden-medium uk-hidden-small uk-hidden-large"></i></a>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<div class="uk-block uk-block-secondary uk-contrast site-socket">
		<div class="uk-container uk-container-center">
		<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'uk-list footer-menu uk-hidden-small', 'container' => false ) ); ?>
			<?php /*?><ul class="uk-list footer-menu uk-hidden-small">
				<li><a href="#">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Admissions</a></li>
				<li><a href="#">Academics</a></li>
				<li><a href="#">Athletics</a></li>
				<li><a href="#">School Life</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Request Info</a></li>
				<li><a href="#">Parents &amp; Students</a></li>
			</ul><?php */?>
			<hr class="uk-margin-large uk-hidden-small">
			<div class="uk-grid">
				<div class="uk-width-large-3-4 uk-container-center uk-text-center footer-bottom">
					<h5 class="uk-margin uk-hidden-small"><?php the_field('_joining_title','option');?></h5>
					<div class="footer-form uk-hidden-small">
						<div class="uk-form">
							  <?php $code=get_field('_code','option');?>
                         	  <?php echo apply_filters('the_content', $code ); ?>
						</div>
					</div>
					<ul class="uk-list footer-info">
						<li><span class="uk-hidden-small">School office hours:</span><?php the_field('_office_hours','option'); ?></li>
						<li><?php the_field('_address','option'); ?></li>
					</ul>
					<hr class="uk-margin-large uk-visible-small">
					<p class="phone"><?php the_field('_phone_number','option'); ?></p>
					<div class="social">
						<?php 
							$twitter = get_field ('_twitter','option');
							$facebook = get_field ('_facebook','option');
							$youtube = get_field ('_youtube','option');
						?>
					
						<?php if(!empty($twitter)):?><a href="<?php echo $twitter; ?>" class="uk-icon-hover uk-icon-medium uk-icon-twitter"></a><?php endif; ?>
						<?php if(!empty($facebook)):?><a href="<?php echo $facebook; ?>" class="uk-icon-hover uk-icon-medium uk-icon-facebook-square"></a><?php endif; ?>
						<?php if(!empty($youtube)):?><a href="<?php echo $youtube; ?>" class="uk-icon-hover uk-icon-medium uk-icon-youtube-play"></a><?php endif; ?>
					</div>
					<div class="footer-logo">
						<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo-light.svg" data-uk-svg></a>
					</div>
				</div>
			</div>	
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
<script src="//fast.wistia.com/static/popover-v1.js"></script>
<script src="//fast.wistia.net/assets/external/E-v1.js"></script>
</body>
</html>
