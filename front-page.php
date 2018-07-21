<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CCPS
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ccps' ),
							'after'  => '</div>',
						) );
						?>
						<?php if ( have_rows( 'membership_section' ) ) { ?>
							<div id="institutions" class="mx-auto w-50">
								<h3 class="mt-5">Members of</h3>
								<?php while ( have_rows( 'membership_section' ) ) { the_row(); ?>
									<div class="institution-section row mt-5">
										<?php
										$membershipsCount = count(get_sub_field('memberships'));
										$divider = 12 / $membershipsCount; ?>
										<?php if ( have_rows( 'memberships' ) ) { ?>
											<?php while ( have_rows( 'memberships' ) ) { the_row(); ?>
												<?php
												$logoID = get_sub_field( 'logo' );
												$logo = wp_get_attachment_image_src( $logoID, 'full', false );
												$title = get_sub_field( 'institution_title' );
												$link = get_sub_field( 'link' );
												?>
												<div class="institution col-<?php echo $divider; ?>">
													<?php !empty( $link ) ? printf( '<a href="%s" rel="external" target="_blank">', $link['url'] ) : ''; ?>
														<img class="mx-auto d-block" title="<?php echo $title; ?>" src="<?php echo $logo[0]; ?>" alt="<?php echo $title; ?>">
													<?php !empty( $link['url'] ) ? printf( "</a>" ) : ''; ?>
												</div> <!-- .institution -->
											<?php } ?>
										<?php } ?>
									</div> <!-- .institution-section .row -->
								<?php } ?>
							</div> <!-- #institutions -->
						<?php } ?>
					</div><!-- .entry-content -->

					<?php if ( get_edit_post_link() ) : ?>
						<footer class="entry-footer">
							<?php
							edit_post_link(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Edit <span class="screen-reader-text">%s</span>', 'ccps' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								),
								'<span class="edit-link">',
								'</span>'
							);
							?>
						</footer><!-- .entry-footer -->
					<?php endif; ?>
				</article><!-- #post-<?php the_ID(); ?> -->
			<?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
