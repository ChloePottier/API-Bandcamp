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
    ?>
    <h2>my_bands</h2>
    <?php
    $list_my_bands = file_get_contents("http://localhost/api-bandcamp/my_bands.json"); //
    // // on décode le fichier json dans une var
    $list_my_bands = json_decode($list_my_bands, true);
    // var_dump($list_my_bands); 
    // echo'<pre>';
    // print_r($list_my_bands);
    // echo '</pre>';

    echo "affichage du tableau avec la boucle for<br/>";
    $membersBands = $list_my_bands['bands'][2]['member_bands'];
 ;
    $ArrayCount = count($membersBands);
    // echo $ArrayCount; // =25
    for ($i = 0; $i <= $ArrayCount - 1; $i++) { // on compte la taille du tableau1 = 4
        // $i est égale à l'index 0; $i inférieur ou égale à la taille du tableau - 1
        //(pour que l'on puisse aller jusqu' l'index 3 sinon on aura une ligne en plus); on incrément de 1.
        // La boucle va donc traiter chaque ligne du tableau et va s'arrêter à la dernière ligne, index 3
        echo $i.'<br />';
        foreach ($membersBands as $key => $key2){
            echo "<br />";

            foreach($key2 as $key3 => $value){
                
                echo "{$key3} => {$value} <br />";
            }
        }
    }
   // echo'<pre>';
    // print_r($membersBands);
    // echo '</pre>'    ?>

</body>

</html>