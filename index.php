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
    // require 'access-token.php';
    include 'my_bands.php';
    include 'array_products.php';
    echo '<pre><h2>Les produits sans les doublons</h2>';
    print_r($uniqueProducts);
    echo '</pre>';

    echo '<pre><h2>Tous les produits avec tout le détails</h2>';
    print_r($arrayProductsAll);
    echo '</pre>';
    ?>
</body>

</html>