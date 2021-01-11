<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>API Bandcamp</title>
</head>

<body>
    <?php
    // require 'curl.php'; 
    // require 'access-token.php';
    //tableau des groupes
    include 'my_bands.php';
    //tableau des produits par groupe
    include 'array_productsAll.php';

    ?>
    <div class="container-fluid">
        <div class="container">
        <h1>Tous les produits provenant de Bandcamp</h1>
        <div class="row titre black">
            <div class="col band-name">Groupe / label</div>
            <div class="col album_title">Nom produit</div>
            <div class="col title ">Format</div>
            <div class="col price">Prix</div>
        </div>
        <?php include 'array_for_xml.php'; ?>
        </div>
    </div>
    <?php
    include 'bands_xml.php';
    
    ?>
</body>

</html>