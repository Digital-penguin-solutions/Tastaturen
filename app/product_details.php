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

<section class="container-fluid pe_prod">
    <div class="row-fluid pe_prod">
        <div class="col-xs-12 pe_prod_container">
            <div class="col-xs-8 col-xs-offset-2 pe_sort_container">

                    <div class = "center_horizontally_css">
                        <h3> Sort by </h3>
                        <button onclick="sortByName()" class="">Name</button>
                        <button onclick="sortByPrice()" class="">Price</button>
                    </div>
            </div>

            <?php
                $products = get_all_visible_products($con, "");


                foreach($products as $product){
                    $name = $product['name'];
                    $short = $product['short_description'];
                    $price = $product['price'];
                    $image = $product['main_image'];
                    ?>
                    <div class="col-xs-8 col-xs-offset-2 pe_product">

                        <div class = "col-xs-6">
                            <h1 class = "pe_name"> <?php echo $name;?> </h1>
                            <p> <?php echo $short;?> </p>
                            <p class = "pe_price"> <?php echo $price;?> </p>
                            <button onclick="location.href='product_details'" class="">Läs mer</button>
                        </div>
                        <div class = "col-xs-6">
                            <img class = "center_css" src="data:image/jpeg;base64,<?php echo base64_encode($image) ?>" alt="Huvudbild"/>
                        </div>
                        

                    </div>
                    <?php
                }

            ?>


        </div>
    </div>
</section>

<?php include "partials/footer.php" ?>
</body>
</html>
