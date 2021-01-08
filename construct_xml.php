<?php
// Création du fichier XML
$xml = new XMLWriter(); // Instanciez un objet XMLWriter
$xml->openUri('file:///jfx_bandcamp_products.xml'); // créer dans le fichier ci dessus
$xml->startDocument('1.0', 'utf-8'); // Pour démarrer le document (créer la balise ouverte XML): 
// $xml->writeElement('Product');
// $xml->startElement('Product');
//     $xml->writeElement('Post_id');
//     $xml->startElement('Post_id');
//     $xml->writeCdata($post_id);
// $xml->endElement();

$xml->startElement('Product');
// $xml->writeAttribute('bar', 'baz');
    $xml->startElement('Post_id');
    $xml->writeCdata($post_id);
    $xml->endElement();
$xml->endElement();

