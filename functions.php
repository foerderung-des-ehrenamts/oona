<?php

/**
 * Load the child theme styles.
 *
 * @since 0.1
 */

function oona_theme_styles() {
    
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() .'/style.css' , array('parent-style'));

}
add_action( 'wp_enqueue_scripts', 'oona_theme_styles' );

/**
 * Remove the archive-type in the title string
 *
 * @since 0.1
 * 
 * @link https://developer.wordpress.org/reference/functions/get_the_archive_title/
 */

function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        /* OONA $title = single_tag_title( '', false ); */
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );