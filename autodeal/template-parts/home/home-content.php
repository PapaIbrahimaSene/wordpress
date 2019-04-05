<?php
/**
 * Template part for displaying home page content
 *
 * @package WordPress
 * @subpackage autodeal
 */

?>

<div id="main-content" class="container">
<?php query_posts(); ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
 			<h2>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
		<div class="entry"><?php the_content(); ?></div>
		</div>
<?php endwhile; ?>
<?php
  global $withcomments; $withcomments = true;
  comments_template( '', false );
?>
</div>