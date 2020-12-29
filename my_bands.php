<?php
    $list_my_bands = file_get_contents("http://localhost/api-bandcamp/my_bands.json"); //
    // // on décode le fichier json dans une var
    $list_my_bands = json_decode($list_my_bands, true);
    echo "<h3>Affichage du tableau avec la boucle for</h3>";
    $membersBands = $list_my_bands['bands'][2]['member_bands'];
    $ArrayCount = count($membersBands);// on compte le nombre d'entrée dans le tableau
    // echo '<pre>';
    // print_r($membersBands);
    // echo '</pre>';
    //création du nouveau tableau des résultats
    $arrayBands = [];
    for ($i = 0; $i <= ($ArrayCount - 1); $i++) {
        
        $GLOBALS['band_id'] = $membersBands[$i]['band_id'];
         $subdomain = $membersBands[$i]['subdomain'];
         $band_name = $membersBands[$i]['name'];
         //création du nouveau tableau
        $arrayBands[] = [$subdomain, $GLOBALS['band_id'], $band_name];
    }
    // echo $arrayBands[11]; //914283197 High tone
    // var_dump($arrayBands);
    ?>