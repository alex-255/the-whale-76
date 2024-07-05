<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
    <img src="<?php echo esc_url($thumbnail_url); ?>" class="thumbnail-image d-block w-100" alt="<?php the_title(); ?>">

    <?php
					}
				?>
    <div class="row">
        <div class="col-12 col-lg-9">
            <main id="primary">


                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
			

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle"><< ' . esc_html__( 'Previous:', 'the-whale-76' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'the-whale-76' ) . '</span> <span class="nav-title">%title >></span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>

            </main><!-- #main -->
        </div>
        <div class="col-12 col-lg-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>


<?php
endwhile;
get_footer();