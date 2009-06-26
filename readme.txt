=== RSS Shortcode ===
Contributors: joostdevalk
Donate link: http://yoast.com/
Tags: rss, shortcode
Requires at least: 2.6
Tested up to: 2.8
Stable tag: 0.1

Simple plugin to show RSS feeds in posts and pages using a shortcode.

== Description ==

Adds a simple to use [rss] shortcode with a couple of options:

* feed, to put in the feed URL
* num, to specify the number of items to show, defaults to 5
* excerpt (true|false), whether to show an excerpt or not, defaults to true

Example use:

[rss feed="http://yoast.com/feed/" num="10" excerpt="false"]

* Find out more about the [RSS Shortcode](http://yoast.com/wordpress/rss-shortcode/) plugin

== Installation ==

1. Upload the `rss-shortcode` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use the shortcode in your posts and pages

== Changelog ==

= 0.1 =
* Initial release.