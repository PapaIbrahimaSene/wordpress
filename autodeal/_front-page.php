<?php
/**
 * The front page template file
 * @package WordPress
 * @subpackage autodeal
 */

get_header(); ?>

<?php get_template_part( 'template-parts/home/blog' ); ?>
<?php do_action( 'autodeal_after_blog' ); ?>

<?php get_template_part( 'template-parts/home/home-content' ); ?>
<?php do_action( 'autodeal_after_home_content' ); ?>

<?php get_footer();