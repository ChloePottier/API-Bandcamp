<?php
$count_data = count($arrayProductsAll) - 1;
$post_id = 4900;
for ($i = 0; $i <= $count_data; $i++) {
    echo '<div class="row border-bottom">'; 

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
        echo '<div class="col band-name grey"></div>';
        echo '<div class="col album_title grey"></div>';
        echo '<div class="col title ">'.$title.'</div>';
        echo '<div class="col price">'.$price.' €</div>';
    } else {     
        if ($arrayProductsAll[$i][2] === null):
        $album_title = $band_name.'-produit';
        else:
        $album_title = $arrayProductsAll[$i][2];
        endif;
        $array_for_xml[$album_title] = ['post_id' => $post_id, 'band_id' => $member_band_id,'groupe' => $band_name, 'product_name' => $album_title,'image_url'=> $image_url, 'variants' => [ $title => ['format' => $title, 'prix' => $price]]];
        echo '<div class="col band-name">'.$band_name.'</div>';
        echo '<div class="col album_title">'.$album_title.'</div>';
        echo '<div class="col title">'.$title.'</div>';
        echo '<div class="col price">'.$price.' €</div>';


        $post_id++;
    }
echo '</div>';
}
include 'construct_xml.php';
// echo '<pre><h2>Tous les produits provenant de Bandcamp</h2>';
// print_r($array_for_xml);
// echo '</pre>';

