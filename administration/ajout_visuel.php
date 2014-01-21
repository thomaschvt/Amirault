<?php
include 'header.php';
$id_produit = $_GET['id_produit'];
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Administration <small>Création visuel</small></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-picture-o"> Etape 2 - Ajout de visuel</i></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form role="form" name="ajout_prod_step2" method="post" action="traitement_produit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Visuel du produit</label>
                    <input class="form-control" type="file" name="img"/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
                </div>

                <div class="form-group">
                    <input type="submit" name="ajout_img" class="btn btn-success" value="Valider et ajouter une fiche technique"/>
                    <input type="hidden" name="id_produit" value="<?= $id_produit ?>"
                </div>

            </form>

        </div>
        <div class="col-lg-3"></div>
    </div>
    </div>
</div>