<?php session_start (); ?>
<!DOCTYPE html>
<?php include "partials/head.php" ?>
<html lang="swe">
<head>
    <title>Tastaturen - återförsäljare av orglar</title>
    <meta name="description" content="Tastaturen är en återförsäljare av orglar för både kyrkan och hemmet."/>
    <meta name="keywords" content="orgel,instrument,musik,orgel återförsäljare,johannus,rogerinstrument"/>

    <script async src="https://www.youtube.com/iframe_api"></script>


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTIpo_wrgCsz4EP3GCGKLpFDKvJL_R1Dk&callback=initMap">
    </script>
</head>

<body class="wrapper col-xs-12 col-md-10 index" id="page-top">
<?php
include "partials/nav.php";
include "functions/functions.php";

$con = connect();
$products_home = get_all_visible_products($con, "hem");
$products_church = get_all_visible_products($con, "kyrka");
$links = get_all_links($con);
$events = get_all_events($con);
?>
<!-- Header -->
<header id="Intro" class="container-fluid i_header" role="banner">
    <div class="row-fluid i_header">
        <?php include "views/index_header.php" ?>
    </div>
</header>

<!-- Info section -->
<section id="Info" class="container-fluid i_info" role="main">
    <div class="row-fluid i_info">
        <div class="col-xs-12 col-md-10 col-md-offset-1 i_info_container">
            <h2><?php print_field("i_about_header"); ?></h2>
            <p class="col-xs-offset-21col-xs-10 col-md-offset-2 col-md-8">
                <?php print_field("i_about_text"); ?>
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

<!-- Event -->
<?php
if (!empty($events)) {
    include "views/events.php";
}
?>

<!-- Products -->
<section id="Produkter" class="container-fluid i_products" role="complementary">
    <div class="row-fluid i_products">
        <div class="col-xs-12 i_products_container">

            <!-- Products Kyrka -->
            <div class="product_slider_container i_products col-xs-12" id="Orgel-kyrka">
                <h2><?php print_field("i_kyrka_header"); ?></h2>

                <!--l eft and right arrow slider-->
                <div class="i_products_arrow_l">
                    <img src="img/Index_slider/left_arrow.svg" alt="Slide left">
                </div>
                <div class="i_products_arrow_r">
                    <img src="img/Index_slider/right_arrow.svg" alt="Slide right">
                </div>

                <div class="i_products_slider">
                    <?php echo_products_index($products_church); ?>
                </div>

                <div class="i_products_bt_container">
                    <button onclick="location.href='product_details?t=kyrka'" class="i_products_btn">Visa alla</button>
                </div>
            </div>

            <!-- Products Home -->
            <div class="product_slider_container i_products col-xs-12" id="Orgel-hem">
                <h2><?php print_field("i_hem_header"); ?></h2>

                <!--l eft and right arrow slider-->
                <div class="i_products_arrow_l">
                    <img src="img/Index_slider/left_arrow.svg" alt="slide left">
                </div>
                <div class="i_products_arrow_r">
                    <img src="img/Index_slider/right_arrow.svg" alt="Slide right">
                </div>

                <div class="i_products_slider">
                    <?php echo_products_index($products_home); ?>
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
                    <?php echo_stored_image_data($con, 'contact_1', "col-xs-12 col-md-10 col-md-offset-1"); ?>
                    <div class="i_contact_text col-xs-10 col-xs-offset-1">
                        <h2><?php print_field("i_contact_person_name_1") ?></h2>
                        <p> <?php print_field("i_contact_person_number_1") ?></p>
                        <p> <?php print_field("i_contact_person_mail_1") ?></p>
                    </div>
                </div>

                <div class="i_contact_stuff_2 col-md-6 col-xs-12">
                    <?php echo_stored_image_data($con, 'contact_2', "col-xs-12 col-md-10 col-md-offset-1"); ?>
                    <div class="i_contact_text col-xs-10 col-xs-offset-1">
                        <h2><?php print_field("i_contact_person_name_2") ?></h2>
                        <p> <?php print_field("i_contact_person_number_2") ?></p>
                        <p> <?php print_field("i_contact_person_mail_2") ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Links and other info -->
<section id="lankar" class="i_info2 container-fluid">
    <div class="i_info2 row-fluid">
        <div class="i_info2_container col-xs-12">
            <h1><?php print_field("i_link_header"); ?></h1>
            <div class="i_info2_text_container col-md-6 col-md-offset-3  col-xs-10 col-xs-offset-1">
                <div class="i_info2_link_container">
                    <?php
                    foreach ($links as $link) {
                        $name = translate($link, 'name');
                        $href = $link['href'];
                        ?>

                        <a href="<?php echo $href ?>"><?php echo $name ?></a>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Media section -->
<?php include "views/index_media.php" ?>

<!-- Map info -->
<section class="container-fluid i_map">
    <div class="row-fluid i_map">
        <div class="col-xs-12 i_map_container">
            <div class="i_map_info" id="map"></div>
            <div class="i_map_text_container" id="i_map">
                <h1>Välkommen till vår fysiska butik i Danmark</h1>
                <h3>Klicka för att visa kartan</h3>
                <h3>Naverland 29, 2600 Glostrup</h3>
                <i class="fa fa-map-marker"></i>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include "partials/footer.php" ?>
</body>
</html>
