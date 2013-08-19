<?php

class EdudirectWidget
{
    const VERSION = '0.0.4';

    private $atts;

    private $content;

    public static function init()
    {
        add_shortcode( 'edudirect_widget', 'EdudirectWidget::handleShortcode' );
    }

    public static function handleShortcode( $atts = array(), $content = null )
    {
        $widget = new EdudirectWidget( $atts, $content );

        return $widget->render();
    }

    public function __construct( $atts = array(), $content = null)
    {
        $this->atts = shortcode_atts( array(
            'id'        => 'edudirect-widget-' . substr( md5( spl_object_hash( $this ) ), 0, 5 ),
            'class'     => 'edudirect-widget',
            'degree'    => null,
            'category'  => null,
            'subject'   => null,
            'template'  => __DIR__ . '/templates/widget.html.php',
        ), $atts );

        if ( empty( $content ) ) {
            // If not an absolute path, set template path relative to theme folder
            if ( $this->atts['template'][0] !== '/' ) {
                $this->atts['template'] = get_stylesheet_directory() . '/' . $this->atts['template'];
            }

            // Include & save dynamic template contents
            ob_start();
            include( $this->atts['template'] );
            $this->content = ob_get_clean();
        }
    }

    public function enqueue()
    {
        $plugin     = sprintf( '%s/%s/%s', WP_PLUGIN_DIR, basename( __DIR__ ), basename( __FILE__ ) );
        $script_uri = plugins_url( 'scripts/QuickDegreeFinder.jquery.js', $plugin );

        wp_enqueue_script( 'edudirect_widget', $script_uri, array('jquery'), static::VERSION, true );

        add_filter( 'wp_footer', array( $this, 'filterFooter' ), 21 ); // "Enqueued scripts are executed at priority level 20"
    }

    public function render()
    {
        $this->enqueue();

        return sprintf('<div id="%s" class="%s">%s</div>',
            $this->atts['id'],
            $this->atts['class'],
            $this->content
        );
    }

    public function filterFooter($content = null)
    {
        extract($this->atts);

        ob_start();
        include( __DIR__ . '/scripts/init.js.php' );
        echo ob_get_clean();

        return $content;
    }
}
