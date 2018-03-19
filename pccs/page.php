<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
	    <?php
			$sf_image  = wp_get_attachment_image_src(get_post_thumbnail_id(), array(1280,420));
			$sf_image = $sf_image[0];
		?>
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

<section class="uk-block">
	<div class="uk-container uk-container-narrow uk-container-center">
		<?php the_content();?>
	</div>
</section>		

	<?php endwhile; ?>
<?php endif; ?>


<?php
get_footer();
