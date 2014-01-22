<?php
include('header.php');
$connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);
$req_produit = "SELECT * FROM produit";
$res_req_produit = mysql_query($req_produit, $connexion);

$produit = "";
while ($row = mysql_fetch_array($res_req_produit)) {

    $produit .= "<tr>";
    $produit .= "<td>" . $row['nom'] . "</td>";
    $produit .= "<td>" . $row['description'] . "</td>";
    $produit .= "<td>" . $row['url_img'] . "</td>";
    $produit .= "<td>" . $row['url_pdf'] . "</td>";
    switch ($row['langue']) {
        case "fr":
            $produit .= "<td class=''><img class='flag-img' src='img/flag_fr.png'/></td>";
            break;
        case "en":
            $produit .= "<td class=''><img class='flag-img' src='img/flag_en.png'/></td>";
            break;
    }
    $produit .= "<td>
                    <a href='edition_produit.php?id=" . $row['id'] . "'><button class='btn btn-info'><i class='fa fa-pencil'></i> Editer</button></a>
                    <a href='traitement_produit.php?suppr=" . $row['id'] . "'><button class='btn btn-danger'><i class='fa fa-trash-o'></i> Supprimer</button></a>
                 </td>";
    $produit .= "</tr>";
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
                    <h3 class="panel-title"><i class="fa fa-picture-o"></i> Les produits</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                                <tr>
                                    <th>Nom<i class="fa fa-sort"></i></th>
                                    <th>Description<i class="fa fa-sort"></i></th>
                                    <th>Visuel<i class="fa fa-sort"></i></th>
                                    <th>Fiche technique<i class="fa fa-sort"></i></th>
                                    <th>Langue<i class="fa fa-sort"></i></th>
                                    <th>Action<i class="fa fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?= $produit ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="creation_produit.php"><button class="btn btn-success"> <i class="fa fa-plus-circle"></i> Ajouter un produit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>