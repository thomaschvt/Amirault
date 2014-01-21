<?php

include('header.php');
$connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);

$date = date("d.m.Y");
$heure = date("H.i.s");
$point = ".";

//creation produit

if (isset($_POST['creation'])) {

    $nom_produit = $_POST['nom'];
    $desc_produit = $_POST['descriptif'];
    $lang_produit = $_POST['langue'];

    $req_crea_produit = "INSERT into produit (nom,description,url_img,url_pdf,langue) VALUES ('" . $nom_produit . "', '" . $desc_produit . "','','','" . $lang_produit . "')";

    $res_req_crea_produit = mysql_query($req_crea_produit, $connexion);
    $id_produit = mysql_insert_id();

    header('Location: ajout_visuel.php?id_produit=' . $id_produit);
}

//ajout img
if (isset($_POST['ajout_img'])) {
    $dossier = 'visuels/';

    $fichier = basename($_FILES['img']['name']);
    $taille_maxi = 10000000000;
    $taille = filesize($_FILES['img']['tmp_name']);
    $extensions = array('.jpg', '.png', '.jpeg', '.JPG', '.JPEG', '.PNG');
    $extension = strrchr($_FILES['img']['name'], '.');
    //Début des vérifications de sécurité...
    if (!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
        $erreur = 'Vous devez uploader un fichier de type jpg, png';
    }
    if ($taille > $taille_maxi) {
        $erreur = 'Le fichier est trop gros...';
    }
    if (!isset($erreur)) { //S'il n'y a pas d'erreur, on upload
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if (move_uploaded_file($_FILES['img']['tmp_name'], $dossier . $heure . $point . $fichier)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            // echo 'Votre image nous a bien été transmise !';
            $req_img = "UPDATE produit set url_img = '" . $heure . $point . $fichier . "' WHERE id = " . $_POST['id_produit'];
            $res_img = mysql_query($req_img, $connexion);

            header('Location: ajout_pdf.php?id_produit=' . $_POST['id_produit']);
        } else { //Sinon (la fonction renvoie FALSE).
            echo 'Echec de l\'envoi de votre image, veuillez réessayer';
        }
    } else {
        echo $erreur;
    }
}

//ajout pdf

if (isset($_POST['ajout_pdf'])) {
    $dossier = 'pdf/';

    $fichier = basename($_FILES['pdf']['name']);
    $taille_maxi = 10000000000;
    $taille = filesize($_FILES['pdf']['tmp_name']);
    $extensions = array('.pdf', '.PDF');
    $extension = strrchr($_FILES['pdf']['name'], '.');
    //Début des vérifications de sécurité...
    if (!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
        $erreur = 'Vous devez uploader un fichier de type jpg, png';
    }
    if ($taille > $taille_maxi) {
        $erreur = 'Le fichier est trop gros...';
    }
    if (!isset($erreur)) { //S'il n'y a pas d'erreur, on upload
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

        if (move_uploaded_file($_FILES['pdf']['tmp_name'], $dossier . $heure . $point . $fichier)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            // echo 'Votre image nous a bien été transmise !';
            $req_img = "UPDATE produit set url_pdf = '" . $heure . $point . $fichier . "' WHERE id = " . $_POST['id_produit'];
            $res_img = mysql_query($req_img, $connexion);

            header('Location: index.php');
        } else { //Sinon (la fonction renvoie FALSE).
            echo 'Echec de l\'envoi de votre image, veuillez réessayer';
        }
    } else {
        echo $erreur;
    }
}

if (isset($_POST['edition'])) {
    $nom_produit = $_POST['nom'];
    $desc_produit = $_POST['description'];
    $lang_produit = $_POST['langue'];

    if (isset($_FILES['pdf']) && !empty($_FILES['pdf']['tmp_name'])) {

        $dossier = 'pdf/';
        $fichier = basename($_FILES['pdf']['name']);
        $taille_maxi = 10000000000;
        $taille = filesize($_FILES['pdf']['tmp_name']);
        $extensions = array('.pdf', '.PDF');
        $extension = strrchr($_FILES['pdf']['name'], '.');
        //Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
            $erreur = 'Vous devez uploader un fichier de type pdf';
        }
        if ($taille > $taille_maxi) {
            $erreur = 'Le fichier est trop gros...';
        }
        if (!isset($erreur)) { //S'il n'y a pas d'erreur, on upload
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            if (move_uploaded_file($_FILES['pdf']['tmp_name'], $dossier . $heure . $point . $fichier)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                // echo 'Votre image nous a bien été transmise !';
                $url_pdf = $heure . $point . $fichier;
            } else { //Sinon (la fonction renvoie FALSE).
                echo 'Echec de l\'envoi de votre pdf, veuillez réessayer';
            }
        } else {
            echo $erreur;
        }
    } else {
        print "pas modifs";
        print $_POST['hidden_img'];
        $url_pdf = $_POST['hidden_pdf'];
    }

    if (isset($_FILES['img']) && !empty($_FILES['img']['tmp_name'])) {

        $dossier = 'visuels/';
        $fichier = basename($_FILES['img']['name']);
        $taille_maxi = 10000000000;
        $taille = filesize($_FILES['img']['tmp_name']);
        $extensions = array('.jpg', '.png', '.jpeg', '.JPG', '.JPEG', '.PNG');
        $extension = strrchr($_FILES['img']['name'], '.');
        //Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
            $erreur = 'Vous devez uploader un fichier de type jpg, png';
        }
        if ($taille > $taille_maxi) {
            $erreur = 'Le fichier est trop gros...';
        }
        if (!isset($erreur)) { //S'il n'y a pas d'erreur, on upload
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if (move_uploaded_file($_FILES['img']['tmp_name'], $dossier . $heure . $point . $fichier)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                // echo 'Votre image nous a bien été transmise !';
                $url_img = $heure . $point . $fichier;
            } else { //Sinon (la fonction renvoie FALSE).
                echo 'Echec de l\'envoi de votre image, veuillez réessayer';
            }
        } else {
            echo $erreur;
        }
    } else {
        print "pas modifs";
        print $_POST['hidden_img'];
        $url_img = $_POST['hidden_img'];
    }
    $req_update = "UPDATE produit set nom = '" . $nom_produit . "', description = '" . $desc_produit . "', url_img = '" . $url_img . "', url_pdf = '" . $url_pdf . "', langue = '" . $_POST['langue'] . "' WHERE id = " . $_POST['hidden_id'];
    $res_req_update = mysql_query($req_update, $connexion);
    header("location:index.php");
}

if(isset($_GET['suppr'])){
   $req_del = "DELETE FROM produit WHERE id=".$_GET['suppr'];
    $res_req_del = mysql_query($req_del, $connexion);
}
?>
