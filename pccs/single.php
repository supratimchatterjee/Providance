<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PCCS
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php $author_id = $post->post_author; ?>

	<div class="uk-slidenav-position site-banner" data-uk-slideshow="{autoplay:true,animation:'scale'}">
	<ul class="uk-slideshow">
		<li>
		   <?php
		$sf_image  = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		$sf_image = $sf_image[0];
			?>
			<div class="uk-cover-background uk-position-relative" style="background-image: url('<?php echo $sf_image;?>');" data-uk-parallax="{bg: '-200'}">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-bottom uk-text-center">
					<div class="site-banner-caption">
						<h3><?php the_title();?></h3>
						<p>Written by <?php the_author();?> on <?php the_time('F jS') ?></p>
						<hr class="uk-visible-small transparent-line">
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>

<?php get_template_part( 'defult', 'breadcrumbs' ); ?>

<div class="uk-block uk-block-large">
	<section class="uk-container uk-container-narrow uk-container-center uk-post-content">
		<div class="uk-grid" data-uk-margin="{cls:'uk-margin-large-top'}">
			<div class="uk-width-medium-7-10">
				<?php the_content();?>
			</div>

			<div class="uk-width-medium-3-10">
				<?php $args = array( 'post_type' => 'staff', 'post_per_page' => -1,'meta_query'=> array( array( 'key' => '_user', 'value' => $author_id ) ) ); ?>
				<?php $my_query = new WP_Query( $args ); ?>
				<?php if ( $my_query->have_posts() ) : ?>
				<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
			
				<a href="<?php echo get_permalink( $my_query->post->id);?>">
					<div class="uk-grid uk-grid-collapse uk-margin-large-bottom" data-uk-grid-match >
						<div class="uk-width-3-10 uk-width-medium-1-1">				
							<figure class="uk-overlay staff-block custom-figure">
								<?php echo get_the_post_thumbnail($my_query->post->id, array(480,480));?>
								<figcaption class="uk-overlay-panel uk-flex uk-flex-bottom uk-overlay-background uk-text-center uk-padding-remove uk-text-center">
									<div class="uk-hidden-small">
										<h3 class="uk-margin-bottom-remove"><?php echo get_the_title( $my_query->post->id);?></h3>
										<span class="uk-margin-bottom uk-display-block">
											<?php the_field('_possition',$post->ID);?>
										</span>
									</div>							
								</figcaption>
							</figure>
						</div>
						<div class="uk-width-7-10 uk-width-medium-1-1">
							<div class="uk-panel staff-info">
								<p><?php  $query_content = get_the_content($my_query->post->id);?>
									<?php echo wp_trim_words( $query_content, 20, '..' ); ?>
								</p>
							</div>
						</div>
					</div>
				</a>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				<div class="authors-article uk-margin-large-top">
					<article class="uk-article">
						<h4 class="uk-article-title custom-article">Mark's Latest Articles</h4>
						<ul class="uk-article-lead uk-padding-remove">
						<?php $user = get_field('_user',$post->ID);?>
						<?php $args = array(
							'author'        =>  $user['ID'],  // I could also use $user_ID, right?
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type'		=> 'post'
							); ?>
							
						<?php $my_query = new WP_Query( $args ); ?>
						<?php if ( $my_query->have_posts() ) : ?>
							<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						   <li><a href="<?php echo get_permalink( $my_query->post->id);?>"><?php echo get_the_title( $my_query->post->id);?></a></li>
						  <?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<?php endif; ?>  
						</ul>
					</article>
					
				</div>
			</div>
		</div>
	</section>
</div>
<?php endwhile;?>
<?php endif;?>
<?php
get_footer();
