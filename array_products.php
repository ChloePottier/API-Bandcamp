<?php
    $data = file_get_contents("get_merch_details_JFX.json");
    $data= json_decode($data);
    // echo '<pre>';
    // print_r($arrayBands);
    // echo '</pre>'; 
    $count_data = count($data->items) -1;//longueur tableau
    $arrayProducts = [];
    $post_id = 4800;
// Création du fichier XML
$xml = new XMLWriter(); // Instanciez un objet XMLWriter
$xml->openUri('file:///jfx_bandcamp_products.xml'); // créer dans le fichier ci dessus
$xml->startDocument('1.0', 'utf-8'); // Pour démarrer le document (créer la balise ouverte XML): 
    //boucle pour le tableau total
    for ($i = 0; $i <= $count_data; $i++){
        // $xml->writeAttribute('bar', 'baz');
            
       
        $member_band_id = $data->items[$i]->member_band_id ;// a comparer avec band_id pour le nom de l'artiste
        $price = $data->items[$i]->price;
        $image_url = $data->items[$i]->image_url;

        //tableau des groupes dans my_bands.php : trouver les nom par leur member_band_id
        $count_bands = count($arrayBands) -1;
        for ($i2 = 0; $i2 <= $count_bands; $i2++){
            if($arrayBands[$i2][1] == $member_band_id){
                $band_name = $arrayBands[$i2][2];
            } 
        }
        if ( $member_band_id == 3390641849){
            $band_name = 'Jarring Effects label';
        }

        for ($i = 0; $i <= $count_data; $i++) {
            $xml->startElement('Product');

            if (isset($data->items[$i]->album_title) && $data->items[$i]->album_title === $album_title) {
                $price = $data->items[$i]->price;
                $title =  $data->items[$i]->title ;
                $album_title = '';
                $album_title = $data->items[$i]->album_title;
                $arrayProducts[$album_title]['variants'] += [$title => ['format' => $title, 'prix' => $price]];  //post_type = 'product'
                // include 'construct_xml.php';
                $xml->startElement('Post_id');//ouverture de la balise
                    $xml->writeCdata($post_id);//Data de la balise
                $xml->endElement();// fermeture de la balise
                $xml->startElement('Band_name');
                    $xml->writeCdata($band_name);
                $xml->endElement();
                $xml->startElement('Product_name');
                    $xml->writeCdata($album_title);
                $xml->endElement();
                $xml->startElement('Category');
                    $xml->writeCdata($band_name);
                $xml->endElement();
                $xml->startElement('Img_url');
                    $xml->writeCdata($image_url);
                $xml->endElement();
                $xml->startElement('Extended_Xml_Attributes');
                    $xml->startElement('Variants');
                        $xml->startElement('Variant');
                            $xml->startElement('Format');
                                $xml->writeCdata($title);
                            $xml->endElement();
                            $xml->startElement('Price');
                                $xml->writeCdata($price);
                            $xml->endElement();
                        $xml->endElement();
                    $xml->endElement();
                $xml->endElement();

            } else {
                $member_band_id = $data->items[$i]->member_band_id ;// a comparer avec band_id pour le nom de l'artiste
                $price = $data->items[$i]->price;
                $image_url = $data->items[$i]->image_url;
                $title =  $data->items[$i]->title ;
                $album_title = $data->items[$i]->album_title;
                $arrayProducts[$album_title] = ['post_id' => $post_id, 'band_id' => $member_band_id, 'groupe' => $band_name,'product_name' => $album_title,'image_url'=> $image_url, 'variants' => [$title => ['format' => $title, 'prix' => $price]]];
                // include 'construct_xml.php';
                $xml->startElement('Post_id');//ouverture de la balise
                    $xml->writeCdata($post_id);//Data de la balise
                $xml->endElement();// fermeture de la balise
                $xml->startElement('Band_name');
                    $xml->writeCdata($band_name);
                $xml->endElement();
                $xml->startElement('Product_name');
                    $xml->writeCdata($album_title);
                $xml->endElement();
                $xml->startElement('Category');
                    $xml->writeCdata($band_name);
                $xml->endElement();
                $xml->startElement('Img_url');
                    $xml->writeCdata($image_url);
                $xml->endElement();
                $xml->startElement('Extended_Xml_Attributes');
                    $xml->startElement('Variants');
                        $xml->startElement('Variant');
                            $xml->startElement('Format');
                                $xml->writeCdata($title);
                            $xml->endElement();
                            $xml->startElement('Price');
                                $xml->writeCdata($price);
                            $xml->endElement();
                        $xml->endElement();
                    $xml->endElement();
                $xml->endElement();

                $post_id++;
                
            }
            $xml->endElement();

        }
        // $arrayProductsAll[] = [$member_band_id, $band_name,$album_title,$image_url, $title, $price];  //post_type = 'product'
        ?>

        <?php
       } 
// <Product>
//  <Post_id>$post_id</Post_id>
//  <Band_name>$band_name</Band_name>
// 	<Product_Name>$album_title</Product_Name>
// 	<Category>High Tone</Category>
// 	<Image_URL>$image_url</Image_URL>
// 	<Extended_Xml_Attributes>
// 		<variants>
// 			<variant>
// 				<format>$title</format>
// 				<price>$price</price>
// 			<variant/>
// 		</variants>
// 	</Extended_Xml_Attributes>
// </Product>

    ?>