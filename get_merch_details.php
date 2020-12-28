<p>get_merch_details</p>
<?php
require 'access-token.php';
$curl2 = 'https://bandcamp.com/api/merchorders/1/get_merch_details';
//tableaux des paramètres de la requête
$data2 = array("start_time" => "2001-01-01","band_id" => 3390641849);//pour jarring effects, c'est lui qui a toutes les infos
// $data2 = array("start_time" => "2001-01-01","band_id" => $GLOBALS['band_id']);//pour jarring effects
//les données doivent être encodé au format json
//initialisation de curl
$ch = curl_init($curl2);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1); // les infos sont transmises en POST
$postdata = json_encode($data2);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata); 

// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//Authorisation par le header directement dans les options de cURL
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $accesstoken,'grant_type: client_credentials','client_id: ' . $client_id,'client_secret:' . $client_secret));
$result = curl_exec($ch);// on execute la session cURL
var_dump($postdata);
curl_close($ch);//on ferme la session cURL
