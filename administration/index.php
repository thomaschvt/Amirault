<?php
include('header.php');
$connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);
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
        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-file-text fa-5x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <p class="announcement-heading">Les pages</p>   
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="index_page.php">Voir les pages</a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="index_page.php"><i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
          <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-picture-o fa-5x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <p class="announcement-heading">Les produits</p>   
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="index_produit.php">Voir les produits</a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="index_produit.php"><i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-download fa-5x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <p class="announcement-heading">Les fichiers</p>   
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="index_fichier.php">Voir les fichiers téléchargeable</a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="index_fichier.php"><i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>






</div>