<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Bandcamp</title>
</head>

<body>
    <?php
    require 'curl.php'; 
    ?>
    <h2>my_bands</h2>
    
      <h2>get_merch details</h2>
    <?php
    $list_merch_details = file_get_contents("http://localhost/api-bandcamp/get_merch_details_JFX.json"); //
    // // on décode le fichier json dans une var
    $list_merch_details = json_decode($list_merch_details, true);
    
    // var_dump($list_merch_details); 
    echo'<pre>';
    print_r($list_merch_details);
    echo '</pre>';

    echo "<h3>Affichage du tableau avec la boucle for</h3>";
    // $membersBands = $list_merch_details['bands'][2]['member_bands'];
    // $ArrayCount = count($membersBands);// on compte le nombre d'entrée dans le tableau
    ?>

</body>

</html>