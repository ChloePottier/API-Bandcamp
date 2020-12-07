<h2>my_bands</h2>
<?php
require 'access-token.php';
$curl = curl_init('https://bandcamp.com/api/account/1/my_bands');
$headr = array();
$headr[] = 'Content-length: 0';
$headr[] = 'Content-type: application/x-www-form-urlencoded';
$headr[] = 'Authorization: Bearer ' . $accesstoken;
$headr[] = 'Accept: application/json';
$headr[] = 'grant_type: client_credentials';
$headr[] = 'client_id: ' . $client_id;
$headr[] = 'client_secret:' . $client_secret;
curl_setopt($curl, CURLOPT_HTTPHEADER, $headr);
curl_setopt($curl, CURLOPT_POST, true);
$data = curl_exec($curl);
if ($data === false) {
    var_dump(curl_error($curl . 'ca marche pas'));
} else {
    var_dump($data);
}
curl_close($curl);
?>
<h2>get_merch_details</h2>
<?php
// require 'access-token.php';
$curl2 = 'https://bandcamp.com/api/merchorders/1/get_merch_details';
$data2 = array("start_time" => "2018-01-01","band_id" => 914283197 );//pour high tone

$postdata = json_encode($data2);
$ch = curl_init($curl2);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $accesstoken,'grant_type: client_credentials','client_id: ' . $client_id,'client_secret:' . $client_secret));
$result = curl_exec($ch);
// var_dump($result[]);
if ($result === false) {
    var_dump(curl_error($curl2 . 'ca marche pas'));
} else {
    var_dump($result);
}
curl_close($ch);
?>

