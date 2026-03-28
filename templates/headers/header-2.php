	<?php
		$vitic_settings = vitic_global_settings();
		$cart_style = vitic_get_config('cart-style','popup');
		$show_minicart = (isset($vitic_settings['show-minicart']) && $vitic_settings['show-minicart']) ? ($vitic_settings['show-minicart']) : false;
		$show_compare = (isset($vitic_settings['show-compare']) && $vitic_settings['show-compare']) ? ($vitic_settings['show-compare']) : false;
		$enable_sticky_header = ( isset($vitic_settings['enable-sticky-header']) && $vitic_settings['enable-sticky-header'] ) ? ($vitic_settings['enable-sticky-header']) : false;
		$show_searchform = (isset($vitic_settings['show-searchform']) && $vitic_settings['show-searchform']) ? ($vitic_settings['show-searchform']) : false;
		$show_wishlist = (isset($vitic_settings['show-wishlist']) && $vitic_settings['show-wishlist']) ? ($vitic_settings['show-wishlist']) : false;
		$show_currency = (isset($vitic_settings['show-currency']) && $vitic_settings['show-currency']) ? ($vitic_settings['show-currency']) : false;
		$show_menutop = (isset($vitic_settings['show-menutop']) && $vitic_settings['show-menutop']) ? ($vitic_settings['show-menutop']) : false;
	?>
	<h1 class="bwp-title hide"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<header id='bwp-header' class="bwp-header header-v2">
		<?php if(isset($vitic_settings['show-header-top']) && $vitic_settings['show-header-top']){ ?>
		<div id="bwp-topbar" class="topbar-v1 hidden-sm hidden-xs">
			<div class="topbar-inner">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 topbar-left hidden-sm hidden-xs">
							<?php if( isset($vitic_settings['phone']) && $vitic_settings['phone'] ) : ?>
							<div class="phone">
								<span><?php echo esc_html__("Customer Services: ","vitic") ?></span>
								<a href="tel:<?php echo esc_html($vitic_settings['phone']); ?>"><?php echo esc_html($vitic_settings['phone']); ?></a>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 topbar-right">
							<?php if($show_wishlist && class_exists( 'YITH_WCWL' )){ ?>
							<div class="wishlist-box">
								<a href="<?php echo get_permalink( get_option('yith_wcwl_wishlist_page_id') ); ?>"><?php echo esc_html__("wishlist","vitic") ?></a>
							</div>
							<?php } ?>
							<?php if($show_currency){ ?>
								<?php if(is_active_sidebar('header-top-link-2')){ ?>
									<div class="block-top-link">
										<?php dynamic_sidebar( 'header-top-link-2' ); ?>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if(($show_minicart || $show_searchform || is_active_sidebar('top-link')) && class_exists( 'WooCommerce' ) ){ ?>
			<?php vitic_child_menu_mobile(true); ?>
			<div class="header-desktop">
				<div class='header-wrapper' data-sticky_header="<?php echo esc_attr($vitic_settings['enable-sticky-header']); ?>">
					<div class="container">
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 header-left content-header">
								<?php vitic_header_logo(); ?>
							</div>
							<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 header-right">
								<div class="header-search-form hidden-sm hidden-xs">
									<!-- Begin Search -->
									<?php if($show_searchform && class_exists( 'WooCommerce' )){ ?>
										<?php get_template_part( 'search-form' ); ?>
									<?php } ?>
									<!-- End Search -->
								</div>
								<div class="account">
									<?php if (is_user_logged_in()) { ?>
										<div><?php echo esc_html__('Hello', 'vitic')?></div>
										<a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>"><?php echo esc_html__('Sign Out', 'vitic')?></a>
									<?php }else{ ?>
										<div class="active-login">
											<div><?php echo esc_html__('Hello', 'vitic')?></div>
											<h2><?php echo esc_html__('Sign In', 'vitic')?></h2>
										</div>
									<?php } ?>
								</div>
								<?php if($show_minicart && class_exists( 'WooCommerce' )){ ?>
								<div class="vitic-topcart <?php echo esc_attr($cart_style); ?>">
									<?php get_template_part( 'woocommerce/minicart-ajax' ); ?>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div><!-- End header-wrapper -->
				<div class="header-bottom">
					<div class="container">
						<div class="content-header-bottom">
							<?php $class_vertical = vitic_dropdown_vertical_menu(); ?>
							<div class="header-vertical-menu">
								<div class="categories-vertical-menu hidden-sm hidden-xs <?php echo esc_attr($class_vertical); ?>"
									data-textmore="<?php echo esc_html__("Other","vitic"); ?>"
									data-textclose="<?php echo esc_html__("Close","vitic"); ?>"
									data-max_number_1530="<?php echo esc_attr(vitic_limit_verticalmenu()->max_number_1530); ?>"
									data-max_number_1200="<?php echo esc_attr(vitic_limit_verticalmenu()->max_number_1200); ?>"
									data-max_number_991="<?php echo esc_attr(vitic_limit_verticalmenu()->max_number_991); ?>">
									<?php echo vitic_vertical_menu(); ?>
								</div>
							</div>
							<div class="wpbingo-menu-mobile header-menu">
								<div class="header-menu-bg">
									<?php vitic_top_menu(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }else{ ?>
			<?php vitic_child_menu_mobile(); ?>
			<div class="header-desktop">
				<div class="header-normal">
					<div class='header-wrapper' data-sticky_header="<?php echo esc_attr($vitic_settings['enable-sticky-header']); ?>">
						<div class="container">
							<div class="row">
								<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 header-left">
									<?php vitic_header_logo(); ?>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-6 wpbingo-menu-mobile header-main">
									<div class="header-menu-bg">
										<?php vitic_top_menu(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php vitic_login_form(); ?>
	</header><!-- End #bwp-header -->
