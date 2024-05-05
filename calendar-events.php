<?php
/*
 * Plugin Name:       Calendar Events
 * Plugin URI:        
 * Description:       Calendar Events is a event management WordPress plugin.
 * Version:           1.0.0
 * Requires at least: 6.2
 * Requires PHP:      7.2
 * Author:            Mehedi Hasan
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        
 * Text Domain:       calendar-events
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

if(class_exists('Calendarevents\\Inc\\Init')){
    Calendarevents\Inc\Init::register_services();
}