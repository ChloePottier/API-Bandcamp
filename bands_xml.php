<?php
$xml = new XMLWriter(); // Instanciez un objet XMLWriter
$xml->openUri('file:///jfx_bandcamp_artist.xml'); // créer dans le fichier ci dessus
$xml->startDocument('1.0', 'utf-8'); // Pour démarrer le document (créer la balise ouverte XML)
$xml->startElement('root');
foreach ($arrayBands as $v1) {
    $xml->startElement('Product');
        $xml->startElement('band_id');//ouverture de la balise
        $xml->writeCdata($v1[1]);//Data de la balise
        $xml->endElement();
        $xml->startElement('band_name');//ouverture de la balise
        $xml->writeCdata($v1[2]);//Data de la balise
        $xml->endElement();
    $xml->endElement();
}
$xml->endElement();// fermeture de la balise

?>