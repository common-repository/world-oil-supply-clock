<?php
/**
 * @package Oil Depletion Clock
 */
class odl_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'odl_widget',
            'Oil Depletion Clock Widget',
            array( 'description' => "Add Oil Depletion Clock to your sidebar", )
        );
    }

    public function widget( $args, $instance ) {
        add_action( 'wp_enqueue_scripts', $this->odl_widget_scripts() );

        $interval = 1076;

        $title = apply_filters( 'widget_title', $instance['title'] );

        $backgroundColor = get_option("odl_widget_background_color");
        $bgColor = (!empty($backgroundColor)) ? ' style="background-color: ' . $backgroundColor . '"' : '';

        $tmpTitleColor = get_option("odl_widget_title_color");

        $titleColor = (!empty($tmpTitleColor)) ? '<style>.widget_odl_widget .widget-title {color: ' . $tmpTitleColor . ' !important;}</style>' : '';

        $textColor = get_option("odl_widget_text_color");
        $txtColor = (!empty($textColor)) ? ' style="color: ' . $textColor . '"' : '';

        $tmpFontSize = get_option("odl_widget_font_size");

        $fontSize = (!empty($tmpFontSize)) ? '<style>.odl-widget-container, #odl-widget p{font-size:' . $tmpFontSize . 'px;}</style>' : "";

        $numColor = get_option("odl_widget_counter_color");
        $counterColor = (!empty($numColor)) ? ' color: ' . $numColor  : '';

        echo '<div id="odl-widget"' . $bgColor . '>';

        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        else
            echo '<h2 class="widget-title">World Oil Supply Clock</h2>';
            echo '<p class="odl-mb-15"'.$txtColor.'>Countdown until all reserves run dry:</p>';
?>
        <?php if (get_option("odl_widget_oil_remaining") == 1) { ?>
            <div class="odl-widget-container odl-countdown-container">
            <div class="odl-center odl-dates">
                <div class="odl-countdown-element">
                    <div id="odl-widget-counter-div-year"
                         data-digits="2"
                         data-direction="down"
                         data-start-value=""
                         data-end-value=""
                         data-interval="1"
                         data-alignment="left"
                         data-digit-padding="0"
                         data-digit-width="18"
                         data-digit-height="24"
                         data-digit-style="<?php echo $counterColor?>"
                         data-tick-multiplier="1"
                         data-tenths="0"
                         data-timestamp="<?php echo  date("Y-m-d H:i:s") ?>"
                         class="odl-counter-year odl-countdown"></div>
                    <span<?php echo $txtColor?>>YY</span>
                </div>
                <div class="odl-countdown-element odl-ml-5">
                    <div id="odl-widget-counter-div-month"
                         data-digits="2"
                         data-direction="down"
                         data-start-value=""
                         data-end-value=""
                         data-interval="1"
                         data-alignment="left"
                         data-digit-padding="0"
                         data-digit-width="18"
                         data-digit-height="24"
                         data-digit-style="<?php echo $counterColor?>"
                         data-tick-multiplier="1"
                         data-tenths="0"
                         data-timestamp="<?php echo  date("Y-m-d H:i:s") ?>"
                         class="odl-counter-month odl-countdown"></div>
                    <span<?php echo $txtColor?>>MM</span>
                </div>
                <div class="odl-countdown-element odl-ml-5">
                    <div id="odl-widget-counter-div-days"
                         data-digits="2"
                         data-direction="down"
                         data-start-value=""
                         data-end-value=""
                         data-interval="1"
                         data-alignment="left"
                         data-digit-padding="0"
                         data-digit-width="18"
                         data-digit-height="24"
                         data-digit-style="<?php echo $counterColor?>"
                         data-tick-multiplier="1"
                         data-tenths="0"
                         data-timestamp="<?php echo  date("Y-m-d H:i:s") ?>"
                         class="odl-counter-day odl-countdown"></div>
                    <span<?php echo $txtColor?>>DD</span>
                </div>
                </div>
                <div class="odl-clearfix odl-mb-10"></div>
                <div class="odl-center odl-dates">
                <div class="odl-countdown-element">
                    <div id="odl-widget-counter-div-hours"
                         data-digits="2"
                         data-direction="down"
                         data-start-value=""
                         data-end-value=""
                         data-interval="3600"
                         data-alignment="left"
                         data-digit-padding="0"
                         data-digit-width="18"
                         data-digit-height="24"
                         data-digit-style="<?php echo $counterColor?>"
                         data-tick-multiplier="1"
                         data-tenths="0"
                         data-timestamp="<?php echo  date("Y-m-d H:i:s") ?>"
                         class="odl-counter-hour odl-countdown"></div>
                    <span<?php echo $txtColor?>>HH</span>
                </div>
                <div class="odl-countdown-element odl-ml-5">
                    <div id="odl-widget-counter-div-minutes"
                         data-digits="2"
                         data-direction="down"
                         data-start-value=""
                         data-end-value=""
                         data-interval=""
                         data-alignment="left"
                         data-digit-padding="0"
                         data-digit-width="18"
                         data-digit-height="24"
                         data-digit-style="<?php echo $counterColor?>"
                         data-tick-multiplier="1"
                         data-tenths="0"
                         data-timestamp="<?php echo  date("Y-m-d H:i:s") ?>"
                         class="odl-counter-minute odl-countdown"></div>
                    <span<?php echo $txtColor?>>MM</span>
                </div>
                <div class="odl-countdown-element odl-ml-5">
                    <div id="odl-widget-counter-div-seconds"
                         data-digits="2"
                         data-direction="down"
                         data-start-value=""
                         data-end-value=""
                         data-interval="1"
                         data-alignment="left"
                         data-digit-padding="0"
                         data-digit-width="18"
                         data-digit-height="24"
                         data-digit-style="<?php echo $counterColor?>"
                         data-tick-multiplier="1"
                         data-tenths="0"
                         data-timestamp="<?php echo  date("Y-m-d H:i:s") ?>"
                         class="odl-counter-second odl-countdown"></div>
                    <span<?php echo $txtColor?>>SS</span>
                </div>
                </div>
            </div>
            <div class="odl-clearfix"></div>
        <?php } ?>
        <?php if (get_option("odl_widget_total_world") == 1) { ?>
            <div class="odl-widget-container">
                    <div id="odl-counter-div-left-barrels"
                         data-digits="10"
                         data-direction="down"
                         data-start-value=""
                         data-end-value=""
                         data-interval="1"
                         data-alignment="center"
                         data-digit-padding="0"
                         data-digit-width="18"
                         data-digit-height="24"
                         data-digit-style="<?php echo $counterColor?>"
                         data-tick-multiplier="1"
                         data-tenths="0"
                         data-timestamp="<?php echo  date("Y-m-d H:i:s") ?>"
                         data-format="0,000,000,000"
                         data-iteration-value="1.076"
                         class="odl-counter odl-center"></div>
                <span<?php echo $txtColor?>>Thousands of Barrels World Wide</span>
            </div>
        <?php } ?>
        <?php if (get_option("odl_widget_used_barrels") == 1) { ?>
            <div class="odl-widget-container">
                <div id="odl-widget-counter-div-barrels"
                     data-digits="9"
                     data-direction="up"
                     data-start-value=""
                     data-end-value=""
                     data-interval="1"
                     data-alignment="center"
                     data-digit-padding="0"
                     data-digit-width="18"
                     data-digit-height="24"
                     data-digit-style="<?php echo $counterColor?>"
                     data-tick-multiplier="1"
                     data-tenths="0"
                     data-timestamp="<?php echo  date("Y-m-d H:i:s") ?>"
                     data-format="000,000,000"
                     data-iteration-value="1076"
                     class="odl-counter odl-center"></div>
                <span<?php echo $txtColor?>>Barrels Used Today</span>
            </div>
        <?php } ?>
        <?php
        echo '<p class="copyright">';

        if (get_option("odl_copyright_link") == 1) {
            echo '<a href="http://oilclock.com/" target="_blank">OilClock.com</a>';
        } else {
            echo 'OilClock.com';
        }

        echo '</p>';

        echo $fontSize . $titleColor;

        echo '</div>';
        echo $args['after_widget'];
    }


    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = "World Oil Supply Clock";
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }


    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }

    private function odl_widget_scripts() {
        wp_enqueue_style( 'odl-widget-style', plugins_url('css/odl-widget-style.css', __FILE__ ) );
        wp_enqueue_script( 'countdown-js', plugins_url('js/countdown-script.js', __FILE__ ), array(), '2.4.0', true );
        wp_enqueue_script( 'odl-widget-counter', plugins_url('js/odl-widget-counter.js', __FILE__ ), array(), '1.0.0', true );
        //counter styles and script
        wp_enqueue_style( 'odl-widget-counter', plugins_url('css/odl-counter.css', __FILE__ ), array(), '1.0.0', 'all'  );
        wp_enqueue_script( 'odl-widget-odometer', plugins_url('js/odl-odometer.js', __FILE__ ), array(), '2.0.0', true );

    }
}

function odl_load_widget() {
    register_widget( 'odl_widget' );
}
add_action( 'widgets_init', 'odl_load_widget' );
