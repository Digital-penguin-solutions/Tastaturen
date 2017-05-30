<?php include "partials/head.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>prudukt detaljer</title>
    <meta name="description" content="Tastaturen"/>
    <meta name="keywords" content="orgel, instrument, musik"/>
</head>

<body class="wrapper col-xs-12 col-md-10" id="page-top" class="index">
<?php

include "partials/nav.php";
include "functions/functions.php";
$con = connect();
?>

<!--Header -->
<header class="container-fluid pe_header">
    <div class="row-fluid pe_header_container col-xs-12">
        <div class="pe_header_bg"></div>
        <div class="pe_header_text col-xs-6">
            <h1>Orglar för kyrkobruk</h1>
            <p>Det finns många finna orglar. Dessa orglar är mycket fina och kan göra mycket
                fina saker.</p>
        </div>
    </div>
</header>

<!-- Show all the products-->
<!--<section class="container-fluid pe_prod">
    <div class="row-fluid pe_prod">
        <div class="col-xs-12 pe_prod_container">
            <div class="col-xs-8 col-xs-offset-2 pe_sort_container">
                <div class = "center_horizontally_css pe_sort_buttons">
                    <h3> Sort by </h3>
                    <button onclick="sortByName(this)" class="">Name</button>
                    <button onclick="sortByPrice(this)" class="">Price</button>
                </div>
            </div>

            <?php
$products = get_all_visible_products($con, "");

foreach($products as $product){
    $name = $product['name'];
    $short = $product['short_description'];
    $price = $product['price'];
    $image = $product['main_image'];
    $type = $product['type'];
    ?>
                <div class="col-xs-8 col-xs-offset-2 pe_product">

                    <div class = "col-xs-6 pe_product_text">
                        <h1> <?php echo $name;?> </h1>
                        <p class = "pe_product_short"> <?php echo $short;?> </p>
                        <p class = "pe_product_price"> <?php echo $price;?> </p>
                        <p class = "hidden pe_product_type"> <?php echo $type;?> </p>
                        <button onclick="location.href='product_details'" class="">Läs mer</button>
                    </div>

                    <div class = "pe_product_img">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($image) ?>" alt="Huvudbild"/>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>-->

<section class="container-fluid pe_prod">
    <div class="row-fluid pe_prod">
        <div class="col-xs-12 pe_prod_container">

            <div class="pe_prod_sort col-xs-12">
                <h1>Sortera</h1>
                <div class="pe_prod_btn">
                    <button class="pe_product_price">Pris</button>
                    <button class="pe_product_name">Namn</button>
                </div>
            </div>

            <div class="pe_prod_contariner2 col-xs-11 col-xs-offset-1">

                <a href="#" class="pe_prod_prod col-xs-5">
                    <img src="img/product/kyrka/example.png" alt="product img">
                    <h1>fin orgel</h1>
                    <p>mycket fin orgel</p>
                </a>

                <a href="#" class="pe_prod_prod col-xs-5 col-xs-offset-1">
                    <img src="img/product/kyrka/example.png" alt="product img">
                    <h1>fin orgel</h1>
                    <p>mycket fin orgel</p>
                </a>

                <a href="#" class="pe_prod_prod col-xs-5">
                    <img src="img/product/kyrka/example.png" alt="product img">
                    <h1>fin orgel</h1>
                    <p>mycket fin orgel</p>
                </a>

                <a href="#" class="pe_prod_prod col-xs-5 col-xs-offset-1">
                    <img src="img/product/kyrka/example.png" alt="product img">
                    <h1>fin orgel</h1>
                    <p>mycket fin orgel</p>
                </a>


            </div>
        </div>
    </div>
</section>

<?php include "partials/footer.php" ?>
</body>
</html>
