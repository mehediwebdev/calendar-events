<?php
/**
 * @package CalendarEvents
 */
namespace Calendarevents\Inc\Controllers\Admin\Models\Metabox;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

use Calendarevents\Inc\Controllers\Admin\Models\Metabox\RegisterPostMeta;

class MetaBoxModel{
    public $registerPostMeta;
    public function register(){
        RegisterPostMeta::getInstance();
    }
    
}