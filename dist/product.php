<?php include "partials/head.php" ?> <!DOCTYPE html><html lang="swe"><head><title>Tastaturen - Produkter</title><meta name="description" content="Tastaturens produkt sida. Här kan du läsa om alla våra olika produkter"><meta name="keywords" content="orgel,instrument,musik,orgel återförsäljare,johannus,rogerinstrument"></head><body class="wrapper col-xs-12 col-md-10" id="page-top" class="index"> <?php include "partials/nav.php"?> <?php
include "functions/functions.php";
$con = connect();
//session_start();

//$_SESSION['cart'] = array();

//$name         = $_GET['n'];
//$product_id   = get_product_id_by_name($con, $name);
$product_id     = $_GET['id'];
$product        = get_product_by_id($con, $product_id);
$short          = $product['short_description'];
$name           = $product['name'];
$long           = $product['long_description'];
$price          = $product['price'];
$main_image     = $product['main_image'];
$about_image    = $product['about_image'];
$slider_images  = get_product_images_by_id($con, $product_id);
?> <header class="container-fluid p_prod_head" role="banner"><div class="row-fluid p_prod_head"><div class="col-xs-12 p_prod_head_container"><!-- Slider  off products--><div class="slideshow hidden-xs hidden-sm"> <?php
                foreach($slider_images as $image){?> <div class="slideshow-image" style="background-image: url(data:image/jpeg;base64,<?php echo base64_encode($image['data'])?> )"></div> <?php } ?> </div><!-- Bg for mobile insted of slider--><div class="hidden-lg hidden-md p_prod_slider_container" style="background-image:url(data:image/jpeg;base64,<?php echo base64_encode($slider_images[0]['data'])?>)"></div><div class="p_prod_head_bg"><div class="p_prod_head_text col-xs-8 col-xs-offset-2"><h1><?php echo $name;?></h1><h2><?php echo $short;?></h2></div><button onclick="location.href='functions/download_brochure?product_id=<?php echo $product_id; ?>'" class="p_prod_head_btn_broschyr">Ladda ner Broschyr</button> <button product_id="<?php echo $product_id; ?>" class="send_offert p_prod_head_btn_order">Skicka en offert</button><div class="p_prod_head_img"><img src="data:image/jpeg;base64,<?php echo base64_encode($main_image) ?>" alt="orgel produkt bild"></div></div></div></div></header><!--information about the product--><section class="container-fluid p_info" role="main"><div class="row-fluid p_info"><div class="col-xs-12 p_info_container"><div class="p_info_text col-md-4 col-md-offset-1 col-xs-12"><h1><?php echo $name; ?></h1><h3>PRICE: <?php echo $price; ?></h3><p> <?php echo $long; ?></p></div><div class="p_info_img col-md-4 col-md-offset-0 col-xs-10 col-xs-offset-1"><img class="" src="data:image/jpeg;base64,<?php echo base64_encode($main_image) ?>" alt="orgel produkt bild"></div></div></div></section><section class="container-fluid p_slider" role="complementary"><div class="row-fluid p_slider_container"><div class="all_slider_container no_list"> <?php
            foreach($slider_images as $image){
                ?> <!-- Slider 1--><div class="slider_page col-xs-12"><img class="p_slider_image col-xs-12" src="data:image/jpeg;base64,<?php echo base64_encode($image['data']); ?>" alt="orgel silders"></div> <?php } ?> </div></div></section><section class="container-fluid p_info2" role="complementary"><div class="row-fluid p_info2_container"><div class="col-xs-8 col-xs-offset-2 p_info2_text"><h1><?php echo $name; ?></h1><p> <?php echo $short;?></p></div><div class="p_info2_btn"><button>För mer information ladda ner Broschyr</button></div></div></section> <?php include "partials/footer.php"?> </body></html>