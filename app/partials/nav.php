<?php
$con = connect();
?>

<nav class="nav_d col-md-2 col-xs-7" role="navigation">

    <div class="nav_d_container">

        <div class="nav_d_triage"></div>

        <!-- cart icon -->
        <div class="nav_cart">
            <a href = "#" class="offert_open">
                <i class="fa fa-bell-o"> </i>
                <?php print_field("i_kontakt_header");?>
            </a>
        </div>

        <!-- Logo -->
        <div class="nav_d_logo">
            <a href="index">
                <img src="img/logo/Tastaturen/Logo_white.svg" alt="Tastaturen logo">
            </a>
        </div>

        <!--Nav links-->
        <div class="nav_d_link">
            <a class = "nav_link" href="index#Intro"><?php print_field("i_home_header"); ?></a>
            <a class = "nav_link" href="index#Info"><?php print_field("i_about_header"); ?></a>
            <a class = "nav_link" href="product_details?t=kyrka"><?php print_field("i_kyrka_header"); ?></a>
            <a class = "nav_link" href="product_details?t=hem"><?php print_field("i_hem_header"); ?></a>
            <a class = "nav_link" href="index#kontakta"><?php print_field("i_kontakt_header"); ?></a>
            <a class = "nav_link" href="index#lankar"><?php print_field("i_link_header"); ?></a>
            <a class = "nav_link" href="index#event"><?php print_field("i_event_header"); ?></a>
            <a class = "nav_link" href="index#Media"><?php print_field("i_media_header"); ?></a>
        </div>
    </div>
    <div class = "lang_container">
        <a href = "functions/set_lang.php?lang=sv" class = "swedish_btn">Svenska</a>
        <a href = "functions/set_lang.php?lang=dk" class = "dansih_btn">Dansk</a>
    </div>
</nav>

<!--todo Fixa animering och visa nav på mobil och tablet-->
<div class="nav_d_btn hidden-md hidden-lg">
    <ul class = "nav_button_container">
        <li>
            <a class = "McButton" data = "hamburger-menu">
                <b></b>
                <b></b>
                <b></b>
            </a>
        </li>
    </ul>
</div>
<div id = "desktop_check" class = "hidden-sm hidden-xs"> </div>
<form id = "form_stored_image"> </form>
