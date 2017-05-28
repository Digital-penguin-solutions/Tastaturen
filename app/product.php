<?php include "partials/head.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>produkter</title>
    <meta name="description" content="Tastaturen"/>
    <meta name="keywords" content="orgel, instrument, musik"/>
</head>

<body class="wrapper col-xs-12 col-md-10" id="page-top" class="index">
<?php include "partials/nav.php"?>
<?php
include "functions/functions.php";
$con = connect();

//$name = $_GET['n'];
//$product_id = get_product_id_by_name($con, $name);
$product_id = $_GET['id'];
$product = get_product_by_id($con, $product_id);
$short = $product['short_description'];
$name = $product['name'];
$long = $product['long_description'];
$price = $product['price'];
$main_image = $product['main_image'];
$about_image = $product['about_image'];
$slider_images = get_product_images_by_id($con, $product_id);


?>

<header class="container-fluid p_prod_head">
    <div class="row-fluid p_prod_head">
        <div class="col-xs-12 p_prod_head_container">

            <!-- Slider  off products-->
            <div class="slideshow hidden-xs hidden-sm">
                <div class="slideshow-image" style="background-image: url('img/product/kyrka/Sliders/1.jpg')"></div>
                <div class="slideshow-image" style="background-image: url('img/product/kyrka/Sliders/2.jpg')"></div>
                <div class="slideshow-image" style="background-image: url('img/product/kyrka/Sliders/3.jpg')"></div>
                <div class="slideshow-image" style="background-image: url('img/product/kyrka/Sliders/4.jpg')"></div>
                <div class="slideshow-image" style="background-image: url('img/product/kyrka/Sliders/5.jpg')"></div>
            </div>

            <!-- Bg for mobile insted of slider-->
            <div class="p_prod_head_slider_t"></div>

            <div class="p_prod_head_bg">

                <div class="p_prod_head_text">
                    <h1><?php echo $name;?></h1>
                    <h2><?php echo $short;?></h2>
                </div>
                <div class="p_prod_head_btn_broschyr">
                    <button>Ladda ner Broschyr</button>
                </div>
                <div class="p_prod_head_btn_order">
                    <button>Skicka en offert</button>
                </div>
                <div class="p_prod_head_img">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($main_image) ?>" alt="Huvudbild"/>
                </div>
            </div>
        </div>
    </div>
</header>

<!--information aboute the pruduct-->
<section class="container-fluid p_info">
    <div class="row-fluid p_info">
        <div class="col-xs-12 p_info_container">
            <div class="p_info_text col-xs-4 col-xs-offset-1">
                <h1><?php echo $name; ?></h1>
                <h3>PRICE: <?php echo $price; ?></h3>
                <p> <?php echo $long; ?></p>
            </div>
            <div class="p_info_img  col-xs-4">
                <img src="img/product/kyrka/example3.png" alt="" class="col-xs-12">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($main_image) ?>" alt="Huvudbild"/>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid p_slider">
    <div class="row-fluid p_slider_container">
        <img src="img/product/kyrka/example4.jpg" alt="exempel4">
    </div>
</section>

<section class="container-fluid p_info2">
    <div class="row-fluid p_info2_container">
        <div class="col-xs-8 col-xs-offset-2 p_info2_text">
            <h1>kgaeklg</h1>
            <p>kanflansfknwofn fawn pfnwpnfpwanfpanwf</p>
        </div>
        <div class="p_info2_btn">
            <button>För mer information</button>
        </div>
    </div>
</section>

<?php include "partials/footer.php" ?>
</body>
</html>
