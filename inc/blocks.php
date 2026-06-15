<?php 

/***
*** Blocks Theme Support ***
*** Usage: https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/ ***
***/

function blocks_theme_setup() {
    add_theme_support( 'align-wide'); // Image width support
    add_theme_support( 'align-full'); // Image width support
}
add_action( 'after_setup_theme', 'blocks_theme_setup' );

