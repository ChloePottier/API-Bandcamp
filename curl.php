<h2>my_bands</h2>
<?php
require 'access-token.php'; //access token, refresh_token, client_id et client_secret
$curl = curl_init('https://bandcamp.com/api/account/1/my_bands');//initise une session cURL
$headr = array(); //On met les infos à transmettre par le header dans un tableau
$headr[] = 'Content-length: 0';
$headr[] = 'Content-type: application/x-www-form-urlencoded';//format. ne pas mettre json
$headr[] = 'Authorization: Bearer ' . $accesstoken; // authorization pour la connexion
$headr[] = 'Accept: application/json';
$headr[] = 'grant_type: client_credentials'; // important
$headr[] = 'client_id: ' . $client_id;
$headr[] = 'client_secret:' . $client_secret;
//ajout d'options cURL
curl_setopt($curl, CURLOPT_HTTPHEADER, $headr); // tableau $headr est envoyé au header avec la méthode http
curl_setopt($curl, CURLOPT_POST, true); // cURL post les données du header
$data = curl_exec($curl);//exécute une session cURl (la requête)



curl_close($curl); // on ferme la session cURL
// include 'my_bands.php';


?>






<h2>get_merch_details</h2>
<?php
// require 'access-token.php';
$curl2 = 'https://bandcamp.com/api/merchorders/1/get_merch_details';
//tableaux des paramètres de la requête
$data2 = array("start_time" => "2016-01-01","band_id" => 3390641849 );//pour jarring effects
//les données doivent être encodé au format json
$postdata = json_encode($data2);
//initialisation de curl
$ch = curl_init($curl2);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1); // les infos sont transmises en POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//Authorisation par le header directement dans les options de cURL
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $accesstoken,'grant_type: client_credentials','client_id: ' . $client_id,'client_secret:' . $client_secret));
$result = curl_exec($ch);// on execute la session cURL
curl_close($ch);//on ferme la session cURL