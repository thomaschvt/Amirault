<?php
include 'header.php';

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Administration <small>Création Produit</small></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file-text-o"></i> Etape 1 - Création produit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form action="traitement_produit.php" method="post">
                <div class="form-group">
                    <label>Langue de la fiche produit</label>
                    <select class="form-control" name="langue">
                        <option value="fr">Français</option>
                        <option value="eng">Anglais</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nom du produit</label>
                    <input type="text" class="form-control" name="nom">
                </div>
                <div class="form-group">
                    <label>Decriptif du produit</label>
                    <textarea class="form-control" name="descriptif"></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" name="creation" value="Créer">
                </div>
            </form>
        </div>
    </div>
</div>