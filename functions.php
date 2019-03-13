<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

function generatepress_child_enqueue_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'generatepress-rtl', trailingslashit( get_template_directory_uri() ) . 'rtl.css' );
	}

	wp_enqueue_script( 'functions', get_stylesheet_directory_uri() . '/js/functions.js', [ 'jquery' ], false, true );

}

add_action( 'wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100 );

/**
 * Set default Color Swatch based on PRESENCE.swiss colors.
 */
function hpabc_default_color_swatch() {
	return [
		'#000000',
		'#FFFFFF',
		'#f18811',
		'#f7a824',
		'#fac878',
		'#4f5d83',
		'#888caa',
		'#cbcbda',
	];
}

add_filter( 'generate_default_color_palettes', 'hpabc_default_color_swatch' );

/**
 * Removes default schema.org stuff added.
 * Note: We use WP Schema Pro plugin for this stuff.
 */
add_filter( 'generate_schema_type', '__return_false' );

/**
 * Use foreground updating for github updater.
 */
add_filter( 'github_updater_disable_wpcron', '__return_true' );

/**
 * Add support for custom color palettes in Gutenberg.
 */
/* function generate_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'White', 'generatepress-child' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__( 'Light Blue', 'generatepress-child' ),
				'slug' => 'light-blue',
				'color' => '#00A0E9',
			),
			array(
				'name'  => esc_html__( 'Dark Grey', 'generatepress-child' ),
				'slug' => 'dark-grey',
				'color' => '#3a3a3a',
			),
		)
	);
}
add_action( 'after_setup_theme', 'generate_gutenberg_color_palette' ); */

/**
 * Default blocks for pages post type.
 *
 * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/block-api/block-templates/
 */
/* function generate_gutenberg_block_template() {
	$post_type_object = get_post_type_object( 'page' );
	$post_type_object->template =
	[
	 	['ghostkit/grid', ['columns' => '2'], [
			 ['ghostkit/grid-column', ['className' => 'ghostkit-col-md-12 ghostkit-col-7'], [
				 ['core/paragraph'],
				 ['core/list'],
				 ['core/heading', ['placeholder' => 'Preise']],
				 ['core/table', ['hasFixedLayout' => true, 'className' => 'is-style-stripes']],
				 ['core/button', ['className' => 'is-style-squared']],
			 ]],
			 ['ghostkit/grid-column', ['size' => 5, 'stickyContent' => true, 'stickyContentTop' => 100, 'stickyContentBottom' => 40, 'className' => 'ghostkit-col-md-12'], [
				 ['core/heading', ['placeholder' => 'Ihr Ansprechpartner']],
				 ['atomic-blocks/ab-profile-box', ['profileAlignment' => 'left', 'profileAvatarShape' => 'round']],
				 ['core/heading', ['placeholder' => 'Melden Sie sich bei uns']],
				 ['gravityforms/block', ['title' => false, 'description' => false]],
			 ]],
		]],
	];
}
add_action( 'init', 'generate_gutenberg_block_template' ); */


/**
 * Have Ultimate Addons for Gutenberg Post Layout (Grid) order posts by menu_order.
 * Should become an option in the gui with next release.
 * Code can be deleted then
 *
 * @see Mail from Brainstorm Force Mittwoch, 13. März, 05:35
 * */
add_filter( 'uagb_post_query_args_grid', function ( $args ) {

	$args['orderby'] = 'menu_order';
	return $args;

	} );