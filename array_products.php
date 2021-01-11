<?php
    $data = file_get_contents("get_merch_details_JFX.json");
    $data= json_decode($data);
    // echo '<pre>';
    // print_r($arrayBands);
    // echo '</pre>'; 
    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';
    $count_data = count($data->items) -1;//longueur tableau
    $arrayProducts = [];
    $post_id = 4900;
    //boucle pour le tableau total
    for ($i = 0; $i <= $count_data; $i++){
        // $member_band_id = $data->items[$i]->member_band_id ;// a comparer avec band_id pour le nom de l'artiste
        // $price = $data->items[$i]->price;
        // $image_url = $data->items[$i]->image_url;
        
        //tableau des groupes dans my_bands.php : trouver les nom par leur member_band_id
        // $count_bands = count($arrayBands) -1;
        // for ($i2 = 0; $i2 <= $count_bands; $i2++){
            // if($arrayBands[$i2][1] == $member_band_id){
            //     $groupe = $arrayBands[$i2][2];
            // } 
            // // if ($member_band_id == 3390641849) {
            //     $groupe = 'Jarring Effects label';
            // }
        // }
      
        
        

            for ($i = 0; $i <= $count_data; $i++) {
                if (isset($data->items[$i]->album_title) && $data->items[$i]->album_title === $album_title) {
                    $price = $data->items[$i]->price;
                    $title =  $data->items[$i]->title ;
                    // $album_title = '';
                    if ($data->items[$i]->album_title === null):
                    $album_title = $groupe.'-produit'; else:
                    $album_title = $data->items[$i]->album_title;
                    endif;
                    // $album_title = $data->items[$i]->album_title;
                $arrayProducts[$album_title]['variants'] += [$title => ['format' => $title, 'prix' => $price]];  //post_type = 'product'
                } else {
                    $member_band_id = $data->items[$i]->member_band_id ;


// trouver un moyen de mettre le nom des groupes dans $groupe. le probleme c'est que le nom est dans un autre tableau
//avec mon ancienne technique il enregistrait le 1 nom et ensuite reste dans la boucle for donc même nom de groupe partout
// retrouver nom du groupe avec id member dans array Bands
                    $groupe = $member_band_id;
                    $price = $data->items[$i]->price;
                    $image_url = $data->items[$i]->image_url;
                    $title =  $data->items[$i]->title ;
                    if ($data->items[$i]->album_title === null):
                    $album_title = $groupe.'-produit'; else:
                    $album_title = $data->items[$i]->album_title;
                    endif;
                    $arrayProducts[$album_title] = ['post_id' => $post_id, 'band_id' => $member_band_id, 'groupe' => $groupe,'product_name' => $album_title,'image_url'=> $image_url, 'variants' => [$title => ['format' => $title, 'prix' => $price]]];
                    $post_id++;
                }
            }
       
        // $arrayProductsAll[] = [$post_id,$member_band_id, $groupe,$album_title,$image_url, $title, $price];  //post_type = 'product'

       } 
       echo '<pre><h2>Tous les produits avec tout le détails</h2>';
       print_r($arrayProducts);
       echo '</pre>';
include 'construct_xml.php';
