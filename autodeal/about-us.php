<?php
/**
 * The main template file
 * Template Name: About Us
 * @package WordPress
 * @subpackage autodeal
 */


get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<?php $sidebar_layout = get_theme_mod( 'autodeal_sidebar_page_layout','left');
	    if($sidebar_layout == 'left'){ ?>
	        <div class="row">
	          	<div class="col-md-2 col-sm-2" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
	          	<div class="col-md-6 col-sm-6" style="border-right: 1px dotted #333; border-left: 1px dotted #333; padding-right: 25px; padding-left: 25px;">
	           		<?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						endwhile; // End of the loop.
					?>
				  </div>
				  <div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
	        </div>
	        <div class="clearfix"></div>
	    <?php }else if($sidebar_layout == 'right'){ ?>
	        <div class="row">
	          	<div class="col-md-2 col-sm-2" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
	          	<div class="col-md-6 col-sm-6" style="border-right: 1px dotted #333; border-left: 1px dotted #333; padding-right: 25px; padding-left: 25px;">
	           		<?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						endwhile; // End of the loop.
					?>
				  </div>
				  <div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
	        </div>
	    <?php }else if($sidebar_layout == 'full'){ ?>
	        <div class="full">
	            <?php while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					endwhile; // End of the loop.
				?>
	      	</div>
		<?php }?>
	</div>
</div>

<?php get_footer();