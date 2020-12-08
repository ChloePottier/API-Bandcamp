<?php
    $list_my_bands = file_get_contents("http://localhost/api-bandcamp/my_bands.json"); //
    // // on décode le fichier json dans une var
    $list_my_bands = json_decode($list_my_bands, true);
    
    // var_dump($list_my_bands); 
    // echo'<pre>';
    // print_r($list_my_bands);
    // echo '</pre>';

    echo "<h3>Affichage du tableau avec la boucle for</h3>";
    $membersBands = $list_my_bands['bands'][2]['member_bands'];
    $ArrayCount = count($membersBands);// on compte le nombre d'entrée dans le tableau
    //echo $ArrayCount; // 25 au 08 12 2020
    // echo '<pre>';
    // print_r($membersBands);
    // echo '</pre>';
    for ($i = 0; $i <= ($ArrayCount - 1); $i++) {
         echo  "<h4>" .$membersBands[$i]['name'] . "</h4> Id du groupe = " . $membersBands[$i]['band_id'] . "<br />";
         $subdomain = $membersBands[$i]['subdomain'];
         $band_id = $membersBands[$i]['band_id'];
         $band_name = $membersBands[$i]['name'];
         //création du nouveau tableau
        $arrayBands =[$subdomain, $band_id, $band_name];
        // var_dump($arrayBands);

    }
       

    ?>