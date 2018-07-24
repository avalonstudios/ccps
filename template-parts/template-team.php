<?php
/**
 * Template Name: Team Page
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

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title h1-responsive font-weight-bold text-center my-5"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;

				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'team' ),
					'posts_per_page'         => '9',
					'orderby'                => 'menu_order',
				);

				// The Query
				$query_team = new WP_Query( $args );

				// The Loop
				if ( $query_team->have_posts() ) {
					$numOfPeople = $query_team->post_count;
					if ( $numOfPeople > 3 ) {
						$numOfPeople = 3;
					 } ?>
					<!-- Section: Team v.4 -->
					<section class="my-5">
						<div class="row">
							<?php
							$i = 1;
							while ( $query_team->have_posts() ) {
								$query_team->the_post();
								$designation = get_field( 'designation' );
								$linkedInUrl = get_field( 'url' ); ?>
								<div class="col-lg-<?php echo 12 / $numOfPeople; ?> col-md-12 mb-lg-0 mb-4">
									<div class="card-wrapper">
										<div id="card-<?php echo $i; ?>" class="card-rotating effect__click text-center w-100 h-100">
											<div class="face front">
												<div class="card-up">
													<img class="card-img-top" src="<?php echo get_template_directory_uri() . '/images/CCPS-Malta-Leaves.png' ?>">
												</div>
												<?php if ( has_post_thumbnail() ) { ?>
												<div class="avatar mx-auto white">
													<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'rounded-circle img-fluid' ) ); ?>
												</div>
												<?php } ?>
												<div class="card-body">
													<a href="<?php the_permalink(); ?>"><h5 class="font-weight-bold mt-1 mb-3"><?php the_title(); ?></h5></a>
													<?php $designation ? printf( '<p class="font-weight-bold dark-grey-text">%s</p>', $designation ) : ''; ?>
													<!-- Triggering button -->
													<a class="rotate-btn grey-text" data-card="card-<?php echo $i; ?>"> <i class="fa fa-repeat grey-text"></i> Click here to rotate</a>
													<div class="mt-4">
														<a class="clearfix" href="<?php the_permalink(); ?>"><button class="btn">View Profile</button></a>
													</div>
												</div>
											</div>
											<div class="face back">
												<div class="card-body">
													<h5 class="font-weight-bold mt-4 mb-2"><?php the_title(); ?></h5>
													<?php $designation ? printf( '<p class="font-weight-bold dark-grey-text">%s</p>', $designation ) : ''; ?>
													<hr>
													<?php the_excerpt(); ?>
													<?php $linkedInUrl ? printf( '<a class="linkedin-team-member-link" href="%s"></a>', $linkedInUrl ) : ''; ?>
												</div>
												<!-- Triggering button --> 
												<a class="rotate-btn grey-text" data-card="card-<?php echo $i; ?>"> <i class="fa fa-repeat grey-text"></i> Click here to rotate back</a>
												<div class="mt-4">
													<a class="clearfix" href="<?php the_permalink(); ?>"><button class="btn">View Profile</button></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php
							$i++;
							} ?>
						</div>
					</section>
				<?php
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();
				?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
