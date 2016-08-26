Social link
-----------

 - Contributors: (this should be a list of wordpress.org userid's)
 - Donate link: https://pledgie.com/campaigns/31846
 - Tags: comments, spam
 - Requires at least: 4.5.2
 - Tested up to: 4.5.2
 - Stable tag: 4.5.2
 - License: GPLv2 or later
 - License URI: http://www.gnu.org/licenses/gpl-2.0.html

![https://styleci.io/repos/60421498/shield](https://styleci.io/repos/60421498/shield)
[![Code Climate](https://codeclimate.com/github/yoanmarchal/social-link-plugin/badges/gpa.svg)](https://codeclimate.com/github/yoanmarchal/social-link-plugin) [![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9CYUE3CVEAJ2Q)

Simple save global and retrive social links of website

== Description ==

Minimal social plugin for wordpress

== Installation ==

This section describes how to install the plugin and get it working.

1. Activate the plugin through the 'Plugins' menu in WordPress

For get all social links
`<?php $links = get_option( 'links' ); ?>`

Echo value
`<?= $links['facebook'];?>`


== Changelog ==
= 1.1 =
clean plugin.

= 1.0 =
Initial plugin.

== Todo ==

* Test
* svg icons
