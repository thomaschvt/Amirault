<?php
include('header.php');
$connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);

if (isset($_POST['edition_ok'])) {

    $req_pages = 'UPDATE page SET titre = "' . $_POST['titre'] . '", contenu = "' . $_POST['contenu'] . '" WHERE id=' . $_POST['edition_id'];
    $res_req_pages = mysql_query($req_pages, $connexion);
	
    header('Location: index.php');
} else {

    $page_id = $_GET['id'];

    $req_pages = "SELECT * FROM page WHERE id=" . $page_id;
    $res_req_pages = mysql_query($req_pages, $connexion);
    $tabs_info_page = mysql_fetch_array($res_req_pages);

    switch ($tabs_info_page['langue']) {
        case "fr":
            $drapeau = "<img class='flag-img' src='img/flag_fr.png'/>";
            break;
        case "en":
            $drapeau = "<img class='flag-img' src='img/flag_en.png'/>";
            break;
    }
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Administration <small>Edition page </small></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file-text-o"></i> <?php print $tabs_info_page['titre'] ?></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form role="form" name="edition_page" method="post" action="edition_page.php">
                <div class="form-group">
                    <?= $drapeau ?>
                </div>
                <div class="form-group">
                    <label>Titre</label>
                    <input class="form-control" name="titre" value="<?= $tabs_info_page['titre'] ?>">
                </div>

                <div class="form-group">
                    <label>Contenu</label>
                    <textarea class="textarea-edition" name="contenu"><?= $tabs_info_page['contenu'] ?></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" name="edition_ok" class="btn btn-info" value="Valider"/>
                    <input type="hidden" name="edition_id" value="<?= $tabs_info_page['id'] ?>"
                </div>

            </form>

        </div>
        <div class="col-lg-3"></div>
    </div>
    </div>
</div>