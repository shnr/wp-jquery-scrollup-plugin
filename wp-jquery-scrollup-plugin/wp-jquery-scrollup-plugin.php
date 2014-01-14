<?php
/*
Plugin Name: WP Jquery Scrollup Plugin
Plugin URI: -
Description: Jquery scrollup plugin  http://markgoodyear.com/2013/01/scrollup-jquery-plugin/
Author: shnr.dev@gmail.com
Version: 1.0
Author URI: http://blog.shnr.net
License: GPLv2

    Copyright 2013 shnr (email : shnr.dev@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

/* =====================================
 * DEFINE
 */

define('WP_SHNR_JQSCRLUP_DOMAIN', "wp-jquery-scrollup-plugin");
define('WP_SHNR_JQSCRLUPM_PLG_DIR', dirname( plugin_basename( __FILE__ ) ));
define('WP_SHNR_JQSCRLUP_PLG_FULLPATH', plugin_dir_path(__FILE__) );

load_plugin_textdomain(WP_SHNR_JQSCRLUP_DOMAIN, false, WP_SHNR_JQSCRLUPM_PLG_DIR .'/lang');

define('WP_SHNR_JQSCRLUP_OPTIONS', "shnr_jqscrlup_settings");


/* =====================================
 * CLASS
 */

new Wp_shnr_JQSCRLUP();

class Wp_shnr_JQSCRLUP {

    function __construct()
    {
        // initialize
        //if ( !get_option(WP_SHNR_JQSCRLUP_TABLE_COLMUN) ) $this->smum_install();

        add_action('admin_menu', array(&$this, 'admin_menu'));
        add_action( 'wp_enqueue_scripts', array(&$this, 'init_scrollUp_scripts') );

    }

    public function scrollTheme(){
        $themes = array('tab', 'pill', 'text', 'image', 'custom');
        return $themes;
    } 

    public function admin_menu()
    {
        $hook = add_submenu_page(
            'options-general.php',
            __('jQuery ScrollUp', WP_SHNR_JQSCRLUP_DOMAIN),
            __('jQuery ScrollUp', WP_SHNR_JQSCRLUP_DOMAIN),
            'update_core',
            WP_SHNR_JQSCRLUP_DOMAIN,
            array(&$this, 'admin_page')
        );

        wp_enqueue_style( 'smup_style', plugins_url("/lib/css/style.css", __FILE__), array(), false, 'all' );   
        wp_register_script( 'settings.js', plugins_url("/lib/js/settings.js", __FILE__) , "",true);
        wp_enqueue_script( 'settings.js' );
    }


    public function admin_page()
    {
        require WP_SHNR_JQSCRLUP_PLG_FULLPATH.'/admin/settings.php';
    }

/*
    public function admin_scripts()
    {
        wp_enqueue_media(); 
        wp_enqueue_script(
            'sm-uploader',
            plugins_url("/lib/js/sm-uploader.js", __FILE__),
            array('jquery'),
            filemtime(dirname(__FILE__).'/lib/js/sm-uploader.js'),
            false
        );
    }
*/


    /**
     * Update setting
     */
    public function update_settings($data)
    {
        $settings = array(
            'title' => isset($data['disp_title'])? $data['disp_title'] : "",
            'id' => $data['ul_id'],
            'class' => $data['ul_class'],
            );

        update_option( WP_SHNR_JQSCRLUP_DOMAIN.'-settings', $settings );

        return;
    }



    /*
     * Add scripts on header
     */
    public function init_scrollUp_scripts(){
        $options = get_option(WP_SHNR_JQSCRLUP_OPTIONS);
        if(isset($options['scrollImg']) && $options['scrollImg']){
            wp_enqueue_style( 'scrollup-setting', plugins_url("/lib/css/themes/image.css", __FILE__) );
        }elseif(isset($options['scrollTitle']) && $options['scrollTitle']){
            wp_enqueue_style( 'scrollup-setting', plugins_url("/lib/css/themes/link.css", __FILE__) );
        }else{
            wp_enqueue_style( 'scrollup-setting', plugins_url("/lib/css/themes/image.css", __FILE__) );
        }
        wp_enqueue_script( 'jquery' );
        wp_register_script( 'jquery.easing.min', plugins_url("/lib/js/jquery.easing.min.js", __FILE__) , "",true);
        wp_enqueue_script( 'jquery.easing.min' );
        wp_register_script( 'jquery.scrollUp.min', plugins_url("/lib/js/jquery.scrollUp.min.js", __FILE__) , "",true);
        wp_enqueue_script( 'jquery.scrollUp.min' );

        // Initialize scrollUp.
        $options = get_option(WP_SHNR_JQSCRLUP_OPTIONS);
        $themes = (isset($options['scrollTheme']))? $options['scrollTheme'] : '';
        $initoptions_array = array( 'theme' => $themes, 'options' => $options );

        wp_register_script( 'init', plugins_url("/lib/js/init.js", __FILE__) , "",true);
        wp_enqueue_script( 'init' );
        wp_localize_script( 'init', 'initoptions', $initoptions_array );

    }


}


if(!function_exists("h")):
function h($str){
    if(is_array($str)){
        return array_map("h",$str);
    }else{
        return htmlspecialchars($str,ENT_QUOTES);
    }
}
endif;