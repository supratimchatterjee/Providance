<?php
/**
 * Template Name: Testimonials
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PCCS
 */

get_header(); ?>
<?php if ( have_posts() ) :?>
<?php  while ( have_posts() ) : the_post();?>

<div class="uk-slidenav-position site-banner inner-banner" data-uk-slideshow="{autoplay:true,animation:'scale'}">
	<ul class="uk-slideshow">
		<?php $sf_image  = wp_get_attachment_image_src(get_post_thumbnail_id(), array(1280,420)); ?>
		<?php $sf_image = $sf_image[0]; ?>
		<li>
			<div class="uk-cover-background uk-position-relative" <?php if($sf_image):?>style="background-image: url('<?php echo $sf_image;?>');" <?php endif;?>  style="background-image: url('http://pccschool.wpengine.com/wp-content/uploads/2016/04/1280x420.jpg');" data-uk-parallax="{bg: '-200'}">
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

<!--=================================================
=            testimonial: introduction              =
==================================================-->
<section class="uk-block uk-block-large">
	<div class="uk-container uk-container-narrow uk-container-center">
		<?php the_content();?>
		<hr class="uk-invisible uk-margin-bottom-remove">
	</div>
</section>

<?php if( have_rows('_flexible_content') ):?>
	<?php while ( have_rows('_flexible_content') ) : the_row(); ?>
		<?php if( get_row_layout() == '_single_testimonial' ) : ?>
			<!-- Single Testimonial -->			
			<?php $post_object = get_sub_field('_testimonial'); ?>
			<?php if( $post_object ) : ?>
				<?php $post = $post_object; ?>
				<?php setup_postdata( $post ); ?> 
				<section class="uk-block uk-block-xlarge uk-block-muted testimonial-block uk-text-center">
					<div class="uk-container uk-container-narrow uk-container-center">
						<p>“<?php the_field('_quote');?>”</p>
						<?php the_post_thumbnail('thumbnail', array('class' => 'uk-border-circle'));?>
						<div class="user-details uk-margin-top"><?php the_title();?>, <?php the_field('_possition');?></div>
					</div>
				</section>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			<!-- Single Testimonial -->
		<?php elseif( get_row_layout() == '_multiple_testimonial' ) : ?>
			<!-- Multi Testimonial -->
			<section class="uk-block uk-block-large testimonial-block testimonial-block-small">
					<div class="uk-container uk-container-narrow uk-container-center">
						<?php $testimonial_sliders = get_sub_field('_testimonials'); ?>
						<?php foreach( $testimonial_sliders as $testimonial_slider ) : ?>
							<?php $possition = get_field('_possition', $testimonial_slider); ?>
							<?php $quote = get_field('_quote',$testimonial_slider); ?>				
							<div class="uk-grid uk-flex-middle" data-uk-margin="{cls:'uk-margin-top'}">
								<div class="uk-width-medium-8-10 uk-push-2-10 uk-flex-middle">
									<p><?php echo $quote; ?>”</p>
								</div>
								<div class="uk-width-medium-2-10 uk-pull-8-10 uk-text-center uk-row-first">
									<?php echo get_the_post_thumbnail($testimonial_slider, 'thumbnail', array('class' => 'uk-border-circle') ); ?>
									<div class="user-details uk-margin-top"><?php echo get_the_title($testimonial_slider);?>, <?php echo  $possition; ?></div>
								</div>
							</div>
							<hr class="uk-invisible uk-margin-large-top uk-margin-bottom">
						<?php endforeach ; ?>
					</div>
				</section>
			<!-- Multi Testimonial -->
		<?php endif;?>
	<?php endwhile;?>
	<?php endif;?>
<?php endwhile;?>
<?php endif;?>
<?php get_footer();