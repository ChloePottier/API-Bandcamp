<?php
require 'array_productsAll.php';
$count_data = count($arrayProductsAll) - 1;
$post_id = 4900;
for ($i = 0; $i <= $count_data; $i++) {
    $member_band_id = $arrayProductsAll[$i][0] ;// a comparer avec band_id pour le nom de l'artiste
    $band_name = $arrayProductsAll[$i][1];
    $title =  $arrayProductsAll[$i][4] ;
    $image_url = $arrayProductsAll[$i][3];
    $price = $arrayProductsAll[$i][5];

    if (isset($arrayProductsAll[$i][2]) && $arrayProductsAll[$i][2] === $album_title) {
        if ($arrayProductsAll[$i][2] === null):
        $album_title = $band_name.'-produit';
        else:
        $album_title = $arrayProductsAll[$i][2];
        endif;
        $array_for_xml[$album_title]['variants'] += [$title => ['format' => $title, 'prix' => $price]];  //post_type = 'product'
    } else {     
        if ($arrayProductsAll[$i][2] === null):
        $album_title = $band_name.'-produit';
        else:
        $album_title = $arrayProductsAll[$i][2];
        endif;
        $array_for_xml[$album_title] = ['post_id' => $post_id, 'band_id' => $member_band_id,'groupe' => $band_name, 'product_name' => $album_title,'image_url'=> $image_url, 'variants' => [ $title => ['format' => $title, 'price' => $price]]];
        $post_id++;
    }

}
// var_dump($array_for_xml);
echo '<pre><h2>array for xml</h2>';
print_r($array_for_xml);
echo '</pre>';
