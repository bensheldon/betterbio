<?php

$prefix = "wb_";

/**
 * Post type and meta boxes for inventory type.
 *
 * @author Mark Henderson
 */
add_action( 'init', 'create_podcast_audio_type' );
add_action( 'init', 'create_podcast_audio_taxonomies', 0 );

function create_podcast_audio_type() {
  register_post_type( 'podcast_audio',
    array(
      'labels' => array(
        'name' => __( "Audio Podcasts" ),
        'singular_name' => __( "Audio Podcast" ),
      ),
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'taxonomies' => array("podcast_audio_categories"),
      'supports' => array('podcast_audio_categories','title','editor','thumbnail','comments','revisions')
    )
  );
  flush_rewrite_rules();
}

function create_podcast_audio_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Audio Podcast Tags', 'Audio Podcast Tags' ),
    'singular_name' => _x( 'Audio Podcast', 'Podcast singular name' ),
    'search_items' =>  __( 'Search Audio Podcast Tags' ),
    'all_items' => __( 'All Audio Podcasts' ),
    'parent_item' => __( 'Parent Audio Podcast' ),
    'parent_item_colon' => __( 'Parent Audio Podcast:' ),
    'edit_item' => __( 'Edit Audio Podcast' ), 
    'update_item' => __( 'Update Audio Podcast' ),
    'add_new_item' => __( 'Add New Audio Podcast' ),
    'new_item_name' => __( 'New Audio Podcast' ),
    'menu_name' => __( 'Audio Podcasts' ),
  ); 	

  register_taxonomy('podcast_audio_tags',array('podcast_audio_tag'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'podcast_audio_tag' ),
  ));
}

if (is_admin()) add_action('admin_menu', 'add_podcast_audio_boxen');
function add_podcast_audio_boxen() {
  //add_meta_box("inventory-options", "Wine Options", "wb_inventory_options", "inventory", "normal", "high");
}

/* function wb_inventory_price(){
     global $post;
     $price = get_post_meta($post->ID, 'inventory-price', true);
     echo '<input type="text" name="inventory-price" value="'.$price.'">';
} 
function wb_inventory_size(){
     global $post;
     $size = get_post_meta($post->ID, 'inventory-size', true);
     $size = strlen($size) > 0 ? $size : '750';
     $options = array('375'=>'375mL', '500'=>'500mL', '750'=>'750mL', '1000'=>'1000mL', '1500'=>'1500mL', '3000'=>'3000mL');
     echo '<select name="inventory-size" >';
     foreach($options as $key => $label){
       echo '<option value="'.$key.'" '.($key==$size ? 'selected="selected"' : '').'>'.$label.'</option>';
     }
     echo '</select>';
}

function wb_inventory_discount(){
     global $post;
     $discount = get_post_meta($post->ID, 'inventory-discount', true);
     echo '<input type="checkbox" name="inventory-discount" value="1" '.($discount==1 ? 'checked="checked"' : '').'>
           <label for="inventory-discount">Discountable</label>';
}

function wb_inventory_options(){
     global $post;
     $dropDowns = array(
       'color'   => array('red'=> 'Red', 'white' => 'White', 'pink' => 'Pink', 'orange' => 'Orange'),
       'bubbles' => array('frizzante' => 'Frizzante', 'sparkling' => 'Sparkling'),
       'method'  => array('organic' => 'Organic', 'biodynamic' => 'Biodynamic', 'natural' => 'Natural'),
       'style'   => array('aperitif' => 'Aperitif', 'dessert' => 'Dessert')
     );
     
     foreach ($dropDowns as $meta => $options) {
       $meta_value = get_post_meta($post->ID, 'inventory-'.$meta, true);
       $meta_value = !empty($meta_value) ? $meta_value : '-';
       
       echo '<select name="inventory-'.$meta.'">';
         echo '<option value="-">Select '.$meta.':</option>';
         foreach ($options as $key => $optionVal) {
           echo '<option value="'.$key.'" '.($key==$meta_value ? 'selected="selected"' : '').'>'.$optionVal.'</option>';
         }
       echo '</select>';
     }
}

*/



/* function save_inventory_details($post_id) {
     global $post;
     
     if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
       return $post_id;
         
     if(isset($_POST['post_type']) && ($_POST['post_type'] == "inventory")) {
          $price = $_POST['inventory-price'];
          update_post_meta($post_id, 'inventory-price', $price);
          $origin = $_POST['inventory-origin'];
          update_post_meta($post_id, 'inventory-origin', $origin);
          $year = $_POST['inventory-year'];
          update_post_meta($post_id, 'inventory-year', $year);
          $size = $_POST['inventory-size'];
          update_post_meta($post_id, 'inventory-size', $size);
          $producer = $_POST['inventory-producer'];
          update_post_meta($post_id, 'inventory-producer', $producer);
          $discount = isset($_POST['inventory-discount']) && $_POST['inventory-discount'] == 1 ? 1 : 0;
          update_post_meta($post_id, 'inventory-discount', $discount);
          
          $wineOptions = array('color', 'bubbles', 'method', 'style');
          foreach ($wineOptions as $option) {
          	$key = 'inventory-'.$option;
          	$optionValue = $_POST[$key] == '-' ? '' : $_POST[$key];
          	update_post_meta($post_id, $key, $optionValue);
          }
     }
}
add_action("save_post", "save_inventory_details");  */