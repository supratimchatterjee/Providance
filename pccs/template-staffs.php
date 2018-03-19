<?php
/**
 * Template Name: Staffs
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
	<?php
		$sf_image  = wp_get_attachment_image_src(get_post_thumbnail_id(), array(1280,420));
		$sf_image = $sf_image[0];
	?>
		<li>
			<div class="uk-cover-background uk-position-relative" <?php if($sf_image):?>style="background-image: url('<?php echo $sf_image;?>');" <?php endif;?>  style="background-image: url('http://pccschool.wpengine.com/wp-content/uploads/2016/04/1280x420.jpg');" data-uk-parallax="{bg: '-200'}">
				<div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
					<div class="site-banner-caption">
						<h3><?php the_field('_banner_caption');?></h3>
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

<section class="uk-block staff-sortable">
	<div class="uk-container uk-container-narrow uk-container-center">
		<div class="uk-margin-large-bottom">
			<ul id="staff-filters" class="uk-tab" data-uk-tab>
				<li data-uk-filter="" class="uk-active"><a href="#">All People</a></li>
				<?php $terms = get_terms( 'department' ); ?>
				<?php foreach ($terms as $term) : ?>
				<li><a class="" href="#" data-uk-filter="<?php echo $term->slug;?>"><?php echo $term->name;?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-3" data-uk-grid="{ gutter: 35, controls: '#staff-filters', animation: false}">
				
			<?php add_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>
			<?php $the_query = new WP_Query( array('posts_per_page' => -1,'post_type' => 'staff' )); ?>
			<?php if( $the_query->have_posts() ): ?>

				<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php $post_terms = wp_get_post_terms($the_query->post->ID, 'department', array("fields" => "all")); ?>
					<?php $isotope_class = ''; ?>
					<?php foreach ($post_terms as $post_term) : ?>
						<?php $isotope_class .= ',' . $post_term->slug; ?>
					<?php endforeach; ?>
					<div data-uk-filter="<?php echo ltrim($isotope_class, ','); ?>">
						<figure class="uk-overlay staff-block">
						<?php if(has_post_thumbnail()) : ?>
							<?php the_post_thumbnail(array(260,375));?>
						<?php else :?>
							<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=Placeholder&w=260&h=375">
						<?php endif;?>
							<figcaption class="uk-overlay-panel uk-overlay-background uk-text-center uk-flex uk-flex-bottom">
								<div>
									<h3 class="uk-h5"><?php the_title();?></h3>
									<span class="">
										<?php the_field('_possition');?>
									</span>							
								</div>
							</figcaption>
							<a class="uk-position-cover" href="<?php the_permalink();?>"></a>
						</figure>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		  <?php wp_reset_query(); ?>
		  <?php remove_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>		 
		</div>		
	</div>	
</section>
 <?php endwhile;?>
 <?php endif;?>

<?php get_footer();