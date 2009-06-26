<?php
/*
Plugin Name: RSS Shortcode
Version: 0.1
Plugin URI: http://yoast.com/wordpress/rss-shortcode/
Description: Makes it easy to display an RSS feed on a page
Author: Joost de Valk
Author URI: http://yoast.com/
*/

function yoast_rss_shortcode( $atts ) {
	extract(shortcode_atts(array(  
	    "feed" 		=> '',  
		"num" 		=> '5',  
		"excerpt" 	=> true
	), $atts));
	require_once(ABSPATH.WPINC.'/rss.php');  
	if ( $feed != "" && $rss = fetch_rss( $feed ) ) {
		$content = '<ul>';
		if ( $num_items !== -1 ) {
			$rss->items = array_slice( $rss->items, 0, $num_items );
		}
		foreach ( (array) $rss->items as $item ) {
			$content .= '<li>';
			$content .= '<a href="'.esc_url( $item['link'] ).'">'.htmlentities( $item['title'] ).'</a>';
			if ( $excerpt ) {
				$content .= '<br/><span class="rss_excerpt">'.htmlentities( $item['summary'] ).'</span>';
			}
			$content .= '</li>';
		}
		$content .= '</ul>';
	}
	return $content;
}

add_shortcode( 'rss', 'yoast_rss_shortcode' );

?>