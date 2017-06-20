<?php

if(isset($_GET['scroll'])){
    $scroll = "data-scroll";
}
else {
    $scroll = "";
}
?> <nav class="nav_d col-md-2 col-xs-7" role="navigation"><div class="nav_d_container"><div class="nav_d_triage"></div><!-- cart icon --><div class="nav_cart"><a href="#" class="offert_open"><i class="fa fa-bell-o"></i> Kontakta för köp</a></div><!-- Logo --><div class="nav_d_logo"><a href="index"><img src="img/logo/Tastaturen/Logo_white.svg" alt="Tastaturen logo"></a></div><!--Nav links--><div class="nav_d_link"><a class="nav_link" <?php echo $scroll; ?> href="index#Intro">Hem</a> <a class="nav_link" <?php echo $scroll; ?> href="index#Info">Om oss</a> <a class="nav_link" <?php echo $scroll; ?> href="product_details?t=hem">Orglar för hemmet</a> <a class="nav_link" <?php echo $scroll; ?> href="product_details?t=kyrka">Orglar för kyrkan </a><a class="nav_link" <?php echo $scroll; ?> href="index#kontakta">Kontakta oss</a> <a class="nav_link" <?php echo $scroll; ?> href="index#Media">Media</a></div></div></nav><!--todo Fixa animering och visa nav på mobil och tablet--><div class="nav_d_btn hidden-md hidden-lg"><ul class="nav_button_container"><li><a class="McButton" data="hamburger-menu"><b></b> <b></b> <b></b></a></li></ul></div><div id="desktop_check" class="hidden-sm hidden-xs"></div><form id="form_stored_image"></form>