<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Hooks
 *
 *
 * TABLE OF CONTENTS
 *
 * - head()
 * - top()
 * - header_before()
 * - header_inside()
 * - header_after()
 * - nav_before()
 * - nav_inside()
 * - nav_after()
 * - content_before()
 * - cotnent_after()
 * - main_before()
 * - main_after()
 * - post_before()
 * - post_after()
 * - post_inside_before()
 * - post_inside_after()
 * - loop_before()
 * - loop_after()
 * - sidebar_before()
 * - sidebar_inside_before()
 * - sidebar_inside_after()
 * - sidebar_after()
 * - footer_top()
 * - footer_before()
 * - footer_inside()
 * - footer_after()
 * - foot()
 *
 * - do_atomic()
 * - apply_atomic()
 * - get_query_context()
 */

// header.php
function head() { do_atomic( 'head' ); }
function top() { do_atomic( 'top' ); }
function header_before() { do_atomic( 'header_before' ); }
function header_inside() { do_atomic( 'header_inside' ); }
function header_after() { do_atomic( 'header_after' ); }
function nav_before() { do_atomic( 'nav_before' ); }
function nav_inside() { do_atomic( 'nav_inside' ); }
function nav_after() { do_atomic( 'nav_after' ); }

// Template files: 404, archive, single, page, sidebar, index, search
function content_before() { do_atomic( 'content_before' ); }
function content_after() { do_atomic( 'content_after' ); }
function main_before() { do_atomic( 'main_before' ); }
function main_after() { do_atomic( 'main_after' ); }
function post_before() { do_atomic( 'post_before' ); }
function post_after() { do_atomic( 'post_after' ); }
function post_inside_before() { do_atomic( 'post_inside_before' ); }
function post_inside_after() { do_atomic( 'post_inside_after' ); }
function page_before() { do_atomic( 'post_before_singular-page' ); }
function page_after() { do_atomic( 'post_after_singular-page' ); }
function page_inside_before() { do_atomic( 'post_inside_before_singular-page' ); }
function page_inside_after() { do_atomic( 'post_inside_after_singular-page' ); }
function loop_before() { do_atomic( 'loop_before' ); }
function loop_after() { do_atomic( 'loop_after' ); }

// Sidebar
function sidebar_before() { do_atomic( 'sidebar_before' ); }
function sidebar_inside_before() { do_atomic( 'sidebar_inside_before' ); }
function sidebar_inside_after() { do_atomic( 'sidebar_inside_after' ); }
function sidebar_after() { do_atomic( 'sidebar_after' ); }

// footer.php
function footer_top() { do_atomic( 'footer_top' ); }
function footer_before() { do_atomic( 'footer_before' ); }
function footer_inside() { do_atomic( 'footer_inside' ); }
function footer_after() { do_atomic( 'footer_after' ); }
function foot() { do_atomic( 'foot' ); }

if ( ! function_exists( 'do_atomic' ) ) {
/**
 * do_atomic()
 *
 * Adds contextual action hooks to the theme.  This allows users to easily add context-based content
 * without having to know how to use WordPress conditional tags.  The theme handles the logic.
 *
 * An example of a basic hook would be 'head'.  The do_atomic() function extends that to
 * give extra hooks such as 'head_home', 'head_singular', and 'head_singular-page'.
 *
 * Major props to Ptah Dunbar for the do_atomic() function.
 * @link http://ptahdunbar.com/wordpress/smarter-hooks-context-sensitive-hooks
 *
 * @since 3.9.0
 * @uses get_query_context() Gets the context of the current page.
 * @param string $tag Usually the location of the hook but defines what the base hook is.
 */
function do_atomic( $tag = '', $args = '' ) {
	if ( !$tag ) return false;

	/* Do actions on the basic hook. */
	do_action( $tag, $args );
	/* Loop through context array and fire actions on a contextual scale. */
	foreach ( (array) get_query_context() as $context )
		do_action( "{$tag}_{$context}", $args );
} // End do_atomic()
}

