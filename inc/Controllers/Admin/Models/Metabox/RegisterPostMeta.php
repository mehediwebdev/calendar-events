<?php
/**
 * @package GymBuilder
 */
namespace Calendarevents\Inc\Controllers\Admin\Models\Metabox;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}
use Calendarevents\Inc\Controllers\Admin\Models\Metabox\Fields\MetaFields;

class RegisterPostMeta{
    protected static $instance = null;

    // private $fields_obj       = null;
    // public $metaboxes        = array();
    // public $metabox_fields   = array();

    // private $nonce_action     = 'gym-builder_metabox_nonce';
    // private $nonce_field      = 'gym-builder_metabox_nonce_secret';

    public function __construct() {

     //  $this->fields_obj = new MetaFields;
       add_action( 'init', array( $this, 'initialize' ), 12 );
    }

    public static function getInstance() {
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        
        return self::$instance;
    }

    public function initialize() {
        if ( !is_admin() ) return;
        add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
        add_action( 'save_post', array( $this, 'save_post'), 10, 2); 
    }

    public function add_meta_boxes($post){
        add_meta_box(
             'calendar_events_metabox',
             __( 'Select Event Date', 'mv-slider' ),
             array( $this, 'add_inner_meta_boxes' ),
             'wph-event',
             'normal',
             'high'

        );
    }

    public function add_inner_meta_boxes( $post ){
       // require_once( WPH_EVENT_PATH . 'views/wp-events-metabox.php' );

       $meta = get_post_meta( $post->ID );
$link_text = get_post_meta( $post->ID, 'datepicker', true);



?>
<table>
  <tr>
    <th>
        <label for="mv_slider_link_text"><?php esc_html_e( 'Event Date', 'mv-slider' ); ?></label>
    </th>
    <td>
        <input 
           type="text"
           name="datepicker"
           id="datepicker"
           class="regular-text link-text"
           value="<?php echo ( isset($link_text)) ? esc_html($link_text) : '' ; ?>"
        >
    </td>
  </tr>
</table>
<?php
       }


    public function save_post( $post_id ){

        if( isset( $_POST['action'] ) && $_POST['action'] == 'editpost' ){
        $old_link_text  = get_post_meta( $post_id, 'datepicker', true );
        $new_link_text  = $_POST[ 'datepicker' ];

        if( empty($new_link_text)){
          update_post_meta( $post_id, 'datepicker', __( 'Select Event Date', 'mv-slider' )  );
        }else{
          update_post_meta( $post_id, 'datepicker', sanitize_text_field($new_link_text), $old_link_text  );
        }


        }
      }


 
}
