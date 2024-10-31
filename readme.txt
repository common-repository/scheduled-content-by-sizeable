=== Scheduled Content (by Sizeable) ===
Contributors: szbl,theandystratton
Donate link: 
Tags: schedule, embed content, schedule content
Requires at least: 3.0
Tested up to: 6.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed scheduled content in your site via shortcode.

== Description ==

Embed scheduled content into your pages, posts and even custom post types supporting shortcodes.

Use `[szbl_scheduled_content]` to wrap and schedule your content. To hide content until a specific date, use the `start` attribute. To have content expire, use the `end` attribute:

`[szbl_scheduled_content start="Jan 1, 2013 12am" end="Apr 14, 2013 12:00pm"]This is my scheduled content[/szbl_scheduled_content]`

You can enter dates/time in any standard format and the plugin should interpret them correctly, using the timezone set under Settings > General.

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use [szbl_scheduled_content start="January 1, 2013" end="January 15, 2013"]

== Frequently asked questions ==

= What formats can I use in the start/end attributes? =

The plugin uses PHP's strtotime() function, so any valid date/time format should work.

= Does my content have to have a start date? I just want it to expire =

Omit the start attribute and your content will simply expire.

= Does my content have to have an end date? I just want it to not start until a specific date =

Omit the end attribute and your content will never expire, it will just be hidden until the start attribute's date.

= What timezone does this plugin use? =

We make every effort to use the timezone settings within your WordPress installation (comparisons are made using date_i18n which inherits the WP timezone settings).

= What are my content filtering/shortcode options? =

You can set the following two attributes to toggle nested shortcode processing and applying filters for `the_content`:

* `content_filters` (defaults to `true`, can be set to `true` or `false`)
* `shortcodes` (defaults to `true`, can be set to `true` or `false`)

Content filtering must be turned off for the `shortcodes` attribute to take effect. You'd only want to use these if you want to remove content filtering (like `wpautop` and `wptexturize`) but still process shortcodes:

`[szbl_scheduled_content start="Jan 1, 2013 12am" end="Apr 14, 2013 12:00pm" content_filtering="false" shortcodes="true"]This is my scheduled content. [another_shortcode] [/szbl_scheduled_content]`

== Upgrade Notice ==

= 1.3.1 =
* Compatiblity with WP 6.1 + PHP 8.1
* Fixes a time check bug on end dates.

= 1.3.1 =
This update requires PHP 7.4

= 1.3.0 =
This update requires PHP 7.4

== Changelog ==

= 1.3.0 =

* Enforces date localization for string to time conversion.

= 1.3.0 =

* WP 5.6 and PHP 7.4 compatibility checks
* Code formatting clean up and namespace.

= 1.2.1 =

* WP 5.2 compatibility check.

= 1.2.0 =

* Allows `ignore_year` attribute to the shortcode, to allow for ignoring the year in the start/end timestamps.

= 1.0.1 =

* Updates to readme.txt

= 1.0 =

* First commit. Basic functionality.
