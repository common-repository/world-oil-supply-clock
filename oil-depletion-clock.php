<?php
/*
Plugin Name: Oil Depletion Clock
Plugin URI: https://www.peterleeds.com/oil-clock.htm
Description: Configurable Oil Depletion Clock widget and shortcode.
Version: 1.0
*/

/*
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define(ODL_PLUGIN,  __FILE__);
define(ODL_PLUGIN_PATH, dirname( __FILE__ ));

add_action('admin_menu', 'odc_admin_menu_item');

function odc_admin_menu_item()
{
    add_menu_page('Oil Depletion Clock Settings', 'Oil Clock', 'administrator', ODL_PLUGIN, 'odc_settings_page');

    add_action( 'admin_init', 'register_odl_settings' );
}

function register_odl_settings()
{
    register_setting( 'odl-settings-group', 'odl_widget_font_size' );
    register_setting( 'odl-settings-group', 'odl_widget_title_color' );
    register_setting( 'odl-settings-group', 'odl_widget_background_color' );
    register_setting( 'odl-settings-group', 'odl_widget_text_color' );
    register_setting( 'odl-settings-group', 'odl_widget_counter_color' );

    register_setting( 'odl-settings-group', 'odl_widget_used_barrels' );
    register_setting( 'odl-settings-group', 'odl_widget_total_world' );
    register_setting( 'odl-settings-group', 'odl_widget_oil_remaining' );
    register_setting( 'odl-settings-group', 'odl_widget_runs_out' );
    register_setting( 'odl-settings-group', 'odl_widget_daily_consumption' );

    register_setting( 'odl-settings-group', 'odl_font_size' );
    register_setting( 'odl-settings-group', 'odl_title_color' );
    register_setting( 'odl-settings-group', 'odl_background_color' );
    register_setting( 'odl-settings-group', 'odl_text_color' );
    register_setting( 'odl-settings-group', 'odl_counter_color' );

    register_setting( 'odl-settings-group', 'odl_used_barrels' );
    register_setting( 'odl-settings-group', 'odl_total_world' );
    register_setting( 'odl-settings-group', 'odl_oil_remaining' );
    register_setting( 'odl-settings-group', 'odl_runs_out' );
    register_setting( 'odl-settings-group', 'odl_daily_consumption' );

    register_setting( 'odl-settings-group', 'odl_copyright_link' );
}

function odc_settings_page ()
{
    ?>
<h1>Oil Depletion Clock Settings</h1>
    <div class="">
        <form method="post" action="options.php">
            <?php settings_fields( 'odl-settings-group' ); ?>
            <br />
            <h2 class="title">Widget Settings</h2>
            <p>Options below determine widget text colors</p>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Widget Font Size</th>
                    <td><input type="text" name="odl_widget_font_size" size="4" value="<?php echo get_option("odl_widget_font_size") ?>" /> px.</td>
                </tr>
                <tr valign="top">
                    <th scope="row">Widget Header Color</th>
                    <td><input type="text" name="odl_widget_title_color" class="odl-color-picker" value="<?php echo get_option("odl_widget_title_color") ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Widget Background Color</th>
                    <td><input type="text" name="odl_widget_background_color" class="odl-color-picker" value="<?php echo get_option("odl_widget_background_color") ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Widget Text Color</th>
                    <td><input type="text" name="odl_widget_text_color" class="odl-color-picker" value="<?php echo get_option("odl_widget_text_color") ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Widget Counter Color</th>
                    <td><input type="text" name="odl_widget_counter_color" class="odl-color-picker" value="<?php echo get_option("odl_widget_counter_color") ?>" /></td>
                </tr>
            </table>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Show "Countdown until all reserves run dry" counter in widget</th>
                    <td><input type="checkbox" name="odl_widget_oil_remaining" value="1" <?php echo get_option("odl_widget_oil_remaining")==1 ? ' checked="checked"' : '' ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Show "Thousands of Barrels World Wide" counter in widget</th>
                    <td><input type="checkbox" name="odl_widget_total_world" value="1"<?php echo get_option("odl_widget_total_world")==1 ? ' checked="checked"' : '' ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Show "Barrels Used Today" counter in widget</th>
                    <td><input type="checkbox" name="odl_widget_used_barrels" value="1"<?php echo get_option("odl_widget_used_barrels")==1 ? ' checked="checked"' : '' ?> /></td>
                </tr>
            </table>
            <br />
            <h2 class="title">Plugin Settings</h2>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Font Size</th>
                    <td><input type="text" name="odl_font_size" size="4" value="<?php echo get_option("odl_font_size") ?>" /> px.</td>
                </tr>
                <tr valign="top">
                    <th scope="row">Header Color</th>
                    <td><input type="text" name="odl_title_color" class="odl-color-picker" value="<?php echo get_option("odl_title_color") ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Background Color</th>
                    <td><input type="text" name="odl_background_color" class="odl-color-picker" value="<?php echo get_option("odl_background_color") ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Text Color</th>
                    <td><input type="text" name="odl_text_color" class="odl-color-picker" value="<?php echo get_option("odl_text_color") ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Counter Color</th>
                    <td><input type="text" name="odl_counter_color" class="odl-color-picker" value="<?php echo get_option("odl_counter_color") ?>" /></td>
                </tr>
            </table>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Show "Countdown until all reserves run dry" counter</th>
                    <td><input type="checkbox" name="odl_oil_remaining" value="1" <?php echo get_option("odl_oil_remaining")==1 ? ' checked="checked"' : '' ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Show "Thousands of Barrels World Wide" counter</th>
                    <td><input type="checkbox" name="odl_total_world" value="1"<?php echo get_option("odl_total_world")==1 ? ' checked="checked"' : '' ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Show "Barrels Used Today" counter</th>
                    <td><input type="checkbox" name="odl_used_barrels" value="1"<?php echo get_option("odl_used_barrels")==1 ? ' checked="checked"' : '' ?> /></td>
                </tr>
            </table>

            <br />
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Show "provided by" text as link?</th>
                    <td><input type="checkbox" name="odl_copyright_link" value="1"<?php echo (get_option("odl_copyright_link") == 1) ? ' checked="checked"' : '' ?> /></td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
        </form>
    </div>

<?php
}

function color_picker_assets($hook_suffix) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'odl-script-handle', plugins_url('js/odl-admin-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

add_action( 'admin_enqueue_scripts', 'color_picker_assets' );

function odl_activate()
{
    if(!get_option('odl_widget_oil_remaining')) {
        add_option('odl_widget_oil_remaining', 1);
    }
    if(!get_option('odl_widget_total_world')) {
        add_option('odl_widget_total_world', 1);
    }
    if(!get_option('odl_widget_used_barrels')) {
        add_option('odl_widget_used_barrels', 1);
    }
    if(!get_option('odl_oil_remaining')) {
        add_option('odl_oil_remaining', 1);
    }
    if(!get_option('odl_total_world')) {
        add_option('odl_total_world', 1);
    }
    if(!get_option('odl_used_barrels')) {
        add_option('odl_used_barrels', 1);
    }
}
register_activation_hook( __FILE__, 'odl_activate' );


require_once ODL_PLUGIN_PATH . "/odl-widget.php";
require_once ODL_PLUGIN_PATH . "/odl-shortcode.php";