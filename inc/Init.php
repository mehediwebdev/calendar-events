<?php
/**
 * @package CalendarEvents
 */
namespace Calendarevents\Inc;
//use User\WphAdminNotice\Base;

// Include the AdminNotice class file
//require_once plugin_dir_path(__FILE__) . 'Base/AdminNotice.php';

//use User\WphAdminNotice\Base\AdminNotice;

use Calendarevents\Inc\Controllers\Admin\Models\Metabox\MetaBoxModel;

final class Init {
    /**
     * Store all classes inside an array
     * @return array full list of services
     */
    public static function get_services() {
        return [
           //Base\AdminNotice::class,
          // Base\Enqueue::class,
          Controllers\Admin\Models\Posts\RegisterPostType::class,
          Controllers\Admin\Models\Metabox\MetaBoxModel::class,
         // Controllers\Admin\Models\Posts\RegisterPostType::class,
         Base\Enqueue::class,
         Controllers\Admin\Models\Columns\AdminColumn::class,
         Controllers\Admin\Settings\Pages\Dashboard::class,
         Controllers\Hooks\TemplateLoader\EventsTemplates::class,
        ];
    }

    /**
     * Loop through the classes,initialize theme,
     * and call the register() method if it exits
     */
    public static function register_services() {

        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }

        }

    }

    /**
     * Initialize the class
     * @param class $class class from services array
     * @param class instance new instance of the class
     */
    private static function instantiate( $class ) {
        return new $class();
    }

}