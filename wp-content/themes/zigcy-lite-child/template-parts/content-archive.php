<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zigcy Lite
 */


 $excerpt_length = get_theme_mod('sml_archive_post_excerpts',600);

if( !has_post_thumbnail() ){
$th_class = 'no-thumb';
}
else{
$th_class = ' ';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="sml-blog-wrapp <?php echo esc_attr($th_class);?>">
		<div class="sml-blog-ct">
			<?php zigcy_lite_post_thumbnail(); ?>
		</div>
		<div class="sml-blog-ct-main-wp">
			<div class="post-meta-wrapp">
			<?php  do_action('zigcy_lite_post_meta');?>
				<?php zigcy_lite_post_author(); ?>	
				<?php zigcy_lite_comment_count(); ?>	
			</div>
		
			<div class="content-wrapp-outer">
				<div class="content-wrapp-inner">
					<header class="entry-header">
						<?php  
							do_action('zigcy_lite_post_cat_or_tag_lists'); 
						the_title( '<h1 class="entry-title"><a href="'.get_the_permalink().'">', '</a></h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php
							echo zigcy_lite_get_excerpt_content();
							//echo zigcy_lite_get_excerpt_content(absint($excerpt_length)); // WPCS: XSS OK.	?>
							<div class="sm-read-more">
								<a href="<?php the_permalink(); ?>">
									<span class="normal"></span>
									<span class="hover"></span>
									<span class="btn-normal">
										<span class="btn-label">Đọc tiếp</span>
									</span>
									<span class="btn-hover">
										<span class="btn-label">Đọc tiếp</span>
									</span>
								</a>
							</div>
					</div><!-- .entry-content -->
				</div><!-- .content-wrapp-inner -->
			</div>
		</div><!-- .content-wrapp-outer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
