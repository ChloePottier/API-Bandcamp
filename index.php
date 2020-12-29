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
    // include 'my_bands.php';

    $data = file_get_contents("get_merch_details_JFX.json");
    $data= json_decode($data);
    echo '<pre>';
    // print_r($data->items[0]->title);//title = totebag 
    print_r($data);
    echo '</pre>'; 
    $count_data = count($data->items) -1;//longueur tableau

    for ($i = 0; $i <= $count_data; $i++){
        $member_band_id = $data->items[$i]->member_band_id ;// a comparer avec band_id pour le nom de l'artiste
        $title =  $data->items[$i]->title ; // attribut du produit ???
        $album_title = $data->items[$i]->album_title;
        $price = $data->items[$i]->price;
        $image_url = $data->items[$i]->image_url;

        echo '<img src="'.$image_url.'"/>'; //img article
        echo 'Member id : '. $member_band_id .'<br />' ;// a comparer avec band_id pour le nom de l'artiste
        echo 'Titre : '. $title .'<br />' ; // attribut du produit ???
        echo 'Titre de l\'album : '. $album_title .'<br />' ;
        echo 'Prix : '. $price .' € <br />' ;
        echo '<img src="'.$image_url.'"/>'; //img article
        echo '<br />********************<br />';
    }
    ?>

</body>

</html>