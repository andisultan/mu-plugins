<?php
/**
 * Plugin Name: Customize Display Dashboard
 */

/**
 * Ganti Logo Login.
 */
add_action( 'login_head', function() {
	?>
	<style>
    .login #login h1 a {
      /* background-image: url(https://shellcreeper.com/blog/wp-content/uploads/2015/12/turtlepod.jpg); */
    }
	</style>
	<?php
} );

/**
 * Ganti login logo link ke homepage.
 */
add_filter( 'login_headerurl', function( $url ) {
	return esc_url( home_url() );
} );

/**
 * Ganti nama login logo.
 */
add_filter( 'login_headertext', function( $name ) {
	return esc_html( get_bloginfo( 'name' ) );
} );

/**
 * Hapus WordPress Logo di Admin Bar.
 */
add_action( 'wp_before_admin_bar_render', function () {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
} );

/**
 * Mengubah admin footer WordPress.
 */
add_filter( 'admin_footer_text', function () {
	return '<span id="footer-thankyou">' . get_bloginfo( 'name' ) . '</span>';
} );

/**
 * Hapus dashboard widget.
 */
add_action( 'wp_dashboard_setup', function() {
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
} );

/**
 * Hapus Help Tab.
 */
add_action( 'admin_head', function() {
	$current_screen = get_current_screen();
	$current_screen->remove_help_tabs();

	/**
	 * Hapus Menu Themes dan Theme Editor.
	 */
	remove_submenu_page( 'themes.php', 'themes.php' );
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'themes.php', 'theme_options' );
} );

/**
 * Hapus Menu Plugin Editor.
 */
add_action( 'admin_menu', function() {
	remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
} );

/**
 * Mengubah Pos menjadi Artikel.
 */
add_filter( 'post_type_labels_post', function( $labels ) {
	$labels->name = 'Article';
	$labels->singular_name = 'Article';
	$labels->all_items = 'All Article';
	$labels->menu_name = 'Blogs';
	$labels->name_admin_bar = 'Blogs';
	return $labels;
} );

