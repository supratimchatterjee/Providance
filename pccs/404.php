<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package PCCS
 */

get_header(); ?>

	
<div class="uk-slidenav-position site-banner" data-uk-slideshow="{autoplay:true,animation:'scale'}">
        <ul class="uk-slideshow">
            <li>
               <?php
             $banner_image= get_field('_banner_image','option');  
            $sf_image  = wp_get_attachment_image_src($banner_image, 'full');
            $sf_image = $sf_image[0];
            ?>
                <div class="uk-cover-background uk-position-relative" style="background-image: url('<?php echo $sf_image;?>');" data-uk-parallax="{bg: '-200'}">
                    <div class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-center uk-flex-middle uk-text-center">
                        <div class="site-banner-caption">
                            <h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'pccs' ); ?></h3>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
</div>
				


<div class="uk-block-large">
	<section class="uk-container uk-container-narrow uk-container-center uk-post-content">
		<div class="uk-grid">
				
					<p class="uk-article-lead"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'pccs' ); ?></p>

					<p><?php get_search_form();?></p>
				
		</div>
	</section>
</div>
		

<?php
get_footer();
