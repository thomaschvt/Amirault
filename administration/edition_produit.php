<?php
include('header.php');
$connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);

$req_produit = "SELECT * FROM produit WHERE id=" . $_GET['id'];
$res_req_produit = mysql_query($req_produit, $connexion);
$tabs_info_produit = mysql_fetch_array($res_req_produit);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Administration <small>Edition produit </small></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file-text-o"></i> Informations générales</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form action="traitement_produit.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Langue de la fiche produit</label>
                    <select class="form-control" name="langue">
<?php
$option = "";
switch ($tabs_info_produit['langue']) {
    case "fr":
        $option .= "<option value='fr' selected>Français</option>";
        $option .= "<option value='eng'>Anglais</option>";
        break;

    case "en":
        $option .= "<option value='fr' >Français</option>";
        $option .= "<option value='en' selected>Anglais</option>";
        break;
}
print $option;
?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Nom du produit</label>
                    <input type="text" class="form-control" name="nom" value="<?= $tabs_info_produit['nom'] ?>">
                </div>
                <div class="form-group">
                    <label>Decriptif du produit</label>
                    <textarea class="form-control" name="description"><?= $tabs_info_produit['description'] ?></textarea>
                    <input type="hidden" name="hidden_id" value="<?= $tabs_info_produit['id'] ?>"
                </div>
                <div class="form-group">
                    <label>Visuel courant</label>
                    <img src="visuels/<?= $tabs_info_produit['url_img'] ?>"/>
                    <input type="hidden" name="hidden_img" value="<?= $tabs_info_produit['url_img'] ?>"
                </div>
                <div class="form-group">
                    <label>Modifier visuel du produit</label>
                    <input class="form-control" type="file" name="img"/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
                </div>
                <div class="form-group">
                    <label>Fiche technique courante</label>
                    <span> <?= $tabs_info_produit['url_pdf'] ?><span/>    
                </div>
                <div class="form-group">
                    <label>Modifier fiche technique du produit</label>
                    <input class="form-control" type="file" name="pdf"/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" name="edition" value="Valider">
                    <input type="hidden" name="hidden_pdf" value="<?= $tabs_info_produit['url_pdf'] ?>"
                </div>                    
            </form>
        </div>
    </div>
</div>