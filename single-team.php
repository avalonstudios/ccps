<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CCPS
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header clearfix">
						<?php
						the_title( '<h1 class="entry-title">', '</h1>' );
						
						$designation = get_field( 'designation' );
						$designation ? printf( '<h4 class="float-left">%s</h4>', $designation ) : '';
						
						$linkedInUrl = get_field( 'url' );
						$linkedInUrl ? printf( '<a class="linkedin-team-member-link float-right" href="%s"></a>', $linkedInUrl ) : '';
						?>
					</header><!-- .entry-header -->


					<div class="entry-content">
						<?php the_post_thumbnail( '', array( 'class' => 'float-left mr-3' ) ); ?>
						<?php the_content(); ?>
						<?php if ( have_rows( 'membership_section' ) ) { ?>
							<div id="institutions" class="mx-auto w-50">
								<h6 class="mt-5 text-center"><?php the_title(); ?></h6>
								<?php while ( have_rows( 'membership_section' ) ) { the_row(); ?>
									<div class="institution-section row mt-5">
										<?php
										$sectionTitle = get_sub_field( 'section_title' );
										$membershipsCount = count( get_sub_field( 'memberships' ) );
										$divider = 12 / $membershipsCount; ?>
										<?php if ( $sectionTitle ) { ?>
										<p class="mb-5 text-center w-100"><?php echo $sectionTitle; ?></p>
										<?php } ?>
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
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
