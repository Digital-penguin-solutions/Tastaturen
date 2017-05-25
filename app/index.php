<?php include "partials/head.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tastaturen Home</title>
    <meta name="description" content="Tastaturen"/>
    <meta name="keywords" content="orgel, instrument, musik"/>
    <!--<META HTTP-EQUIV="EXPIRES" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">-->
</head>

<body class="wrapper col-xs-12 col-md-10" id="page-top" class="index">
<?php
include "partials/nav.php";
include "functions/functions.php";
include "views/edit.php";

$con             = connect();
$products_home   = get_all_visible_products($con, "hem");
$products_church = get_all_visible_products($con, "kyrka");
?>

<!-- Header -->
<header id="Intro" class="container-fluid i_header">
    <div class="row-fluid i_header">
        <div class="col-xs-12 i_header_container">

            <!--slider container-->
            <div class="i_header_slider">
                <div class="i_slider_1 col-xs-12">
                    <div class="i_slider_1_container">
                        <div class = "all_slider_container no_list no_arrows">

                            <!-- Slider 1-->
                            <div class = "slider_page col-md-12">

                                <!--Slider 1 -->
                                <div class="i_slider_1_text">
                                    <h1 class = "fade-in fade-in-delay-2">Tastaturen</h1>
                                </div>

                                <div class="i_slider_1_left col-xs-6">
                                    <div class="i_slider_1_left_img">
                                        <img src="img/Index_slider/Slider_1_l.png" alt="Orgel för kyrko bruk">
                                    </div>

                                    <div class="i_slider_1_left_btn ">
                                        <p>Herp derpsum perp dee derp, mer herderder.
                                            Sherp berp derpler,</p>
                                        <button class = "slide-in-delay-3 slide-in slide-in-left"
                                                onclick="location.href='product_details'">Kyrkobruk</button>
                                    </div>
                                </div>

                                <div class="i_slider_1_right col-xs-6">

                                    <div class="i_slider_1_right_img">
                                        <img src="img/Index_slider/Slider_1_r.png" alt="Orgel för hemma bruk">
                                    </div>

                                    <div class="i_slider_1_right_btn">
                                        <p>Herp derpsum perp dee derp, mer herderder.
                                            Sherp berp derpler,</p>
                                        <button class = "slide-in-delay-3 slide-in"
                                                onclick="location.href='product_details'">Hemmabruk</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Slider 2 -->
                            <div class = "slider_page col-xs-12">
                                <div class="i_slider_2_container">
                                    <div class="i_slider_2_text col-xs-12">
                                        <div class="i_slider_2_text_container col-xs-5 col-xs-offset-1">
                                            <h1> orgel</h1>
                                            <p>Mycket fin orgel med mycket bra saker. </p>
                                            <div class="i_slider_2_btn ">
                                                <button class = "slide-in-delay-3 slide-in slide-in-left"
                                                        onclick="location.href='product_details'">Läs mer</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="i_slider_2_img">
                                        <img class = "section_background" src="img/Index_slider/Slider_2.jpg" alt="orgel för kykobruk">
                                    </div>
                                </div>
                            </div>

                            <!-- Slider 3-->
                            <div class = "slider_page col-md-12">
                                <div class="i_slider_3_container">
                                    <div class="i_slider_3_video">
                                        <div class="i_slider_3_video_btn">
                                            <button></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slider 4-->
                            <div class = "slider_page col-xs-12">
                                <div class="i_slider_4_container">
                                    <div class="i_slider_4_text col-xs-12">
                                        <div class="i_slider_4_text_container col-xs-12">
                                            <h1> orgel</h1>
                                            <p>Mycket fin orgel med mycket bra saker. </p>
                                            <div class="i_slider_4_btn">
                                                <button onclick="location.href='product_details'">Läs mer</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="i_slider_4_img">
                                        <img class = "section_background" src="img/Index_slider/Slider_4.jpg" alt="orgel för kykobruk">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- Info section -->
