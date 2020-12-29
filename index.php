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
    echo '<pre>';
    print_r($arrayBands);
    echo '</pre>'; 
    $count_data = count($data->items) -1;//longueur tableau
    $arrayProducts = [];
    for ($i = 0; $i <= $count_data; $i++){
        $member_band_id = $data->items[$i]->member_band_id ;// a comparer avec band_id pour le nom de l'artiste
        $title =  $data->items[$i]->title ; // attribut du produit ???
        $album_title = $data->items[$i]->album_title;
        $price = $data->items[$i]->price;
        $image_url = $data->items[$i]->image_url;
        echo '<img src="'.$image_url.'"/><br />'; //img article
        // echo $arrayBands[0][0];
        $count_bands = count($arrayBands) -1;
        for ($i2 = 0; $i2 <= $count_bands; $i2++){
            if($arrayBands[$i2][1] == $member_band_id){
                $band_name = $arrayBands[$i2][2];
                echo '<h1>Artiste :'. $band_name .'</h1>';
            } 
        }
        if ( $member_band_id == 3390641849){
            $band_name = 'Jarring Effects label';
            echo '<h1>Artiste : '.$band_name.'</h1>';
        }
        echo 'Member id : '. $member_band_id .'<br />' ;// a comparer avec band_id pour le nom de l'artiste
        //echo 'Titre : '. $title .'<br />' ; // attribut du produit ???
        echo 'Titre de l\'album : '. $album_title .'<br />' ;
        echo 'Prix : '. $price .' € <br />' ;
        echo '<img src="'.$image_url.'"/>'; //img article
        echo '<br />********************<br />';
        $arrayProducts[] = [$member_band_id, $band_name,$album_title,$price,$image_url ];
    }
    echo '<h2>tableau pour BDD</h2>';
    echo '<pre>';
    print_r($arrayProducts);
    echo '</pre>';         ?>
</body>

</html>