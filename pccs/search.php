<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package PCCS
 */

get_header(); ?>

<div class="uk-slidenav-position site-banner" data-uk-slideshow="{autoplay:true,animation:'scale'}">
	<ul class="uk-slideshow">
		<li>
			<?php $banner_image= get_field('_banner_image','option'); ?>
			<?php $sf_image  = wp_get_attachment_image_src($banner_image, 'full'); ?>
			<div class="uk-cover-background uk-position-relative" style="background-image: url('<?php echo $sf_image[0];?>');" data-uk-parallax="{bg: '-200'}">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
					<div class="site-banner-caption">
						<h3><?php _e('Search Results for','pccs');?> <strong>"<?php the_search_query(); ?>"</strong> <?php $total_results = $wp_query->found_posts; echo ": " .$total_results. " "; ?></h3>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<?php get_template_part( 'defult', 'breadcrumbs' ); ?>
<div class="uk-block-large">
	<section class="uk-container uk-container-narrow uk-container-center uk-post-content">
		<div class="uk-grid">
			<div class="uk-width-medium-2-3">
				<div class="blog-article">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<article class="uk-article">
						<h5 class="uk-article-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
						<p class="uk-article-meta">Written by <a href="<?php the_permalink();?>"><?php the_author();?></a> on 
							<span><?php the_time('F jS') ?></span>
						</p>
						<div class="uk-article-lead">
							<?php the_excerpt(); ?>
						</div>
					</article>
					<?php endwhile; ?>
				<?php endif; ?>
				</div>
				<?php wp_pagenavi(); ?>
				<hr class="uk-visible-small transparent-line">
			</div>
			<div class="uk-width-medium-1-3 site-sidebar">
				<?php dynamic_sidebar( 'sidebar-blog-index' ); ?>
			</div>
		</div>
	</section>
</div>
<?php
get_footer();