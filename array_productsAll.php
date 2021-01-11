<?php
    $data = file_get_contents("get_merch_details_JFX.json");
    $data= json_decode($data);
    $count_data = count($data->items) -1;//longueur tableau
    $arrayProducts = [];
    $post_id = 4900;
    //boucle pour le tableau total
    for ($i = 0; $i <= $count_data; $i++){
        $member_band_id = $data->items[$i]->member_band_id ;// a comparer avec band_id pour le nom de l'artiste
        $title =  $data->items[$i]->title ; // attribut du produit ???
        $album_title = $data->items[$i]->album_title;
        $price = $data->items[$i]->price;
        $image_url = $data->items[$i]->image_url;
        //tableau des groupes dans my_bands.php : trouver les nom par leur member_band_id
        $count_bands = count($arrayBands) -1;
        for ($i2 = 0; $i2 <= $count_bands; $i2++){
            if($arrayBands[$i2][1] == $member_band_id){
                $band_name = $arrayBands[$i2][2];
            } 
        }
        if ( $member_band_id == 3390641849){
            $band_name = 'Jarring Effects label';
        }
        //tableau total
        $arrayProductsAll[] = [$member_band_id, $band_name,$album_title,$image_url, $title, $price]; 
        $post_id++;
       }
       echo '<pre><h2>Tous les produits provenant de Bandcamp</h2>';
       print_r($data);
       echo '</pre>';
    ?>