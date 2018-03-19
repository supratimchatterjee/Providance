<?php
/**
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PCCS
 */

get_header(); ?>
<?php if ( have_posts() ) :?>
<?php  while ( have_posts() ) : the_post();?>
<div class="staff-banner inner-banner uk-block-muted">
	<div class="uk-cover-background uk-position-relative uk-banner-staff-page">
		<div class="uk-container uk-container-narrow uk-container-center">
			<div class="uk-grid uk-flex uk-flex-middle uk-flex-space-between">
				<div class="uk-width-small-2-10">
				</div>
				<div class="uk-width-small-5-10 uk-hidden-small">
					<div class="site-banner-caption uk-text-center">
						<h3 class="uk-margin-bottom-remove"><?php the_title();?></h3>
						<p class="uk-margin-top-remove"><?php the_field('_possition');?></p>
					</div>
				</div>
				<div class="uk-width-small-5-10 uk-visible-small">
					<div class="uk-overlay-panel uk-overlay-background uk-overlay-bottom">
						<div class="site-banner-caption uk-text-center">
							<h3 class="uk-margin-bottom-remove"><?php the_title();?></h3>
							<p class="uk-margin-top-remove"><?php the_field('_possition');?></p>
						</div>					
					</div>
				</div>
				<div class="uk-width-small-3-10 uk-text-right">
					<?php the_post_thumbnail(array(200,300));?>
				</div>
			</div>
		</div>		
	</div>
</div>
<?php get_template_part( 'defult', 'breadcrumbs' ); ?>
<?php $author_name = get_the_title(); ?>
<section class="uk-block uk-block-large">
	<div class="uk-container uk-container-narrow uk-container-center uk-staff-info">
		<?php the_content();?>
	</div>
</section>
<?php $user = get_field('_user'); ?>
<?php if ( $user ) :?>
<?php $args = array(
	'author'        =>  $user,  // I could also use $user_ID, right?
	'orderby'       =>  'post_date',
	'order'         =>  'ASC',
	'post_type'		=> 'post'
	); ?>
	
<?php $my_query = new WP_Query( $args ); ?>
<?php if ( $my_query->have_posts() ) : ?>
	<section class="uk-block uk-block-large uk-text-center uk-margin-top-remove">
		<div class="uk-container uk-container-narrow uk-container-center uk-more-info">
			<h4><?php echo $author_name; ?>'s Latest Articles</h4>
			<ul>
			<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<li><a href="<?php echo get_permalink( $my_query->post->id);?>"><?php echo get_the_title( $my_query->post->id);?></a></li>
			<?php endwhile; ?>
			</ul>
		</div>
	</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php endif;?>

<?php endwhile;?>
<?php endif;?>

<?php get_footer();