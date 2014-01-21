<?php


    include('../inc/connect.php');
    include('../prive/param_bd.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adminsitration - Amirault</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

     <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
  </head>

  <body>
    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Amirault</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class=""><a href="index.php"><i class="fa fa-dashboard"></i> Accueil</a></li>           
            <li class=""><a href="index_page.php"><i class="fa fa-file-text"></i> Les pages</a></li>
            <li class=""><a href="index_produit.php"><i class="fa fa-picture-o"></i> Les produits</a></li> 
            <li class=""><a href="index_fichier.php"><i class="fa fa-download"></i> Les fichiers</a></li> 
          </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>