WordPress EDUDirect Widget
==========================

[![Join the chat at https://gitter.im/CMN/edudirect-widget-client](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/CMN/edudirect-widget-client?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

WordPress plugin to embed the EDUDirect Widget via [shortcodes][5].


# Requirements

1. [Bower][1] v1.2+
2. [PHP][2] v5.3+
3. [WordPress][3] 3.6+


# Installation

If your project does not use [Bower][1] yet, initialize it:

    $ bower init

Choose a [release version][4], and plug it in:

    $ bower install --save git@github.com:CMN/wp-edudirect-widget.git\#~0.0.1

Now symlink the plugin into the WordPress `plugins` directory:

    $ cd path/to/plugins
    $ ln -s ../../../bower_components/wp-edudirect-widget/wp-edudirect-widget


If you'd like to auto-activate this plugin (among others), you can use
Eric Clemmons' [Auto-Activate WordPress Plugin Script][6].


# Usage

Within posts, use the [shortcode][5] directly:

    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    [edudirect_widget]
    Pariatur, quas, atque commodi voluptatum fugit ...


Or within templates wrap your shortcode:

    <?php get_header() ?>

    <h3>Quick Degree Finder</h3>

    <?php echo do_shortcode('[edudirect_widget]'); ?>


This will:

1. Immediately output the HTML template.
2. Call `wp_enqueue_script` with the named script `edudirect_widget`.
3. Call `add_filter` to `wp_footer` to append initialization script.


# Examples

Default:

    [edudirect_widget]

Embedded Custom Template:

    [edudirect_widget]<form action="...">...</form>[/edudirect_widget]

Custom Template in the Theme:

    [edudirect_widget template="inc/edudirect-widget.php"]

Defaulted Selections:

    [edudirect_widget degree=2 category=1 subject=30]



[1]: http://bower.io/
[2]: http://www.php.net/
[3]: http://wordpress.org/
[4]: https://github.com/CMN/wp-edudirect-widget/releases
[5]: http://codex.wordpress.org/Shortcode_API
[6]: https://gist.github.com/ericclemmons/6275346
