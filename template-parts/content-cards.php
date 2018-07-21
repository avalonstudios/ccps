<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CCPS
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card-cascade wider reverse' ); ?>>
	<div class="view view-cascade overlay">
		<?php
		if ( has_post_thumbnail() ) {
			ccps_post_thumbnail( 'Blog_Images' );
		} else { ?>
			<img class="post-thumb logo" src="<?php echo get_template_directory_uri() . '/images/CCPS-Malta-Leaves.png' ?>" alt="">
			<span class="post-thumb title"><?php bloginfo( 'name' ); ?></span>
			<span class="post-thumb description mb-5"><?php bloginfo( 'description' ); ?></span>
		<?php
		}
		?>
		<a href="<?php the_permalink(); ?>">
			<div class="mask rgba-white-slight"></div>
		</a>
	</div>
	<div class="card-body card-body-cascade text-center">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="card-title mt-3">', '</h1>' );
		else :
			the_title( '<h2 class="card-title mt-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta mb-3">
				<?php
				ccps_posted_on();
				ccps_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<div class="card-text">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<a href="<?php the_permalink(); ?>" class="btn white-text">
			<p>Read more</p>
		</a>

	</div><!-- .card-body card-body-cascade text-center -->

</article><!-- #post-<?php the_ID(); ?> -->