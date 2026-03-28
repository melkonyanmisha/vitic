<?php

// Mobile header with vertical menu on left, main menu toggle on right
function vitic_child_menu_mobile( $vertical = false ) {
    $vitic_settings  = vitic_global_settings();
    $cart_style      = vitic_get_config( 'cart-style', 'popup' );
    $show_searchform = ( isset( $vitic_settings['show-searchform'] ) && $vitic_settings['show-searchform'] ) ? $vitic_settings['show-searchform'] : false;
    $show_wishlist   = ( isset( $vitic_settings['show-wishlist'] ) && $vitic_settings['show-wishlist'] ) ? $vitic_settings['show-wishlist'] : false;
    $show_minicart   = ( isset( $vitic_settings['show-minicart'] ) && $vitic_settings['show-minicart'] ) ? $vitic_settings['show-minicart'] : false;
    ?>
    <div class="header-mobile">
        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
        <div class="header-mobile-fixed">
            <div class="shop-page">
                <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><i class="wpb-icon-shop"></i></a>
            </div>
            <div class="my-account">
                <a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>"><i class="wpb-icon-user"></i></a>
            </div>
            <?php if ( $show_searchform ) { ?>
            <div class="search-box">
                <div class="search-toggle"><i class="wpb-icon-magnifying-glass"></i></div>
            </div>
            <?php } ?>
            <?php if ( $show_wishlist && class_exists( 'YITH_WCWL' ) ) { ?>
            <div class="wishlist-box">
                <a href="<?php echo get_permalink( get_option( 'yith_wcwl_wishlist_page_id' ) ); ?>"><i class="wpb-icon-heart"></i></a>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <?php if ( $vertical || ( $show_minicart && class_exists( 'WooCommerce' ) ) ) { ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-left">
                    <?php if ( $vertical ) { vitic_navbar_vertical_menu(); } ?>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 header-center">
                    <?php vitic_header_logo(); ?>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-right">
                    <div class="navbar-header">
                        <button type="button" id="show-megamenu" class="navbar-toggle">
                            <span><?php echo esc_html__( 'Menu', 'vitic' ); ?></span>
                        </button>
                    </div>
                    <?php if ( $show_minicart && class_exists( 'WooCommerce' ) ) { ?>
                    <div class="vitic-topcart <?php echo esc_attr( $cart_style ); ?>">
                        <?php get_template_part( 'woocommerce/minicart-ajax' ); ?>
                    </div>
                    <?php } ?>
                </div>
                <?php } else { ?>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 header-left header-left-default">
                    <?php vitic_header_logo(); ?>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 header-right header-right-default">
                    <div class="navbar-header">
                        <button type="button" id="show-megamenu" class="navbar-toggle">
                            <span><?php echo esc_html__( 'Menu', 'vitic' ); ?></span>
                        </button>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
}

add_action('wp_enqueue_scripts', 'vitic_child_css', 1001);

// Load CSS
function vitic_child_css() {
    wp_deregister_style( 'styles-child' );
    wp_register_style( 'styles-child', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'styles-child' );

    wp_enqueue_style( 'vitic-child-custom', get_stylesheet_directory_uri() . '/custom.css', array( 'styles-child' ), '1.0' );
}