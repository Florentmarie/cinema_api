<?php
/** 1) On initialise la session **/
$ch = curl_init() ;
/** 2) On définit les options **/
curl_setopt($ch, CURLOPT_URL, 'http://www.devandseo.fr');
/** 3) Exécution de la requête **/
curl_exec($ch) ;
/** 4) Enfin, on ferme la session CURL **/
curl_close($ch) ;

?>