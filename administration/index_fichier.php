<?php

include('header.php');
$connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);

$req_fichier = "SELECT * FROM fichier_telechargement";
$res_req_fichier = mysql_query($req_fichier, $connexion);

$fichier = "";
while ($row = mysql_fetch_array($res_req_fichier)) {

    $fichier .= "<tr>";
    $fichier .= "<td>" . $row['titre'] . "</td>";
    $fichier .= "<td><img image_telechargement/".$row['url_img']."</td>";
    $fichier .= "<td>
                    <a href='edition_produit.php?id=" . $row['id'] . "'><button class='btn btn-info'><i class='fa fa-pencil'></i> Editer</button></a>
                    <a href='traitement_produit.php?suppr=".$row['id']."'><button class='btn btn-danger'><i class='fa fa-trash-o'></i> Supprimer</button></a>
                 </td>";
    $fichier .= "</tr>";
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Administration <small>Accueil </small></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Accueil</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-picture-o"></i> Les images téléchargeables</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                                <tr>
                                    <th>Nom<i class="fa fa-sort"></i></th>
                                    <th>Nom<i class="fa fa-sort"></i></th>
                                    <th>Nom<i class="fa fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?= $fichier ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="creation_image.php"><button class="btn btn-success"> <i class="fa fa-plus-circle"></i> Ajouter une image</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