<section id="Info" class="container-fluid i_info">
    <div class="row-fluid i_info">
        <div class="col-xs-12 col-md-10 i_info_container col-xs-offset-1">
            <h2><?php print_field("i_about_header"); ?> </h1>
            <p class = "col-xs-offset-2 col-xs-8">
                <?php print_field("test"); ?>
            </p>
            <!--<p>Vi levererar digitala kyrkorglar för alla behov.
                Kontakta oss gärna för mer information eller för
                en personlig demonstration i Er kyrka.
                Vi kan även förmedla kontakt med kyrkor
                där en Rodgers eller en Johannus digitalorgel har installerats.
            </p>-->
            <a href="http://www.johannus.com/" target="_blank" class="col-xs-4 col-xs-offset-1">
                <img src="img/logo/saker/johanus_white.svg" alt="johannus logo" style="margin-top: 1.6vh">
            </a>
            <a href="http://www.rodgersinstruments.com/" target="_blank" class="col-xs-4 col-xs-offset-1">
                <img src="img/logo/saker/rodger_white.svg" alt="rodgersinstruments logo">
            </a>
        </div>
    </div>
</section>

<!-- Products -->
<section id="Produkter" class="container-fluid i_products">
    <div class="row-fluid i_products">
        <div class="col-xs-12 i_products_container">

            <!-- Products Kyrka -->
            <div class="product_slider_container i_products col-xs-12" id="Orgel-kyrka">
                <h2>Kyrkorgel</h2>

                <!--l eft and right arrow slider-->
                <div class="i_products_arrow_l">
                    <img src="img/Index_slider/left_arrow.svg" alt="Slide left">
                </div>
                <div class="i_products_arrow_r">
                    <img src="img/Index_slider/right_arrow.svg" alt="Slide right">
                </div>

                <?php echo_products_index($products_church);?>

                <div class="i_products_bt_container">
                    <button onclick="location.href='product_details'" class="i_products_btn">Visa alla</button>
                </div>
            </div>

            <!-- Products Home -->
            <div class="product_slider_container i_products col-xs-12" id="Orgel-hem">
                <h2>Hemorgel</h2>

                <!--l eft and right arrow slider-->
                <div class="i_products_arrow_l">
                    <img src="img/Index_slider/left_arrow.svg" alt="slide left">
                </div>
                <div class="i_products_arrow_r">
                    <img src="img/Index_slider/right_arrow.svg" alt="Slide right">
                </div>

                <?php echo_products_index($products_home);?>

                <div class="i_products_bt_container">
                    <button onclick="location.href='product_details'" class="i_products_btn">Visa alla</button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Contact section -->
<section id="kontakta" class="container-fluid i_contact">
    <div class="row-fluid i_contact">
        <div class="col-xs-12 i_contact_container">
            <!--<div class="col-xs-12 col-md-10 col-md-offset-1 i_contact_container">-->
            <div class="i_contact_text_top">
                <h2><?php print_field("i_kontakt_header"); ?></h2>
            </div>

            <div class = "col-xs-offset-2 col-xs-8">
                <img src="img/contact/Anders_bjork.jpg" alt="Anders Björk" class="col-xs-5">
                <img src="img/contact/Anders_gustafsson.jpg" alt="Anders Gustafsson" class="col-xs-5 col-xs-offset-2">

                <div class="col-xs-5 i_contact_text" >
                    <h2><?php print_field("i_contact_person_name_1") ?></h2>
                    <p><?php print_field("i_contact_person_number_1") ?></p>
                    <p><?php print_field("i_contact_person_mail_1") ?></p>
                </div>

                <div class="col-xs-5 col-xs-offset-2 i_contact_text">
                    <h2><?php print_field("i_contact_person_name_2") ?></h2>
                    <p><?php print_field("i_contact_person_number_2") ?></p>
                    <p><?php print_field("i_contact_person_mail_2") ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Media section -->
<?php include "views/index_media.php"?>

<!-- Footer -->
<?php include "partials/footer.php" ?>
</body>
</html>
