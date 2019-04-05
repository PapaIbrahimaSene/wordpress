<?php
/**
 * The template for displaying all pages
 * Template Name: List All Posts
 * @package WordPress
 * @subpackage autodeal
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<?php $sidebar_layout = get_theme_mod( 'autodeal_sidebar_page_layout','right');
	    if($sidebar_layout == 'left'){ ?>
	        <div class="row">
	          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
	          	<div class="col-md-8 col-sm-8" style="border-right: 1px dotted #333; padding-right: 25px;">
				  <?php
					$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
					<?php if ( $wpb_all_query->have_posts() ) : ?>
					<ul>
						<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
						<li>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
					<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
	          	</div>
	        </div>
	        <div class="clearfix"></div>
	    <?php }else if($sidebar_layout == 'right'){ ?>
	        <div class="row">
	          	<div class="col-md-8 col-sm-8" style="border-right: 1px dotted #333; padding-right: 25px;">
				  <?php
					$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
					<?php if ( $wpb_all_query->have_posts() ) : ?>
					<ul>
						<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
						<li>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
					<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
	          	</div>
	          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
	        </div>
	    <?php }else if($sidebar_layout == 'full'){ ?>
	        <div class="full">
			<?php
					$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
					<?php if ( $wpb_all_query->have_posts() ) : ?>
					<ul>
						<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
						<li>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
					<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
	      	</div>
		<?php }?>
	</div>
</div>

<?php get_footer();