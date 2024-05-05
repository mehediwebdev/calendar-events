<?php
/**
 * @package WphEvent
 */

namespace Calendarevents\Inc\Controllers\Admin\Models\Posts;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

class  RegisterPostType{

    public function register() {
        add_action('init', [$this, 'create_post_type']);
    }

    public function create_post_type(){
        register_post_type(
            'wph-event',
            array(
                'label' => esc_html__( 'Event', 'calendar-events' ),
                'description' => esc_html__( 'Sliders', 'calendar-events' ),
                'labels' => array(
                    'name' => esc_html__( 'Events', 'calendar-events' ),
                    'singular_name' => __( 'Event', 'calendar-events' ),
                    'all_items'           => esc_html__( 'All Events', 'calendar-events' ),
                    'add_new'             => esc_html__( 'Add New Event', 'calendar-events' ),
                    'edit_item'           => esc_html__( 'Edit Event', 'calendar-events' ),
                    'featured_image'      => esc_html__( 'Event image', 'calendar-events' ),
                    'set_featured_image'  => esc_html__( 'Set Event image', 'calendar-events' ),
                   
                ),
                'public' => true,	
              //   'rewrite'     => array( 'slug' => '' ),
                'supports' => array('title', 'editor', 'thumbnail'),
                'hierarchical'        => false,
                'show_ui'             => true,
                'show_in_menu'        => true,                 
                'menu_position'       => 5,
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => true,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'show_in_rest'        => true,
                'menu_icon'           => 'dashicons-calendar',
            )
        );
     }

}