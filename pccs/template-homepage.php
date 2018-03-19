<?php
/**
 * Template Name: Homepage
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PCCS
 */

get_header(); ?>
<div class="uk-slidenav-position site-banner" data-uk-slideshow="{autoplay:true,animation:'scale',height: '420', videoautoplay:true}">
	<ul class="uk-slideshow">
		<li>
			<iframe src="//fast.wistia.net/embed/iframe/<?php the_field('_home_banner_video'); ?>?seo=false&autoPlay=true&loop=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
			<div class="uk-cover-background" style="background-image: url('<?php the_field('_home_banner_image'); ?>');" data-uk-parallax="{bg: '-200'}">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-bottom uk-text-center">
					<div class="site-banner-caption">
						<h3><?php the_field('_home_banner_title'); ?></h3>
						<a class="uk-button uk-button-primary" href="<?php the_field('_home_banner_button_link'); ?>"><?php the_field('_home_banner_button_text'); ?><i class="uk-icon-angle-right"></i></a>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>

<section class="uk-block uk-block-large testimonial-block uk-text-center">
	<?php $post_object = get_field('_featured_testimonial');?>														
	<?php if( $post_object ): ?>
	<?php $post = $post_object; ?>
	<?php setup_postdata( $post ); ?>
	<div class="uk-container uk-container-narrow uk-container-center">
		<p>“<?php the_field('_quote');?>”</p>
		<?php the_post_thumbnail('thumbnail', array('class' => 'uk-border-circle'));?>
		<div class="user-details uk-margin-top"><?php the_title();?>,<?php the_field('_possition');?></div>
	</div>
	<?php wp_reset_postdata();  ?>
	<?php endif; ?>       
</section>

<?php if( have_rows('_home_page_modules') ): $count = 0; ?>	   
<?php while( have_rows('_home_page_modules') ): the_row(); ?>
<?php
  $sf_image = get_sub_field('_module_image');
  $sf_image = wp_get_attachment_image_src($sf_image, array(400,400));    
  $sf_image = $sf_image[0];
?>
<?php $block_class = ($count % 2 == 0) ? 'uk-block-muted' : ''; ?>          
<section class="uk-block uk-block-large <?php echo $block_class; ?> featured-block">
	<div class="uk-container uk-container-center">
		<div class="uk-grid">
			<div class="uk-width-large-7-10 uk-container-center">
				<div class="uk-grid" data-uk-margin="{cls:'uk-margin-large-top'}">
					<div class="uk-width-medium-3-10 uk-width-small-1-1 uk-text-center-small">
						<img class="uk-border-circle" src="<?php echo  $sf_image ; ?>" alt="">
					</div>
					<div class="uk-width-medium-7-10 uk-width-small-1-1 uk-text-center-small">
						<h4><?php the_sub_field('_module_title'); ?></h4>
						<hr class="uk-invisible">
						<p><?php the_sub_field('_module_description'); ?></p>
						<p><a href="<?php the_sub_field('_module_link'); ?>"><?php the_sub_field('_module_link_text'); ?> <i class="uk-icon-angle-right"></i></a></p>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<?php $count++; ?>
<?php endwhile; ?>
<?php endif; ?>
<section class="uk-block uk-block-tertiary uk-block-xlarge why-block">
	<div class="uk-container uk-container-narrow uk-container-center">
		<h4 class="uk-text-center uk-margin-large-bottom"><?php the_field('_info_title'); ?></h4>
		<div class="uk-column-medium-1-2">
				<?php the_field('_info_description'); ?>
			<p><a href="<?php the_field('_info_link'); ?>"><?php the_field('_info_link_text'); ?> <i class="uk-icon-angle-right"></i></a></p>
		</div>
	</div>
</section>
<section class="uk-block uk-block-large videos-block">
	<div class="uk-container uk-container-narrow uk-container-center">
		<div class="uk-grid uk-grid-width-large-1-2" data-uk-margin="{cls:'uk-margin-large-top'}">
		<?php if( have_rows('_videos') ): ?>	   
		 <?php while( have_rows('_videos') ): the_row(); ?> 			
				<div>
					<h6><?php the_sub_field('_video_title'); ?></h6>
					<figure class="uk-overlay">
						<a href="http://fast.wistia.com/embed/iframe/<?php the_sub_field('video_link');?>?autoPlay=true&popover=true&amp;version=v1" class="wistia-popover[height=360,playerColor=990000,width=640]">
							<img src="<?php the_sub_field('_video'); ?>" alt="">
						</a>
						<figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom">
							<h4 class="uk-h6"><?php the_sub_field('_video_overlay_text'); ?></h4>
						</figcaption>					
					</figure>
				</div>
		 <?php endwhile; ?>
		 <?php endif; ?>
		</div>
	</div>
</section>
<section class="uk-block uk-block-large uk-padding-top-remove testimonial-block uk-text-center">
	<div class="uk-container uk-container-narrow uk-container-center">
		<div class="user-comment">
			<div class="uk-slidenav-position" data-uk-slideshow="{animation: 'animation', autoplay : true}">
				<ul class="uk-slideshow">
					
				 <?php $testimonial_sliders = get_field('_testimonial_slider'); ?>
				<?php foreach( $testimonial_sliders as $testimonial_slider ) : ?>
					<?php
						 $possition = get_field('_possition', $testimonial_slider);
					   $quote = get_field('_quote',$testimonial_slider);
					  ?>
					<li>
						<div>
							<p>“<?php echo $quote; ?>”</p>
							<?php echo get_the_post_thumbnail($testimonial_slider, 'thumbnail', array('class' => 'uk-border-circle') ); ?>
							<div class="user-details uk-margin-top"><?php echo get_the_title($testimonial_slider);?>,<?php echo  $possition; ?></div>	        		   </div>
					</li>
					<?php endforeach ; ?>
					<?php /*?><li>
						<div>
							<p>“1Our primary goal is to teach students to love what is lovely, to think and act biblically, and to pursue academic excellence in joyful submission to the Lord Jesus Christ.”</p>
							<img class="uk-border-circle" src="<?php echo get_template_directory_uri(); ?>/images/profile-pic-girl.png" alt="">
							<div class="user-details uk-margin-top">Ryan Evans, headmaster</div>	        	
						</div>
					</li><?php */?>
				</ul>
				<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
				<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>		
			</div>
		</div>
		<div class="uk-margin-top more-comments">
			<a href="<?php the_field('_page_link');?>"> <?php the_field('see_what_other_saying_text');?> <i class="uk-icon-angle-right"></i> </a>
		</div>
	</div>
</section>
<?php get_footer();