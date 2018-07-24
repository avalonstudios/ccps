<?php
/**
 * Template Name: Contact Page
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

	<div id="primary" class="content-area no-sidebar">
		<main id="main" class="site-main">
			<!--Section: Contact v.1-->
			<section class="contact-form section pb-5 mt-5">
				<div class="container-fluid">

					<div class="row"> 

					    <!--Grid column-->
						<div class="col-lg-5 mb-4"> 
							<?php
							$contactForm = get_field( 'contact_form' );
							echo do_shortcode( "[contact-form-7 id='{$contactForm}' title='Main Contact Form']" );
							?>
						</div>

						<!--Grid column-->
						<div class="col-lg-7">

							<!--Google map-->
							<div id="map-container-7" class="z-depth-1-half map-container" style="height: 400px">
								<div class="gmap">
									<?php
									$map = get_field( 'map_embed', 'option' );
									echo $map;
									?>
								</div>
							</div>
							<br>
							<!--Buttons-->
							<div class="row text-center">
								<div class="col-md-4">
									<div class="btn-floating green accent-3"><i class="fa fa-map-marker"></i></div>
									<?php
									$address = get_field( 'address', 'option' );
									?>
									<address><?php echo $address; ?></address>
								</div>
								<div class="col-md-4">
									<div class="btn-floating green accent-3"><i class="fa fa-phone"></i></div>
									<?php
									if ( have_rows( 'telephone_numbers', 'option' ) ) {
										while ( have_rows( 'telephone_numbers', 'option' ) ) { the_row();
											$tel = get_sub_field( 'number' );
											$telFix = preg_replace( '/[^0-9\+]/', '', $tel );
											$tel ? printf( '<div class="col-12"><a href="tel:%2$s">%1$s</a></div>', $tel, $telFix ) : '';
											?>
										<?php
										}
									}
									?>
								</div>
								<div class="col-md-4">
									<div class="btn-floating green accent-3"><i class="fa fa-envelope"></i></div>
									<?php
									if ( have_rows( 'email_addresses', 'option' ) ) {
										while ( have_rows( 'email_addresses', 'option' ) ) { the_row();
											$email = get_sub_field( 'email_address' );
											$email ? printf( '<div class="col-12"><a href="mailto:%1$s">%1$s</a></div>', $email ) : '';
											?>
										<?php
										}
									}
									?>
								</div>
							</div>
						</div>
						<!--Grid column-->

					</div>

				</div>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();