if ( ! function_exists( 'apply_atomic' ) ) {
/**
 * apply_atomic()
 *
 * Adds contextual filter hooks to the theme.  This allows users to easily filter context-based content
 * without having to know how to use WordPress conditional tags. The theme handles the logic.
 *
 * An example of a basic hook would be 'entry_meta'.  The apply_atomic() function extends
 * that to give extra hooks such as 'entry_meta_home', 'entry_meta_singular' and 'entry_meta_singular-page'.
 *
 */
function apply_atomic( $tag = '', $value = '' ) {
	if ( ! $tag ) return false;
	/* Get theme prefix. */
	/* Apply filters on the basic hook. */
	$value = apply_filters( "{$tag}", $value );
	/* Loop through context array and apply filters on a contextual scale. */
	foreach ( (array)get_query_context() as $context )
		$value = apply_filters( "{$context}_{$tag}", $value );
	/* Return the final value once all filters have been applied. */
	return $value;
} // End apply_atomic()
}

if ( ! function_exists( 'get_query_context' ) ) {
/**
 * get_query_context()
 *
 * Retrieve the context of the queried template.
 *
 * @since 3.9.0
 * @return array $query_context
 */
function get_query_context() {
	global $wp_query, $query_context;

	/* If $query_context->context has been set, don't run through the conditionals again. Just return the variable. */
	if ( is_object( $query_context ) && isset( $query_context->context ) && is_array( $query_context->context ) ) {
		return $query_context->context;
	}

	unset( $query_context );
	$query_context = new stdClass();
	$query_context->context = array();

	/* Front page of the site. */
	if ( is_front_page() ) {
		$query_context->context[] = 'home';
	}

	/* Blog page. */
	if ( is_home() && ! is_front_page() ) {
		$query_context->context[] = 'blog';

	/* Singular views. */
	} elseif ( is_singular() ) {
		$query_context->context[] = 'singular';
		$query_context->context[] = "singular-{$wp_query->post->post_type}";

		/* Page Templates. */
		if ( is_page_template() ) {
			$to_skip = array( 'page', 'post' );

			$page_template = basename( get_page_template() );
			$page_template = str_replace( '.php', '', $page_template );
			$page_template = str_replace( '.', '-', $page_template );

			if ( $page_template && ! in_array( $page_template, $to_skip ) ) {
				$query_context->context[] = $page_template;
			}
		}

		$query_context->context[] = "singular-{$wp_query->post->post_type}-{$wp_query->post->ID}";
	}

	/* Archive views. */
	elseif ( is_archive() ) {
		$query_context->context[] = 'archive';

		/* Taxonomy archives. */
		if ( is_tax() || is_category() || is_tag() ) {
			$term = $wp_query->get_queried_object();
			$query_context->context[] = 'taxonomy';
			$query_context->context[] = $term->taxonomy;
			$query_context->context[] = "{$term->taxonomy}-" . sanitize_html_class( $term->slug, $term->term_id );
		}

		/* User/author archives. */
		elseif ( is_author() ) {
			$query_context->context[] = 'user';
			$query_context->context[] = 'user-' . sanitize_html_class( get_the_author_meta( 'user_nicename', get_query_var( 'author' ) ), $wp_query->get_queried_object_id() );
		}

		/* Time/Date archives. */
		else {
			if ( is_date() ) {
				$query_context->context[] = 'date';
				if ( is_year() )
					$query_context->context[] = 'year';
				if ( is_month() )
					$query_context->context[] = 'month';
				if ( get_query_var( 'w' ) )
					$query_context->context[] = 'week';
				if ( is_day() )
					$query_context->context[] = 'day';
			}
			if ( is_time() ) {
				$query_context->context[] = 'time';
				if ( get_query_var( 'hour' ) )
					$query_context->context[] = 'hour';
				if ( get_query_var( 'minute' ) )
					$query_context->context[] = 'minute';
			}
		}
	}

	/* Search results. */
	elseif ( is_search() ) {
		$query_context->context[] = 'search';
	/* Error 404 pages. */
	} elseif ( is_404() ) {
		$query_context->context[] = 'error-404';
	}

	return $query_context->context;
} // End get_query_context()
}
?>