<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PCCS
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php /*?><aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<?php */?>
            	<div class="uk-panel uk-panel-box widget">
					<h6>sign up for our email newsletter</h6>
					<div class="uk-form">
						<?php echo do_shortcode('[contact-form-7 id="167" title="Contact form 1"]'); ?>
					</div>
				</div>


				<div class="uk-panel uk-panel-box widget">
					<h6>ALL CATEGORY</h6>
					<ul>
					    <li><a href="#">CATEGORY 1</a></li>
					    <li><a href="#">CATEGORY 2</a></li>
					    <li><a href="#">CATEGORY 3</a></li>
					    <li><a href="#">CATEGORY 4</a></li>
					</ul>
				</div>