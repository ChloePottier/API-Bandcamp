<?php
$today = date("Y-m-d H:i:s");
$count_products = count($uniqueProducts) - 1;
for ($i5 = 0; $i5 <= $count_products; $i5++) {
    if (isset($uniqueProducts[$i5])) {
        $post_id = $uniqueProducts[$i5][0];
        $post_author = "chloeStoreAdmin";
        if (isset($uniqueProducts[$i5][3]) && $uniqueProducts[$i5][3] !== null) :
            $post_title = $uniqueProducts[$i5][3]; else :
            $post_title = $uniqueProducts[$i5][2] . '-album' . $i5;
        endif;
        $post_excerpt = '';
        $post_status = 'publish';
        if (isset($uniqueProducts[$i5][4]) && $uniqueProducts[$i5][4] !== null) :
            $image_url = $uniqueProducts[$i5][4]; else :
            $image_url = '';
        endif;
        $post_content =  'Image URL = ' . $image_url . 'Id bandcamp = ' . $uniqueProducts[$i5][1];
        $comment_status = 'closed';
        $ping_status = 'closed';
        $post_password = '';
        // $post_name = $post_title;
        $post_name = strtolower(
            str_replace(array('.',',','?','!','¡','/','(',')','--'),'',str_replace(array('á','à','â','ã','ª','ä','Á','À','Â','Ã','Ä'),'a',str_replace(array(" ","'",".","&"), '-', $post_title)))
        );        
        echo $post_name. '<br />';
        $to_ping = '';
        $pinged = '';
        $post_content_filtered = '';
        $post_parent = 0;
        $guid = 'https://jfxstore.eu/?post_type=product&p=' . $post_id;
        $menu_order = 0;
        $post_type = 'product';
        $post_mime_type = '';
        $comment_count = 0;
        // $tab = array(
        //     'ID' => $post_id,
        //     'post_author' => "chloeStoreAdmin",
        //     'post_date' => $today,
        //     'post_date_gmt' => $today,
        //     'post_content' =>  'Image URL = ' . $image_url . 'Id bandcamp = ' . $uniqueProducts[$i5][1],
        //     'post_title' => $post_title,
        //     'post_excerpt' => '',
        //     'post_status' => 'publish',
        //     'comment_status' => 'closed',
        //     'ping_status' => 'closed',
        //     'post_password' => '',
        //     'post_name' =>  $post_name,
        //     'to_ping' => '',
        //     'pinged' => '',
        //     'post_modified' => $today,
        //     'post_modified_gmt' => $today,
        //     'post_content_filtered' => '',
        //     'post_parent' => 0,
        //     'guid' => 'https://jfxstore.eu/?post_type=product&p=' . $post_id,
        //     'menu_order' => 0,
        //     'post_type' => 'product',
        //     'post_mime_type' => '',
        //     'comment_count' => 0
        // );
        // echo '<pre>';
        // print_r($tab);
        // echo '</pre>';
    

        // $sqlInsertPost = "INSERT INTO $wpdb->posts VALUES (:ID, :post_author, :post_date, :post_date_gmt, :post_content, :post_title, :post_excerpt, :post_status, :comment_status, :ping_status,:post_password, :post_name, :to_ping, :pinged, :post_modified, :post_modified_gmt, :post_content_filtered, :post_parent, :guid , :menu_order, :post_type, :post_mime_type, :comment_count)";
        // $reqInsertPost = $wpdb->prepare($sqlInsertPost);
        // $reqInsertPost->execute($tab);

    }}