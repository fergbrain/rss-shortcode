<?php
/*
Plugin Name: RSS Shortcode (ft. Fergcorp)
Version: 0.3
Plugin URI: http://yoast.com/wordpress/rss-shortcode/
Description: Makes it easy to display an RSS feed on a page
Author: Joost de Valk and Andrew Ferguson
Author URI: http://yoast.com/
*/

function yoast_rss_shortcode( $atts ) {
	extract(shortcode_atts(array(  
	    "feed" 		=> '',  
		"num" 		=> '5',  
		"excerpt" 	=> true,
		"target"	=> '_self'
	), $atts));
	require_once(ABSPATH.WPINC.'/rss.php');
	$allowed_html = array(
    				'a' => array(
        					'href' => array(),
        					'title' => array()
    					),
    				'br' => array(),
    				'em' => array(),
    				'strong' => array(),
				'p' => array(),
			);
	if ( $feed != "" && $rss = fetch_rss( $feed ) ) {
		$content = '<ul>';
		if ( $num !== -1 ) {
			$rss->items = array_slice( $rss->items, 0, $num );
		}
		foreach ( (array) $rss->items as $item ) {
			$content .= '<li>';
			if ($target != '_self')
				$content .= '<a href="'.esc_url( $item['link'] ).'" target="'.esc_attr($target).'">'. wp_kses($item['title'], $allowed_html) .'</a>';
			else
				$content .= '<a href="'.esc_url( $item['link'] ).'">'. wp_kses($item['title'], $allowed_html) .'</a>';
			if ( $excerpt != false && $excerpt != "false") {
				$content .= '<br/><span class="rss_excerpt">'. wp_kses($item['summary'], $allowed_html) .'</span>';
			}
			$content .= '</li>';
		}
		$content .= '</ul>';
	}
	return $content;
}

add_shortcode( 'rss', 'yoast_rss_shortcode' );

?>
