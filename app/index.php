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

$con             = connect();
$products_home   = get_all_visible_products($con, "hem");
$products_church = get_all_visible_products($con, "kyrka");
?>

<!-- Header -->
<header id="Intro" class="container-fluid i_header" role="banner">
    <div class="row-fluid i_header">
        <div class="col-xs-12 i_header_container">

            <?php include "views/index_header.php"?>

        </div>
    </div>
</header>

<!-- Info section -->
<section id="Info" class="container-fluid i_info" role="main">
    <div class="row-fluid i_info">
        <div class="col-xs-12 col-md-10 col-md-offset-1 i_info_container">
            <h2><?php print_field("i_about_header"); ?> </h2>
            <p class = "col-xs-offset-21col-xs-10 col-md-offset-2 col-md-8">
                <?php print_field("test"); ?>
            </p>

            <a href="http://www.johannus.com/" target="_blank" class="col-xs-6 col-md-offset-1 col-md-4">
                <img src="img/logo/saker/johanus_white.svg" alt="johannus logo" style="margin-top: 1.6vh">
            </a>

            <a href="http://www.rodgersinstruments.com/" target="_blank" class="col-xs-6 col-md-offset-1 col-md-4">
                <img src="img/logo/saker/rodger_white.svg" alt="rodgersinstruments logo">
            </a>
        </div>
    </div>
</section>

<!-- Products -->
<section id="Produkter" class="container-fluid i_products" role="complementary">
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

                <div class="i_products_slider">
                    <?php echo_products_index($products_church);?>
                </div>

                <div class="i_products_bt_container">
                    <button onclick="location.href='product_details?t=kyrka'" class="i_products_btn">Visa alla</button>
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

                <div class="i_products_slider">
                    <?php echo_products_index($products_home);?>
                </div>

                <div class="i_products_bt_container">
                    <button onclick="location.href='product_details?t=hem'" class="i_products_btn">Visa alla</button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Contact section -->
<section id="kontakta" class="container-fluid i_contact" role="complementary">
    <div class="row-fluid i_contact">
        <div class="col-xs-12 i_contact_container">
            <!--<div class="col-xs-12 col-md-10 col-md-offset-1 i_contact_container">-->
            <div class="i_contact_text_top">
                <h2><?php print_field("i_kontakt_header"); ?></h2>
            </div>

            <div class="col-xs-10 col-xs-offset-1">

                <div class="i_contact_stuff_1 col-md-6 col-xs-12">
                    <img src="img/contact/Anders_bjork.jpg" alt="Anders Björk"
                         class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="i_contact_text col-xs-10 col-xs-offset-1">
                        <h2><?php print_field("i_contact_person_name_1")   ?></h2>
                        <p> <?php print_field("i_contact_person_number_1") ?></p>
                        <p> <?php print_field("i_contact_person_mail_1")   ?></p>
                    </div>
                </div>

                <div class="i_contact_stuff_2 col-md-6 col-xs-12">
                    <img src="img/contact/Anders_gustafsson.jpg" alt="Anders Gustafsson"
                         class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="i_contact_text col-xs-10 col-xs-offset-1">
                        <h2><?php print_field("i_contact_person_name_2")   ?></h2>
                        <p> <?php print_field("i_contact_person_number_2") ?></p>
                        <p> <?php print_field("i_contact_person_mail_2")   ?></p>
                    </div>
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
