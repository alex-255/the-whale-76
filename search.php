<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package The_Whale_76
 */

get_header();
?>

<main id="primary" class="site-main container">


    <div class="row">
        <div class="col-12 col-lg-9">
            <?php if ( have_posts() ) : ?>
            <header class="page-header">

                <h1 class="page-title">
                    <?php
					
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'the-whale-76' ), '<span>' . get_search_query() . '</span>' );
					?>
                </h1>
                <div><?php get_search_form(); ?></div>
            </header><!-- .page-header -->

            <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				?>
            <div class="entry-content">
                <div class="row">
                    <?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(),'blog_image'); ?>
                    <div class="col-12 <?php echo ($thumbnail_url) ? "col-lg-8" : "" ; ?> order-2 order-lg-1">
                        <header class="entry-header">
                            <?php
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
							?>
                        </header><!-- .entry-header -->
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
                                src="<?php echo esc_url($thumbnail_url); ?>" class="thumbnail-image d-block w-100"
                                alt="<?php the_title(); ?>"></a>
                        <?php
								}
								?>
                    </div>


                </div>

            </div><!-- .entry-content -->

            <?php 
			endwhile;

			the_posts_navigation();

			endif;
			?>
        </div>
        <div class="col-12 col-lg-3">
            <?php get_sidebar(); ?>
        </div>
    </div>


</main><!-- #main -->

<?php

get_footer();