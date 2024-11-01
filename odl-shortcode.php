<?php
/**
 * @package Oil Depletion Clock
 */
Class OdlShortcode {

    static $add_script;

    static function init() {
        add_shortcode('show-oil-clock', array(__CLASS__, 'odl_shortcode_handler'));
        add_action('init', array(__CLASS__, 'odl_scripts'));
        add_action('wp_footer', array(__CLASS__, 'print_script'));
    }

    static function odl_shortcode_handler($atts)
    {
        self::$add_script = true;

        $data = shortcode_atts( array(
            'title' => 'World Oil Supply Clock',
        ), $atts );

        $backgroundColor = get_option("odl_background_color");
        $bgColor = (!empty($backgroundColor)) ? ' style="background-color: ' . $backgroundColor . '"' : '';

        $titleColor = get_option("odl_title_color");
        echo (!empty($titleColor)) ? '<style>.odl-container .odl-title {color: ' . $titleColor . ' !important;}</style>' : '';

        $textColor = get_option("odl_text_color");
        $txtColor = (!empty($textColor)) ? ' style="color: ' . $textColor . '"' : '';

        $numColor = get_option("odl_counter_color");
        $counterColor = (!empty($numColor)) ? 'color: ' . $numColor . ';' : '';

        $fontSize = get_option("odl_font_size");

        $font = !empty($fontSize) ? '<style>.odl-container .odl-counter-container, .odl-container p{font-size: ' . (int)$fontSize . 'px !important;}</style>' : '';

        ob_start();?>
        <div class="odl-container"<?php echo $bgColor; ?>>
            <h2 class="odl-title"><?php echo  $data['title'] ?></h2>
            <p class="odl-mb-15"<?php echo $txtColor; ?>>Countdown until all reserves run dry:</p>
            <div class="">
                <div class="left_time">
                </div>
            </div>
            <?php if (get_option("odl_oil_remaining") == 1) { ?>
                <div class="odl-counter-container countdown-container">
                    <div class="odl-countdown-element">
                        <div id="odl-counter-div-year"
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
                        <div id="odl-counter-div-month"
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
                        <div id="odl-counter-div-days"
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
                    <div class="odl-countdown-element odl-ml-25">
                        <div id="odl-counter-div-hours"
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
                        <div id="odl-counter-div-minutes"
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
                        <div id="odl-counter-div-seconds"
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
                <div class="odl-clearfix"></div>
            <?php } ?>
            <?php if (get_option("odl_total_world") == 1) { ?>
                <div class="odl-counter-container">


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
            <?php if (get_option("odl_used_barrels") == 1) { ?>
                <div class="odl-counter-container">
                    <div id="odl-counter-div-barrels"
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
            <p class="copyright">
                <?php
                if (get_option("odl_copyright_link") == 1) {
                    echo '<a href="https://www.peterleeds.com/" target="_blank">PeterLeeds.com</a>';
                } else {
                    echo 'PeterLeeds.com';
                } ?>
            </p>
            <?php echo $font  ?>
        </div>
        <script type="text/javascript" src="<?php echo plugins_url('js/countdown-script.js', __FILE__ ); ?>"></script>
        <?php
        return ob_get_clean();
    }

    public function odl_scripts() {
        wp_register_style( 'odl-style', plugins_url('css/odl-style.css', __FILE__ ), array(), '1.0.0', 'all'  );
        wp_register_script( 'odl-countdown-script', plugins_url('js/countdown-script.js', __FILE__ ), array(), '1.0.0', true );
        wp_register_script( 'odl-counter-shortcode', plugins_url('js/odl-counter-shortcode.js', __FILE__ ), array(), '2.0.0', true );
        wp_register_style( 'odl-counter', plugins_url('css/odl-counter.css', __FILE__ ), array(), '1.0.0', 'all'  );
        wp_register_script( 'odl-odometer', plugins_url('js/odl-odometer.js', __FILE__ ), array(), '2.0.0', true );
    }

    static function print_script() {
        if ( ! self::$add_script )
            return;
        wp_print_styles('odl-countdown-script');
        wp_print_scripts('odl-counter-shortcode');
        wp_print_styles('odl-style');
        wp_print_scripts('odl-odometer');
        wp_print_styles('odl-counter');

    }
}

OdlShortcode::init();
