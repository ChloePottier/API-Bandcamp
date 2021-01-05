# API-Bandcamp
Récupérer les data Bandcamp d'un compte label  avec PHP
https://bandcamp.com/developer 

1- Créer un compte bandcamp
2- Contacter bandcamp pour avoir accès à l'API
3- Aller sur son compte bandcamp Dashboard/setting/Accès API et générer son client secret
4- Getting Access : Générer son refresh_token et access_token (valables 1heure) via son terminal
5- My Account : Générer la liste des groupes avec leur ID : curl.php. On enregistre ensuite la liste des groupes dans un fichier my_bands.json
6- Merch order : Générer la liste de tous les produits, retrouver le nom des groupes grace à leur ID. Dans mon cas, tous les produits sont dans le groupe global Jarring Effects label : curl_merch_details.php (Id des groupe en variable globales). Enregistrer les résultats dans un fichier get_merch_details.json

Toutes les informations ont été enregistrées pour ne pas avoir à regénérer sans arrêt son acces token et son refresh token.
7- Convertir le fichier my_bands.json en tableau : my_bands.php.
8- Convertir le fichier get_merch_details.json en tableau : array_produts.php.
9- Insérer ses informations en base de données.

