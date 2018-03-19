<?php
/**
 * Template Name: Learn-More
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PCCS
 */

get_header(); ?>
<?php if ( have_posts() ) :?>
<?php  while ( have_posts() ) : the_post();?>

<div class="uk-slidenav-position site-banner" data-uk-slideshow="{autoplay:true,animation:'scale'}">
	<ul class="uk-slideshow">
		<li>
			<?php $sf_image  = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>        
			<div class="uk-cover-background uk-position-relative" style="background-image: url('<?php echo $sf_image[0];?>');" data-uk-parallax="{bg: '-200'}">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
					<div class="site-banner-caption">
						<h3><?php the_title();?></h3>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<?php get_template_part( 'defult', 'breadcrumbs' ); ?>
<div class="uk-block uk-block-large">
	<section class="uk-container uk-container-narrow uk-container-center uk-post-content">
		<?php the_content();?>
	</section>
</div>
<div class="uk-block uk-block-large uk-padding-top-remove">
	<section class="uk-container uk-container-narrow uk-container-center uk-post-content tm-container-collapse-small">
		<div class="uk-grid uk-grid-match" data-uk-grid-match>
			<div class="uk-width-medium-5-10">
				<div class="uk-panel info-form uk-text-center">
					<div class="uk-panel-title uk-margin-bottom-remove">
						<h4 class="uk-margin-bottom-remove"><?php the_field('_request_info_title');?></h4>
					</div>
					<div class="uk-panel-body uk-text-center custom-padding">
						<div class="uk-form">
							<?php $code = get_field('_code_reques');?>
							<?php echo do_shortcode($code); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-medium-5-10">
				<div class="uk-panel info-form uk-text-center">
					<div class="uk-panel-title uk-margin-bottom-remove">
						<h4 class="uk-margin-bottom-remove"><?php the_field('_title');?></h4>
					</div>
					<div class="uk-panel-body uk-text-center custom-padding">
						<div class="uk-form">	
							<?php $code = get_field('_code');?>
							<?php echo do_shortcode($code); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php endwhile;?>
<?php endif;?>
<?php get_footer();