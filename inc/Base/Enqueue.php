<?php
/**
 * @package CalendarEvents
 */
namespace Calendarevents\Inc\Base;

use \Calendarevents\Inc\Base\BaseController;
use \Calendarevents\Inc\Traits\Constants;

class Enqueue extends BaseController{
    use Constants;
    public function register(){
        add_action('admin_enqueue_scripts',array($this,'enqueue'));
        // add_action('wp_enqueue_scripts',array($this,'frontend_enqueue_scripts'));
    }

    public function enqueue($screen){

        $_screen=get_current_screen();

        wp_enqueue_style('calendar-events-main-admin-style', $this->plugin_url. 'assets/admin/css/admin-style.css',array(),self::$plugin_version);
		wp_enqueue_style('calendar-events-ui-css', $this->plugin_url. 'assets/vendor/jquery-ui.css',array(),self::$plugin_version);

        wp_enqueue_script('calendar-events-main-admin-script', $this->plugin_url. 'assets/admin/js/main-admin-js.js',array('jquery'),self::$plugin_version,true);

		wp_enqueue_script('calendar-events-js-ui-script', $this->plugin_url. 'assets/vendor/jquery-ui.js',array('jquery'),self::$plugin_version,true);

        wp_enqueue_script('calendar-events-dashboard-script', $this->plugin_url. 'assets/vendor/index.global.js',array('jquery'),self::$plugin_version,true);

    }


	// public function frontend_enqueue_scripts($screen){

    //     $_screen=get_current_screen();

    //     wp_register_style('gym-builder-admin-style', $this->plugin_url. 'assets/admin/css/gym-builder-admin.css',array(),self::$plugin_version);

    //     wp_register_script('admin-settings-script', $this->plugin_url. 'assets/admin/js/admin-settings.js',array('jquery','wp-color-picker'),self::$plugin_version,true);

    // }



//	}
}