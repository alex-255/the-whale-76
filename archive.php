<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Whale_76
 */

get_header();
?>



<div class="container site-main">
    <div class="row">
        <div class="col-12">
            <header class="page-header">
                <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
            </header><!-- .page-header -->
        </div>
        <div class="col-12 col-lg-9">
            <main id="primary">
                <?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
						?>
                    </header><!-- .entry-header -->



                    <div class="entry-content">
                        <div class="row">
                            <?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(),'small'); ?>
                            <div class="col-12 <?php echo ($thumbnail_url) ? "col-lg-8" : "" ; ?> order-2 order-lg-1">
                                <?php
								echo '<p class="trimmed-text">';
								esc_html_e(wp_trim_words(get_the_content(), 40, null)) ;
								echo ' <a href="' . esc_url( get_permalink() ) . '" class="read-more-link">Read more...</a>';
								echo '</p>';
							?>
                            </div>
                            <div class="col-12 <?php echo ($thumbnail_url) ? "col-lg-4" : "" ; ?> order-1 order-lg-2">
                                <?php 
								if ($thumbnail_url) {
									?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>"><img
                                        src="<?php esc_attr_e( $thumbnail_url ); ?>" class="d-block w-100"
                                        alt="<?php the_title(); ?>"></a>
                            </div>
                            <?php
								}
								?>

                        </div>

                    </div><!-- .entry-content -->

                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
			endwhile;

			the_posts_navigation();
		?>

            </main><!-- #main -->
        </div>
        <div class="col-12 col-lg-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>


<?php

get_footer();