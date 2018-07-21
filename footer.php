<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CCPS
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="copyright">
				<a href="<?php echo esc_url( __( get_bloginfo( 'url' ), 'ccps' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Copyright &copy; %s %s', 'ccps' ), get_bloginfo( '/' ), date('Y') );
					?>
				</a>
			</div>
			<span class="sep"> | </span>
			<div class="designer">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Design by %s.', 'ccps' ), '<a target="_blank" href="https://avalonstudios.eu">Avalon Studios</a>' );
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
