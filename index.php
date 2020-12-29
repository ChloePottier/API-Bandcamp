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
    $post_id = 4800;

    for ($i = 0; $i <= $count_data; $i++){
        $member_band_id = $data->items[$i]->member_band_id ;// a comparer avec band_id pour le nom de l'artiste
        $title =  $data->items[$i]->title ; // attribut du produit ???
        $album_title = $data->items[$i]->album_title;
        $price = $data->items[$i]->price;
        $image_url = $data->items[$i]->image_url;
        $post_id++;

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
        echo 'Titre : '. $title .'<br />' ; // attribut du produit ???
        echo 'Titre de l\'album : '. $album_title .'<br />' ;
        echo 'Prix : '. $price .' € <br />' ;
        echo '<img src="'.$image_url.'"/>'; //img article
        echo '<br />********************<br />';
        if( !isset($album_title)){  //post_type = 'product'
            $arrayProducts[] = [$post_id,$member_band_id, $band_name,$album_title, $title, 'ajout du produit']; // tableau des produits qui n'existe qu'en 1 seul format
        } else{
            $arrayFormatSupp[] = [$post_id,$band_name, $album_title, $title, 'autre formats']; // tableau des produits qui existe en plusieurs formats
        }
        // $arrayProducts[] = [$post_id,$member_band_id, $band_name,$album_title,$price, $title];  //post_type = 'product'

        $post_parent = $post_id;
        $post_id++;
        $arrayAttachment[] = [$post_id,$image_url,$post_parent]; // post-type = 'attachment' -> les url des images bandcamp. si ca marche pas dans média, remettre attachment dans le tableau pr
        // $posts[] = [$post_id,$member_band_id,$album_title]; //champs à insérer dans la table wp_posts
        // $post_meta_details[] = ['post-id' => $post_id , 'meta' => [$band_name,$price,$image_url,$title]]; //champs à insérer dans la table wp_post_meta


        // revoir postmeta à cause de $arrayFormatSupp (rajouté à la fin , comporte tous ce qui existe en plusieurs fois)
        $post_meta[] = [
            [$post_id,$band_name],
            [$post_id,$price], //meta_key = _price
            [$post_id,$title]
        ];
    }
    echo '<h2>Array Products : post-type "product"</h2>';
    echo '<pre>';
    print_r($arrayProducts);
    echo '</pre>'; 
    echo '<h2>Array Attachment : post-type "attachment", lié à un post parent(product)</h2>';
    echo '<pre>';
    print_r($arrayAttachment);
    echo '</pre>';    
    
    echo '<h2>Array autre formats (ajout manuel)</h2>';
    echo '<pre>';
    print_r($arrayFormatSupp );
    echo '</pre>';
    // include 'insertion-BDD.php';
  
    ?>
</body>

</html>