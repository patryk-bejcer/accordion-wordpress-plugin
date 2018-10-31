<?php

/*
* Plugin Name: Accordion Shortcode (PB)
* Plugin URI: http://patrykbejcer.pl
* Description:  How use?  [accordion title="This is a title" content="This is a content (p)"]
* Version: 1.0.0
* Author: The Health Check Team
* Author URI: http://patrykbejcer.pl
* Text Domain: accordion
* Version: 1.0
*/

if (!function_exists('pb_accordion_shortcode_styles')){
    function pb_accordion_shortcode_styles(){
        wp_enqueue_style( 'pb_accordion_shortcode', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
        wp_enqueue_style( 'font_awesome', plugin_dir_url( __FILE__ ) . 'assets/css/font-awesome.min.css' );
    }
}

if (!function_exists('pb_accordion_shortcode_scripts')){
    function pb_accordion_shortcode_scripts(){
        wp_enqueue_script( 'pb_accordion_shortcode', plugin_dir_url( __FILE__ ) . 'assets/js/scripts.js' );
    }
}


if (!function_exists('pb_accordion_shortcode')) {
    function pb_accordion_shortcode( $atts ){

        $parameters = shortcode_atts (
            array(
              'title' => '',
              'content' => '',
              'img_url' => '',
            ),
            $atts
        );

        ob_start();

        if(($parameters['title'] !== '') && ($parameters['content'] !== '')){

        ?>

        <div class="single-accordion">
            <button class="accordion">
                <?php if($parameters['img_url'] !== ''): ?>
                    <img src="<?php echo $parameters['img_url'] ?>">
                <?php endif; ?>
                <h3>
                    <?php echo $parameters['title'] ?>
                </h3>
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </button>

            <div class="panel animated">
                <p>
                    <?php echo $parameters['content'] ?>   
                </p>
            </div>
        </div>

        <?php

        } else {

            echo '<pre>Shortcode parameters is empty try:  [accordion title="This is a title" content="This is a content (p)"]</pre>';
        }

        return ob_get_clean();
    }
}


/* Init */
add_action( 'wp_enqueue_scripts', 'pb_accordion_shortcode_styles' );
add_action( 'wp_footer', 'pb_accordion_shortcode_scripts' );
add_shortcode( 'accordion', 'pb_accordion_shortcode' );