<?php
/**
 * @package CalendarEvents
 */


namespace Calendarevents\Inc\Controllers\Hooks\TemplateLoader;
use \Calendarevents\Inc\Base\BaseController;


class EventsTemplates extends BaseController{
    //use Constants;
    public function register(){
        add_filter( 'archive_template', [$this, 'load_custom_archive_template' ]);
        add_filter( 'single_template', [$this, 'load_custom_single_template' ]);       
    }

    public function load_custom_archive_template( $tpl ){
        $tpl = $this->plugin_path . 'templates/archive-wph-event.php';
        if( current_theme_supports( 'wph-event' ) ){
          if( is_post_type_archive( 'wph-event' )){
              $tpl = $this->get_template_part_location( 'archive-wph-event.php' );
          }
        }         
        return $tpl;
       }

       public function load_custom_single_template( $tpl ){
        $tpl = $this->plugin_path . 'templates/single-wph-event.php';
        if( current_theme_supports( 'wph-event' ) ){
          if( is_singular( 'mv-event' )){
              $tpl = $this->get_template_part_location( 'single-wph-event.php' );
          }
        }   
          return $tpl;
       }

}