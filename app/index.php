<?php include "partials/head.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tastaturen</title>
    <meta name="description" content="Tastaturen"/>
    <meta name="keywords" content="orgel, instrument, musik"/>
</head>

<body class="wrapper col-xs-12 col-md-10" id="page-top" class="index">
<?php 
include "partials/nav.php";
include "functions/functions.php";
$con = connect();

$products_home = get_all_visible_products($con, "hem");
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
                            <div class = "slider_page col-md-12">

                                <div class = "background_image_container">
                                    <img src = "" alt = "">
                                </div>

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
<<<<<<< HEAD
                                        <button onclick="location.href='pruduct_details'">Kyrko bruk</button>
=======
                                        <button class = "slide-in-delay-3 slide-in slide-in-left">Kyrko bruk</button>
>>>>>>> origin/master
                                    </div>
                                </div>

                                <div class="i_slider_1_right col-xs-6">

                                    <div class="i_slider_1_right_img">
                                        <img src="img/Index_slider/Slider_1_r.png" alt="Orgel för hemma bruk">
                                    </div>

                                    <div class="i_slider_1_right_btn">
                                        <p>Herp derpsum perp dee derp, mer herderder.
                                            Sherp berp derpler,</p>
<<<<<<< HEAD
                                        <button onclick="location.href='pruduct_details'">Hemma bruk</button>
=======
                                        <button class = "slide-in-delay-3 slide-in">Hemma bruk</button>
>>>>>>> origin/master
                                    </div>
                                </div>

                            </div>

                            <div class = "slider_page col-md-12">
                                <div class = "background_image_container">
                                    <img src = "img/404_img.jpg" alt = "MetTempMobile">
                                </div>
                                HELLLLLLllllO
                                adssssssssssssssssssssssssssssssssssssssssssssss
                                adssssssss
                                <br>
                                asdasdas2
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
            <h2>Vi är Tastaturen</h2>
            <p>Vi levererar digitala kyrkorglar för alla behov.
                Kontakta oss gärna för mer information eller för
                en personlig demonstration i Er kyrka.
                Vi kan även förmedla kontakt med kyrkor
                där en Rodgers eller en Johannus digitalorgel har installerats.
            </p>
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
                <h2>Kyrko Orglar</h2>

                <!--l eft and right arrow slider-->
                <div class="i_products_arrow_l">
                    <img src="img/Index_slider/left_arrow.svg" alt="Slide left">
                </div>
                <div class="i_products_arrow_r">
                    <img src="img/Index_slider/right_arrow.svg" alt="Slide right">
                </div>

                <?php echo_products_index($products_church);?>


                <button onclick="location.href='pruduct_details'" class="i_products_btn">Kyrko bruk</button>
            </div>

            <!-- Products Hemma -->
            <div class="product_slider_container i_products col-xs-12" id="Orgel-hem">
                <h2>Hemma Orglar</h2>

                <!--l eft and right arrow slider-->
                <div class="i_products_arrow_l">
                    <img src="img/Index_slider/left_arrow.svg" alt="slide left">
                </div>
                <div class="i_products_arrow_r">
                    <img src="img/Index_slider/right_arrow.svg" alt="Slide right">
                </div>

                <?php echo_products_index($products_home);?>


                <button onclick="location.href='pruduct_details'" class="i_products_btn">Hemma bruk</button>
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
                <h2>Kontakta oss</h2>
            </div>

            <div class = "col-xs-offset-2 col-xs-8">
                <img src="img/contact/Anders_bjork.jpg" alt="Anders Björk" class="col-xs-5">
                <img src="img/contact/Anders_gustafsson.jpg" alt="Anders Gustafsson" class="col-xs-5 col-xs-offset-2">

                <div class="col-xs-5 i_contact_text" >
                    <h2>Anders Björk</h2>
                    <p>070-1090230</p>
                    <p>ab@tastaturen.se</p>
                </div>

                <div class="col-xs-5 col-xs-offset-2 i_contact_text">
                    <h2>Anders Gustafsson</h2>
                    <p>070-6858037</p>
                    <p>agf@tastaturen.se</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Media section -->
<section id="Media" class="container-fluid i_media">
    <div class="row-fluid i_media">
        <div class="col-xs-12 i_media_container">
        </div>
    </div>
</section>

<?php include "partials/footer.php" ?>
</body>
</html>
