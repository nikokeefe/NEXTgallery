<?php
/**
 * Template part preventing hero image displaying on a single page.
 *
 *
 */

if ( post_password_required() || is_attachment() ) {
	return;
}

if ( 'post' !== get_post_type() && ! has_post_thumbnail() || 'post' === get_post_type() && ! shoreditch_has_post_thumbnail() ) {
	return;
}
?>
