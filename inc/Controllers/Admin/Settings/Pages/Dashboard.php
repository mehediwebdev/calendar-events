<?php
/**
 * @package CalendarEvents
 */

 namespace Calendarevents\Inc\Controllers\Admin\Settings\Pages;
 use \Calendarevents\Inc\Base\BaseController;
use \Calendarevents\Inc;
use \Calendarevents\Inc\Base\Enqueue;

class Dashboard extends Enqueue {
    public function register() {
        add_action('admin_menu', [ $this, 'wph_event_add_dashboard_page'] );
    }

    public function wph_event_add_dashboard_page() {
        // Add the submenu page under the custom post type menu
        add_submenu_page(
            'edit.php?post_type=wph-event', // Parent menu slug (URL)
            'Event Dashboard',     // Page title
            'Event Dashboard',     // Menu title
            'manage_options',      // Capability required to access the page
            'wph_event_dashboard', // Menu slug
            [ $this, 'wph_event_dashboard_page'] // Function to display the page
        );
    }
   
    public function wph_event_dashboard_page() {
        echo '<div class="wrap">
        <div id="wpebcalender_root">
            <div id="calendar"></div>          
        </div>
    </div>'; ?>

<script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    initialDate: '2024-05-01',
                    navLinks: true, // can click day/week names to navigate views
                    businessHours: true, // display business hours
                    editable: true,
                    selectable: true,
                    events: [
                        <?php $args = array(
                            'post_type' => 'wph-event',
                            'posts_per_page' => -1,
                        );
                        $events_query = new \WP_Query($args);
                        if ($events_query->have_posts()) {
                            while ($events_query->have_posts()) {
                                $events_query->the_post();
                                $title = get_the_title();
                                $start_date = get_post_meta(get_the_ID(), 'datepicker', true);
                                $formatted_date = date("Y-m-d", strtotime($start_date));
                                $start_date2 = get_post_meta(get_the_ID(), 'datepicker2', true);
                                $formatted_date2 = date("Y-m-d", strtotime($start_date2));
                                $url = get_the_permalink();
                                ?> {
                                    title: '<?php echo addslashes($title); ?>',
                                    url: '<?php echo addslashes($url); ?>',
                                    start: '<?php echo addslashes($formatted_date); ?>',
                                    end: '<?php echo addslashes($formatted_date2); ?>',
                                },
                            <?php }
                            wp_reset_postdata();
                        } ?>
                    ]
                });
                calendar.render();
            });
        </script>
      <?php }
    }

