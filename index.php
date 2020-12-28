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
    // print_r($data);
    echo '</pre>'; 
    $count_data = count($data->items) -1;//longueur tableau

    for ($i = 0; $i <= $count_data; $i++){
        echo $data->items[$i]->title;
    }
   


    ?>

</body>

</html>