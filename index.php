<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Bandcamp</title>
</head>

<body>
    <?php
    // require 'curl.php'; 
    require 'access-token.php';
    include 'my_bands.php';

    $data = file_get_contents("get_merch_details_JFX.json");
    $data= json_decode($data);
    // echo '<pre>';
    // print_r($arrayBands);
    // echo '</pre>'; 
    $count_data = count($data->items) -1;//longueur tableau
    $arrayProducts = [];
    $post_id = 4800;
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
        // echo 'Member id : '. $member_band_id .'<br />' ;// a comparer avec band_id pour le nom de l'artiste
        // echo 'Titre : '. $title .'<br />' ; // attribut du produit ???
        // echo 'Titre de l\'album : '. $album_title .'<br />' ;
        // echo 'Prix : '. $price .' € <br />' ;
        // echo '<img src="'.$image_url.'"/>'; //img article
        // echo '<br />********************<br />';

        //tableau total
        $arrayProductsAll[] = [$post_id,$member_band_id, $band_name,$album_title,$image_url, $title, $price];  //post_type = 'product'
        // tableau dont il faudra suppr les doublons
        $arrayProducts[] = [$post_id,$member_band_id, $band_name,$album_title,$image_url];  //post_type = 'product'
        $post_id++;
       }
//fonnction suppression doublons
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
  echo '<pre><h2>Les produits sans les doublons</h2>';
    print_r($uniqueProducts);
    echo '</pre>';

    echo '<pre><h2>Tous les produits avec tout le détails</h2>';
    print_r($arrayProductsAll);
    echo '</pre>';
    ?>
</body>

</html>