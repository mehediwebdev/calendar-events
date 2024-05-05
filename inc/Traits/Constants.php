<?php
/**
 * @package GymBuilder
 */
namespace Calendarevents\Inc\Traits;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}
trait Constants {
    public static bool $plugin_template_load = false;
    public static string $plugin_version = "1.0.0";

}