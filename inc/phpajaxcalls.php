<?php
add_action( 'wp_ajax_nopriv_getCarouselImages', 'getCarouselImages' );
add_action( 'wp_ajax_getCarouselImages', 'getCarouselImages' );
function getCarouselImages() {
	$frontpage_id = get_option( 'page_on_front' );
	ob_start(); ?>
	<?php if ( have_rows( 'images', $frontpage_id ) ) { $i = 0; ?>
		<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
			<!--Indicators-->
			<ol class="carousel-indicators">
				<?php
				while ( Have_rows( 'images', $frontpage_id ) ) { the_row(); ?>
					<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" <?php echo $i == 0 ? 'active' : ''; ?>></li>
				<?php
				$i++;
				} ?>
			</ol>
			<!--/.Indicators-->
			<div class="carousel-inner" role="listbox">
				<?php
				$i = 0;
				while ( Have_rows( 'images', $frontpage_id ) ) { the_row(); ?>
					<?php
					$imageID = get_sub_field( 'image' );
					$title = get_sub_field( 'title' );
					$text = get_sub_field( 'text' );
					$link = get_sub_field( 'link' );
					$image = wp_get_attachment_image_src( $imageID, 'full' );
					$srcset = wp_get_attachment_image_srcset( $imageID );
					?>
					<div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
						<div class="view">
							<img src="<?php echo $image[0]; ?>" alt="">
						</div>
					</div>
				<?php
				$i++;
				} ?>
			</div>
		</div>
	<?php } ?>
	<?php
	echo ob_get_clean();
	die();
}