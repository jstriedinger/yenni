<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */
$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();
$context['post'] = new Timber\Post();
$context["categories"] = get_categories();
$templates = array( 'frontpage.twig' );

$context['title'] = "Categorías";
$args = array (
    'post_type'              => 'book',
    'posts_per_page' => '3'

);
$args['meta_query'] =  array(array('key' => 'popular','compare' => '==','value' => '1'));
    
$context['books'] = Timber::get_posts( $args );

Timber::render( $templates, $context );
