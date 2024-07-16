<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Whale_76
 */

get_header();
?>

<?php 
    // The Query.
    $the_query = new WP_Query( array( 
        'post_type' => 'slider',
        'posts_per_page' => -1,
        'order' => 'ASC'
    ) );
    
    if ( $the_query->have_posts() ): ?>
<div class="hero-section">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
                // The Loop.
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
            <button type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="<?php echo esc_attr($the_query->current_post); ?>"
                class="<?php echo ($the_query->current_post === 0) ? "active" : "" ; ?>"
                aria-current="<?php echo ($the_query->current_post === 0) ? "true" : "" ; ?>"
                aria-label="<?php the_title(); ?>"></button>
            <?php
                    }
                }
                // Restore original Post Data.
                wp_reset_postdata(); ?>
        </div>
        <?php 
                // The Query.
                $the_query = new WP_Query( array( 
                    'post_type' => 'slider',
                    'posts_per_page' => -1,
                    'order' => 'ASC'
                ) );?>

        <div class="carousel-inner">
            <?php
                // The Loop.
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
            <div class="carousel-item <?php echo ($the_query->current_post === 0) ? "active" : "" ; ?>">
                <img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(),'1536x1536') ); ?>"
                    class="d-block w-100" alt="<?php the_title(); ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="carousel-caption--title"><?php the_title(); ?></h5>
                    <p class="carousel-caption--content"><?php echo wp_trim_words(get_the_content(), 20, null); ?>
                    </p>
                </div>
            </div>
            <?php
                    }
                }
                // Restore original Post Data.
                wp_reset_postdata(); ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<?php endif; ?>

<div class="container site-main">
    <div class="row">
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
                            <?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(),'blog_image'); ?>
                            <div class="col-12 <?php echo ($thumbnail_url) ? "col-lg-8" : "" ; ?> order-2 order-lg-1">
                                <?php
							if ( is_singular() ) :
								the_content();
							else :
								echo '<p class="trimmed-text">';
								esc_html_e(wp_trim_words(get_the_content(), 40, null)) ;
								echo ' <a href="' . esc_url( get_permalink() ) . '" class="read-more-link">Read more...</a>';
								echo '</p>';
							endif;
							?>
                            </div>
                            <div class="col-12 <?php echo ($thumbnail_url) ? "col-lg-4" : "" ; ?> order-1 order-lg-2">
                                <?php 
								if ($thumbnail_url) {
									?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>"><img
                                        src="<?php echo esc_url( $thumbnail_url ); ?>" class="thumbnail-image d-block w-100"
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