<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Whale_76
 */

?>

<footer class="site-footer">
    <div class="site-info container">
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'the-whale-76' ) ); ?>">
            <?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'the-whale-76' ), 'WordPress' );
				?>
        </a>
        <span class="sep"> | </span>
        <?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'the-whale-76' ), '"The Whale 76"', 'Alexander Curiousotti' );
				?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>