<?php
include 'header.php';
$connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);

if (isset($_POST['creation'])) {

    $date = date("d.m.Y");
    $heure = date("H.i.s");
    $point = ".";

    $dossier = 'image_telechargement/';

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
            $req_img = "INSERT INTO fichier_telechargement (titre, url_img)VALUES ('" . $_POST['nom'] . "', '" . $heure . $point . $fichier . "')";
            $res_img = mysql_query($req_img, $connexion);

            header('Location: index.php');
        } else { //Sinon (la fonction renvoie FALSE).
            echo 'Echec de l\'envoi de votre image, veuillez réessayer';
        }
    } else {
        echo $erreur;
    }
} else {
    ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1>Administration <small>Création image </small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-file-text-o"></i> Création image téléchargeable</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form role="form" name="crea_img_dwld" method="post" action="creation_image.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nom de l'image</label>
                        <input type="text" class="form-control" name="nom">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="img"/>
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control btn btn-success" type="submit" name="creation" value="Créer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>