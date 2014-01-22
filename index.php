<?php
include('inc/connect.php');
include('prive/param_bd.php');
$connexion = connexion_bd(SERVEUR, LOGIN, PASSWORD, BASE);

/* Set langue */
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    include('translation/' . $lang . '.php');
} else {
    $lang = "fr";
    include('translation/fr.php');
}



$req_pages = "SELECT * FROM page WHERE langue='" . $lang . "'";

$res_req_pages = mysql_query($req_pages, $connexion);


$my_arary = array();
while ($row = mysql_fetch_assoc($res_req_pages)) {
    $my_arary[$row['page_ref']]['titre'] = $row['titre'];
    $my_arary[$row['page_ref']]['contenu'] = $row['contenu'];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Amirault</title>
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords"  content="" />
        <meta name="Resource-type" content="Document" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0">

            <link rel="stylesheet" type="text/css" href="vendors/fullPage.js/jquery.fullPage.css" />
            <link rel="stylesheet" type="text/css" href="css/fonts.css" />
            <link rel="stylesheet" type="text/css" href="css/basefluide.css" />
            <link rel="stylesheet" type="text/css" href="vendors/custom-scrollbar-plugin/jquery.mCustomScrollbar.css" />


            <!--[if IE]>
            <script type="text/javascript">
                var console = { log: function() {} };
            </script>
            <![endif]-->

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

            <script type="text/javascript" src="vendors/fullPage.js/jquery.fullPage.js"></script>
            <script type="text/javascript" src="vendors/custom-scrollbar-plugin/jquery.mCustomScrollbar.js"></script>


            <script type="text/javascript">
                $(document).ready(function() {
                    var amirault = $.fn.fullpage({//slidesColor: ['#000', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
                        anchors: ['home', 'heritage', 'terroir', 'vegetal', 'vendanges', 'elevage', 'crus'],
                        menu: '#menu',
                        easing: 'easeInOutExpo',
                        scrollingSpeed: 2000,
                        afterLoad  : function(anchorLink, index, slideAnchor, slideIndex){
                            //centreVertical();
                        },
                        onLeave:function(){

                        },
                        fixedElements: '#header, #footer'
                    });


                });
            </script>

    </head>
    <body>


        <div id="header">

            <a  href="#home"><img class="logo" src="img/logo.gif" ></a>
                <div class="menu">
                    <a  href="#heritage"><?= $heritage ?></a>
                    <a class="menu-top" href="#terroir"><?= $terre ?></a>
                    <a class="menu-top" href="#vegetal"><?= $vegetal ?></a>
                    <a class="menu-top" href="#vendanges"><?= $vendange ?></a>
                    <a class="menu-top" href="#elevage"><?= $elevage ?></a>
                    <a class="menu-top" href="#crus"><?= $crus ?></a>

                </div>

        </div>



        <div class="section active" id="section0">

            <img src="img/home.jpg" class="background">

        </div>

        <div class="section " id="section1">


            <div class="texte">
                <h1><i><?= $my_arary['heritage']['titre'] ?></h1>
                <div class="container-para">

                    <div class="para">
                        <p><?= $my_arary['heritage']['contenu'] ?></p>
                    </div>
                </div>


            </div>

            <img src="img/l_heritage.jpg" class="background">


        </div>

        <div class="section" id="section2">


            <div class="texte">
                <h1><i><?= $my_arary['terre']['titre'] ?></i></h1>
                <div class="container-para">

                    <div class="para">
                        <p>  <?= $my_arary['terre']['contenu'] ?></p>
                                    
                                    </div>
                                    </div>

                                    </div>
                                    <img src="img/la_terre.jpg" class="background">

                                        </div>

                                        <div class="section" id="section3">

                                            <div class="texte">
                                                <h1><i><?= $my_arary['vegetal']['titre'] ?></i></h1>
                                                <div class="container-para">

                                                    <div class="para">
                                                        <p><?= $my_arary['vegetal']['contenu'] ?>
                                                                        </p>
                                                                        </div>
                                                                        </div>

                                                                        </div>
                                                                        <img src="img/le_vegetal.jpg" class="background">

                                                                            </div>

                                                                            <div class="section" id="section4">

                                                                                <div class="texte">
                                                                                    <h1><i><?= $my_arary['vendanges']['titre'] ?></i></h1>
                                                                                    <div class="container-para">
                                                                                        <div class="para">
                                                                                            <p>A l'issu des vendanges manuelles et du tri, le raisin est systématique égrappé au cuvier. Les premiers vins sont fermentés en cuve ouverte et chaque cru est vinifié en cuve en bois tronconique lors de
                                                                                                macérations longues jusqu'à 6 semaines.
                                                                                                <br/>L'extraction est la plus douce possible en favorisant les phénomènes naturels d'infusion/diffusion.
                                                                                                <br/>L'usage depuis toujours au domaine du
                                                                                                pigeage au pied se fait toujours mais
                                                                                                essentiellement en phase aqueuse (lorsqu'il y a peu d'alcool de former pour éviter de lessiver les tanins des pépins).
                                                                                                <br/>Les délestages sont réservés aux
                                                                                                millésimes de très grandes maturités,
                                                                                                toujours pour éviter la rusticité dans nos vins.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <img src="img/les_vendanges.jpg" class="background">

                                                                            </div>

                                                                            <div class="section" id="section5">

                                                                                <div class="texte">
                                                                                    <h1><i><?= $my_arary['elevage']['titre'] ?></i></h1>
                                                                                    <div class="container-para">
                                                                                        <div class="para">
                                                                                            <p><?= $my_arary['elevage']['contenu'] ?></p>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <img src="img/l_elevage.jpg" class="background">

                                                                            </div>

                                                                            <div class="section" id="section6">

                                                                                <div class="texte">
                                                                                    <h1><i><?= $my_arary['crus']['titre'] ?></i></h1>
                                                                                    <div class="container-para">
                                                                                        <div class="para">
                                                                                            <p><?= $my_arary['crus']['contenu'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <img src="img/les_crus.jpg" class="background">

                                                                            </div>



                                                                            <div id="footer">

                                                                                <div class="menu menu-footer">
                                                                                    <a  href="#heritage"><?= $trouver ?></a>
                                                                                    <a class="lien-footer" href="#terroir"><?= $contact ?></a>
                                                                                    <a class="lien-footer" href="#vegetal"><?= $telechargement_images ?></a>

                                                                                    <a class="lien-right lien-footer" href="index.php?lang=en">UK</a>
                                                                                    <a class="lien-right" href="index.php?lang=fr">FR</a>
                                                                                </div>

                                                                                -->
                                                                            </div>

                                                                            <script src="vendors/fittext/jquery.fittext.js"></script>
                                                                            <script>
                                                                                $(function(){



                                                                                    $("#header .menu ").fitText(1, { minFontSize: '12px' });
                                                                                    $("#footer .menu-footer ").fitText(1, { minFontSize: '12px' });
                                                                                    $("#footer .menu-footer-right").fitText(1, { minFontSize: '12px' });

                                                                                    $(".para").fitText(1, { minFontSize: '12px' });
                                                                                    $(".texte h1").fitText(1, { minFontSize: '12px' });

                                                                                    $(window).resize(function(){
                                                                                        centreVertical();
                                                                                    });

                                                                                    window.centreVertical = function(){
                                                                                        var hauteurHeader = $('#header').outerHeight(true);

                                                                                        var hauteurFooter = $('#footer').outerHeight(true);
                                                                                        var topFooter =  $('#footer').offset().top;

                                                                                        var image=$(".section:first img")
                                                                                        var hauteurImage=$(image).height();
                                                                                        var topImage=($(window).height()-$(image).height())/2;
                                                                                        topImage = topImage >0 ? topImage : 0;

                                                                                        var masqueTopImage=hauteurHeader-topImage;
                                                                                        masqueTopImage= masqueTopImage >0 ? masqueTopImage : 0;

                                                                                        var masqueBottomImage=(topImage+hauteurImage)-($(window).height()-hauteurFooter);
                                                                                        masqueBottomImage= masqueBottomImage >0 ? masqueBottomImage : 0;

                                                                                        //calcul de la partie visible de l'image
                                                                                        var visibleImage=hauteurImage-masqueTopImage-masqueBottomImage;

                                                                                        console.log("Partie visble : "+visibleImage+"/hauteur image : "+hauteurImage);
                                                                                        console.log("MasqueBottom : "+masqueBottomImage+"/masqueTop : "+masqueTopImage);
                                                                                        console.log("MasqueBottom : "+masqueBottomImage+"/masqueTop : "+masqueTopImage);

                                                                                        var maxHeight=(visibleImage-masqueTopImage)*1.2;
                                                                                        console.log("MaxHeight : "+maxHeight);

                                                                                        //$(this).css('height',maxHeight+'px');
                                                                                        $('.para').mCustomScrollbar("destroy");
                                                                                        $('.container-para').css('height','auto');
                                                                                        $('.container-para').css('padding-right','5%');
                                                                                        $('.para').css('height','auto');
                                                                                        $('.texte').css('height','auto');




                                                                                        var topPos;
                                                                                        var containerParaHeight;
                                                                                        $('.texte').each(function(){
                                                                                            //init des tailles

                                                                                            var texteHeight=$(this).height();
                                                                                            topPos=(visibleImage-texteHeight)/2+masqueTopImage;
                                                                                            console.log($(this).find('h1').text());
                                                                                            console.log('TopPos : '+topPos);
                                                                                            console.log('Texte height : '+$(this).height()+" : "+visibleImage);
                                                                                            console.log(topPos);


                                                                                            if(texteHeight>maxHeight){
                                                                                                $(this).css('height',maxHeight+'px');
                                                                                                texteHeight=maxHeight;


                                                                                                containerParaHeight=maxHeight-$(this).find('h1').outerHeight();
                                                                                                console.log('MaxHeight : '+maxHeight +", containerParaHeight : "+containerParaHeight+", h1 height : "+$(this).find('h1').outerHeight());

                                                                                                $(this).find('.container-para').css('height',containerParaHeight+'px');
                                                                                                $(this).find('.container-para').css('padding-right','0');

                                                                                                $(this).find('.para').css('height','88%');

                                                                                                topPos=(visibleImage-texteHeight)/2+masqueTopImage;
                                                                                                $(this).find('.para').mCustomScrollbar(  );

                                                                                                /*if($(this).find('.para')[0].length>0){
                                                                                                    $(this).find('.para')[0].css('height','100px');
                                                                                                    $('.para').scrollTop( 0 );
                                                                                                }*/
                                                                                            }




                                                                                            $(this).css('marginTop',topPos+'px');

                                                                                            /*$(this).animate({
                                                                                                opacity:1,
                                                                                                top: topPos
                                                                                            }, 500, function() {
                                                                                                // Animation complete.
                                                                                            });*/
                                                                                            //$(this).css('top',topPos+'px');
                                                                                            //$('#header').hide();




                                                                                        });
                                                                                    };
                                                                                    centreVertical();


                                                                                });
                                                                            </script>


                                                                            </body>
                                                                            </html>