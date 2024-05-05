<?php
/**
 * @package GymBuilder
 */
namespace Calendarevents\Inc\Controllers\Admin\Models\Metabox\Fields;

//use GymBuilder\Inc\Controllers\Helpers\Functions;
//use GymBuilder\Inc\Traits\FileLocations;

// class MetaFields{
	


// }


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

