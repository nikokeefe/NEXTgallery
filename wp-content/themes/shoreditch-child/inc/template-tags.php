<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Shoreditch
 */

if ( ! function_exists( 'shoreditch_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories.
 */
function shoreditch_entry_meta() {
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'shoreditch' ) );
		if ( $categories_list && shoreditch_categorized_blog() ) {
			echo '<div class="entry-meta"><span class="cat-links">' . $categories_list . '</span></div>';
		}
	}
}
endif;

if ( ! function_exists( 'shoreditch_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time, tags and comments.
 */
function shoreditch_entry_footer() {
	if ( 'post' === get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'shoreditch' ) );
		if ( $tags_list && ! is_wp_error( $tags_list ) ) {
			echo '<span class="tags-links">' . $tags_list . '</span>';
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'shoreditch' ), esc_html__( '1 Comment', 'shoreditch' ), esc_html__( '% Comments', 'shoreditch' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'shoreditch' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
*
* Display post date
*
**/
function shoreditch_child_post_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string );

	if ( is_sticky() && ! is_single() ) {
		$posted_on = sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), esc_html__( 'Featured Post', 'shoreditch' ) );
	}

	echo '<span class="posted-on">' . $posted_on . '</span>';
}
