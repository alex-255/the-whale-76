<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package The_Whale_76
 */

get_header();
?>

<main id="" class="container">

    <section class="">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'the-whale-76' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'the-whale-76' ); ?>
            </p>

            <?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

            <div class="widget widget_categories">
                <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'the-whale-76' ); ?></h2>
                <ul>
                    <?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
                </ul>
            </div><!-- .widget -->

            <?php
					/* translators: %1$s: smiley */
					$the_whale_76_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'the-whale-76' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$the_whale_76_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

        </div><!-- .page-content -->
    </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();