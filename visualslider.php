<?php
/**
 * Plugin Name:  VisualSlider
 * Description:  Adds a Lightbox to the Block Editor Gallery and Image Block.
 * Author:       visualslider
 * Author URI:   https://profiles.wordpress.org/visualslider/
 * Version:      0.1
 */
namespace Engramium_Visual_Slider_Gallery_Block_Lightbox;

function engramium_visual_slider_lightbox_block_register_assets() {
	wp_register_script( 'engramium_vsdefaultgallerylightbox', plugin_dir_url( __FILE__ ) . 'dist/baguetteBox.min.js', [], '1.11.1', true );
	wp_add_inline_script( 'engramium_vsdefaultgallerylightbox', 'window.addEventListener("load", function() {var options={captions:function(t){var e=t.parentElement.getElementsByTagName("figcaption")[0];return!!e&&e.innerHTML},filter:/.+\.(gif|jpe?g|png|webp|svg)/i};baguetteBox.run(".wp-block-gallery",options);baguetteBox.run(".gallery",options);baguetteBox.run(".wp-block-image",options);});' );
	wp_register_style( 'engramium_vsdefaultgallerylightbox-css', plugin_dir_url( __FILE__ ) . 'dist/baguetteBox.min.css', [], '1.11.1' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\engramium_visual_slider_lightbox_block_register_assets' );

function engramium_vsdefaultgallerylightbox_enqueue_assets() {
	if ( has_block( 'gallery' ) || has_block( 'image' ) || get_post_gallery() ) {
		wp_enqueue_script( 'engramium_vsdefaultgallerylightbox' );
		wp_enqueue_style( 'engramium_vsdefaultgallerylightbox-css' );
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\engramium_vsdefaultgallerylightbox_enqueue_assets' );
