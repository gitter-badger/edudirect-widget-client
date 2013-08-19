<?php

/**
 * Plugin Name: EDUDirect Widget
 * Plugin URI: https://github.com/CMN/wp-edudirect-widget
 * Description: WordPress shortcode to implement the EDUDirect Widget
 * Author: Eric Clemmons
 * Author URI: https://github.com/ericclemmons
 * Version: 0.0.1
 */

require_once( plugin_dir_path( __FILE__ ) . 'edudirect-widget.php' );

EdudirectWidget::init();
