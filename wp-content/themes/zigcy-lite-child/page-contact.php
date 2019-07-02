<?php
/**
 * Template Name: Page Contact
 *  
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zigcy Lite
 */

get_header();
$page_sidebars = get_theme_mod('sml_single_page_layout_sidebars','right-sidebar-enabled');  

?>
	<div class="container">
		<div class="sml-page-wrap <?php echo esc_attr($page_sidebars); ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
                <div class="google_map_contact" data-stretch="full-stretch" >
					<?= do_shortcode('[siteorigin_widget class="SiteOrigin_Widget_GoogleMap_Widget"][/siteorigin_widget]');?>
				</div>
                    <div class="panel-grid panel-no-style">
                        <div id="pgc-211-1-0" class="panel-grid-cell">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            the_content();

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                        </div>
                        <div id="pgc-211-1-1" class="panel-grid-cell"> 
                                <?= do_shortcode('[contact-form-7 id="526" title="Form Liên Hệ"]'); ?>
                        </div>
                    </div>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php 
		 	// sidebar options
		    $page_sidebar_explode  =  (explode("-",$page_sidebars));
		    $page_sidebar          = $page_sidebar_explode[0];
		    if( $page_sidebar == 'both'){
		        get_sidebar('left');
		        get_sidebar('right');
		    }elseif( $page_sidebar != 'no'){
		        get_sidebar( $page_sidebar );
		    } ?>
		</div>
	</div>
<?php
//get_sidebar();
get_footer();
