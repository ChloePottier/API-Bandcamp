<h2>my_bands</h2>
<?php // récupérer les données
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
?>
