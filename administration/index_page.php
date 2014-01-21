<?php
include('header.php');
$connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);

$req_pages = "SELECT * FROM page";
$res_req_pages = mysql_query($req_pages, $connexion);

$bloc = "";
while ($row = mysql_fetch_array($res_req_pages)) {
    $bloc .= "<tr>";
    $bloc .= "<td>" . $row['titre'] . "</td>";
    $bloc .= "<td>" . $row['contenu'] . "</td>";
    $bloc .= "<td>" . $row['page_ref'] . "</td>";
    switch ($row['langue']) {
        case "fr":
            $bloc .= "<td class=''><img class='flag-img' src='img/flag_fr.png'/></td>";
            break;
        case "en":
            $bloc .= "<td class=''><img class='flag-img' src='img/flag_en.png'/></td>";
            break;
    }
    $bloc .= "<td><a href='edition_page.php?id=" . $row['id'] . "'><button class='btn btn-info'><i class='fa fa-pencil'> Editer la page</button></a></td>";
    $bloc .= "</tr>";
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
                    <h3 class="panel-title"><i class="fa fa-file-text"></i> Les pages</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                                <tr>
                                    <th>Titre<i class="fa fa-sort"></i></th>
                                    <th>Contenu<i class="fa fa-sort"></i></th>
                                    <th>Page<i class="fa fa-sort"></i></th>
                                    <th>Langue<i class="fa fa-sort"></i></th>
                                    <th>Edition<i class="fa fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?= $bloc ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>