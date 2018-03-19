<?php
/**
 * Template Name: Two column template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PCCS
 */

get_header(); ?>
 <?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="uk-slidenav-position site-banner inner-banner" data-uk-slideshow="{autoplay:true,animation:'scale'}">
			<ul class="uk-slideshow">
				<?php $sf_image  = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
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
		<section class="uk-block uk-block-large about-section">
			<div class="uk-container uk-container-narrow uk-container-center">
				<div class="uk-grid uk-grid-large">
					<?php $content = get_the_content(); ?>
					<?php $args = array();?>
					<?php if($post->post_parent) : ?>
						<?php $args = array('title_li' => '', 'echo' => false, 'child_of' => $post->post_parent); ?>
					<?php else : ?>
						<?php $args = array('title_li' => '', 'echo' => false, 'child_of' => $post->ID); ?>
					<?php endif; ?>
					<?php $pages = wp_list_pages( $args ); ?>
					<?php if($pages) : ?>
						<div class="uk-width-medium-1-3 uk-container-center">
							<div class="uk-panel uk-panel-box widget widget_nav_menu ">
								<ul>
									<?php echo $pages; ?>
								</ul>
							</div>
						</div>
						<div class="uk-width-medium-2-3 uk-container-center">
							<?php echo apply_filters( 'the_content', $content ); ?>
						</div>
					<?php else : ?>
						<div class="uk-width-medium-1-1 uk-container-center">
							<?php echo apply_filters( 'the_content', $content ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
			

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();