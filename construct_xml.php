<?php
// // Création du fichier XML
$xml = new XMLWriter(); // Instanciez un objet XMLWriter
$xml->openUri('file:///jfx_bandcamp_products.xml'); // créer dans le fichier ci dessus
$xml->startDocument('1.0', 'utf-8'); // Pour démarrer le document (créer la balise ouverte XML)
foreach ($arrayProducts as $v1) {
    $xml->startElement('Product');
        $xml->startElement('Post_id');//ouverture de la balise
            $xml->writeCdata($v1['post_id']);//Data de la balise
        $xml->endElement();// fermeture de la balise
        $xml->startElement('Band_name');//ouverture de la balise
            $xml->writeCdata($v1['groupe']);//Data de la balise
        $xml->endElement();
        $xml->startElement('Product_name');//ouverture de la balise
            $xml->writeCdata($v1['product_name']);//Data de la balise
        $xml->endElement();
        $xml->startElement('Image_url');//ouverture de la balise
            $xml->writeCdata($v1['image_url']);//Data de la balise
        $xml->endElement();
        $xml->startElement('Category');
            $xml->writeCdata($v1['groupe']);
        $xml->endElement();
    foreach ($v1 as $v2) {
         if(is_array($v2)){
            $xml->startElement('Extended_Xml_Attributes');
            $xml->startElement('Variants');
            // var_dump($v2);
            // echo'<br />';
            foreach($v2 as $v3){
                $xml->startElement('Variant');
                // echo "$v3\n <br />";
                // var_dump($v3);
                echo'<br />';
                $xml->startElement('Format');
                    $xml->writeCdata($v3['format']);
                    $xml->endElement();
                    $xml->startElement('Price');
                    $xml->writeCdata($v3["prix"]);
                    $xml->endElement();//end price
                $xml->endElement();
            }
            $xml->endElement();
            $xml->endElement(); 
        }          
    }
    $xml->endElement();
    echo'<br /><br />';
}
// foreach ($arrayProducts as $key => $value) {
//     $xml->startElement('Product');
//     // $xml->writeAttribute('bar', 'baz');
//     $xml->startElement('Post_id');//ouverture de la balise
//         $xml->writeCdata($post_id);//Data de la balise
//     $xml->endElement();// fermeture de la balise
//     $xml->startElement('Band_name');
//     $xml->writeCdata($band_name);
//     $xml->endElement();
//     $xml->startElement('Product_name');
//     $xml->writeCdata($album_title);
//     $xml->endElement();
//     $xml->startElement('Category');
//     $xml->writeCdata($band_name);
//     $xml->endElement();
//     $xml->startElement('Img_url');
//     $xml->writeCdata($image_url);
//     $xml->endElement();
//     $xml->startElement('Extended_Xml_Attributes');
//     $xml->startElement('Variants');
//     $xml->startElement('Variant');
//     $xml->startElement('Format');
//     $xml->writeCdata($title);
//     $xml->endElement();
//     $xml->startElement('Price');
//     $xml->writeCdata($price);
//     $xml->endElement();//end price
//     $xml->endElement();//Variant
//     $xml->endElement();//Variants
//     $xml->endElement();//Extended_Xml_Attributes
//     $xml->endElement();//end Product
// }
