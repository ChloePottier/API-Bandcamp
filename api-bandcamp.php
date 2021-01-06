<?php
/**
 * Plugin Name:       api-bandcamp
 * Description:       Ajouter les articles de bandcamp à Wordpress.
 * Author:            Chloé Pottier
 * Author URI:        https://akaleya.fr/
 * Text Domain:       api-bandcamp
 */
require 'wp_db_9375.php';
$list_my_bands = file_get_contents('https://jfxstore.eu/wp-content/plugins/api-bandcamp/my_bands.json'); 
// $list_my_bands = file_get_contents('my_bands.json'); 
$list_my_bands = json_decode($list_my_bands, true);
$membersBands = $list_my_bands['bands'][2]['member_bands'];
$ArrayCount = count($membersBands);
$arrayBands = [];
for ($i = 0; $i <= ($ArrayCount - 1); $i++) {
    $GLOBALS['band_id'] = $membersBands[$i]['band_id'];
     $subdomain = $membersBands[$i]['subdomain'];
     $band_name = $membersBands[$i]['name'];
    $arrayBands[] = [$subdomain, $GLOBALS['band_id'], $band_name];
}
//get_merch_details
$data = file_get_contents("https://jfxstore.eu/wp-content/plugins/api-bandcamp/get_merch_details_JFX.json");
// $data = file_get_contents("get_merch_details_JFX.json");
$data= json_decode($data);
$count_data = count($data->items) -1;
$post_id = 4900;
for ($i = 0; $i <= $count_data; $i++){
    $member_band_id = $data->items[$i]->member_band_id ;
    $title =  $data->items[$i]->title ;
    $album_title = $data->items[$i]->album_title;
    $price = $data->items[$i]->price;
    $image_url = $data->items[$i]->image_url;
    $count_bands = count($arrayBands) -1;
    for ($i2 = 0; $i2 <= $count_bands; $i2++){
        if($arrayBands[$i2][1] == $member_band_id){
            $band_name = $arrayBands[$i2][2];
        } 
    }
    if ( $member_band_id == 3390641849){
        $band_name = 'Jarring Effects label';
    }
    $arrayProductsAll[] = [$post_id,$member_band_id, $band_name,$album_title,$image_url, $title, $price];  //post_type = 'product'
    $arrayProducts[] = [$post_id,$member_band_id, $band_name,$album_title,$image_url];  //post_type = 'product'
    $post_id++;
   }
function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
} 
$uniqueProducts = unique_multidim_array($arrayProducts,3); 
//insertion en BDD wordpress
$today = date("Y-m-d H:i:s");
$count_products = count($uniqueProducts) - 1;
for ($i5 = 0; $i5 <= $count_products; $i5++) {
    if (isset($uniqueProducts[$i5])) {
        $post_id = $uniqueProducts[$i5][0];
        $post_author = "chloeStoreAdmin";
        if (isset($uniqueProducts[$i5][3]) && $uniqueProducts[$i5][3] !== NULL) :
            $post_title = $uniqueProducts[$i5][3];
        else :
            $post_title = $uniqueProducts[$i5][2] . '-album' . $i5;
        endif;
        $post_excerpt = '';
        $post_status = 'publish';
        if (isset($uniqueProducts[$i5][4]) && $uniqueProducts[$i5][4] !== NULL) :
            $image_url = $uniqueProducts[$i5][4];
        else :
            $image_url = '';
        endif;
        $post_content =  'Image URL = ' . $image_url . 'Id bandcamp = ' . $uniqueProducts[$i5][1];
        $comment_status = 'closed';
        $ping_status = 'closed';
        $post_password = '';
        $post_name = strtolower(
            str_replace(array('.',',','?','!','¡','/','(',')','--'),'',str_replace(array('á','à','â','ã','ª','ä','Á','À','Â','Ã','Ä'),'a',str_replace(array(" ","'",".","&"), '-', $post_title)))
        );  
        $to_ping = '';
        $pinged = '';
        $post_content_filtered = '';
        $post_parent = 0;
        $guid = 'https://jfxstore.eu/?post_type=product&p=' . $post_id;
        $menu_order = 0;
        $post_type = 'product';
        $post_mime_type = '';
        $comment_count = 0;
        global $wpdb;
        $wpdb->insert($tablePosts, array(
            'ID' => '',
            'post_author' => "chloeStoreAdmin",
            'post_date' => $today,
            'post_date_gmt' => $today,
            'post_content' =>  'Image URL = ' . $image_url . 'Id bandcamp = ' . $uniqueProducts[$i5][1],
            'post_title' => $post_title,
            'post_excerpt' => '',
            'post_status' => 'publish',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_password' => '',
            'post_name' =>  $post_name,
            'to_ping' => '',
            'pinged' => '',
            'post_modified' => $today,
            'post_modified_gmt' => $today,
            'post_content_filtered' => '',
            'post_parent' => 0,
            'guid' => 'https://jfxstore.eu/?post_type=product&p=' . $post_id,
            'menu_order' => 0,
            'post_type' => 'product',
            'post_mime_type' => '',
            'comment_count' => 0
        ));
    }
}