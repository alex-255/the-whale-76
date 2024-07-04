<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Whale_76
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="<?php echo (get_bloginfo( "description" )) ? esc_html(get_bloginfo( "description" )) : "One more website on WordPress."; ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="site-header-wrapper">
        <header class="site-header container">
            <div class="site-branding">
                <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                if ( is_front_page() && is_home() ) :
                    ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
                else :
                    ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                endif;
            }
			
			
			$the_whale_76_description = get_bloginfo( 'description', 'display' );
			if ( $the_whale_76_description || is_customize_preview() ) :
				?>
                <p class="site-description">
                    <?php echo $the_whale_76_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="main-navigation">
                <button id="button-toggle"><i class="bi bi-list"></i></button>
                <div id="main-menu">
                    <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
			    ?>
                </div>

            </nav><!-- #site-navigation -->
        </header>
    </div>