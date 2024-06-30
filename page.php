<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Whale_76
 */

get_header();
?>

<div class="container site-main">
    <?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post(); ?>
    <?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>
    <?php 
					if ($thumbnail_url) {
						?>
    <img src="<?php esc_attr_e( $thumbnail_url ); ?>" class="thumbnail-image d-block w-100" alt="<?php the_title(); ?>">

    <?php
					}
				?>

    <main id="primary">
        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-whale-76' ),
				'after'  => '</div>',
			)
		);
		?>
            </div><!-- .entry-content -->

        </article><!-- #page-<?php the_ID(); ?> -->
    </main><!-- #main -->
</div>


<?php
endwhile;
get_footer();