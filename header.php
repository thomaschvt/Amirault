<?php

    include('inc/connect.php');
    include('prive/param_bd.php');
    $connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);
    
    /*Set langue*/
    if(isset($_GET['lang'])){
        $lang = $_GET['lang'];
        include('translation/'.$lang.'.php');
    }else{
        $lang = "fr";
        include('translation/fr.php');
    }
    

$req_pages = "SELECT * FROM page WHERE langue='" . $lang."'";
$res_req_pages = mysql_query($req_pages, $connexion);
$tabs_pages = mysql_fetch_assoc($res_req_pages);

print_r($tabs_pages);

?>