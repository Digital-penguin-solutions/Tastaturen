<?php include "partials/head.php"; ?>
<!DOCTYPE html>
<html lang="swe">
<head>
    <title>Tastaturen - Produkt detaljer</title>
    <meta name="description" content="En sida för att se alla våra vackra orglar. "/>
    <meta name="keywords" content="orgel,instrument,musik,orgel återförsäljare,johannus,rogerinstrument"/>
</head>

<body class="wrapper col-xs-12 col-md-10" id="page-top" class="index">
<?php

include "partials/nav.php";
include "functions/functions.php";
$con = connect();

if(isset($_GET['t'])){
    $type = $_GET['t'];
}
else {
    $type = "hem";
}
?>

<!--Header -->
<header class="container-fluid pe_header" role="banner">
    <div class="row-fluid pe_header_container col-xs-12">
        <div class="pe_header_bg">
            <?php
            if($type == "hem"){
                echo_stored_image_data($con, 'pe_header_home', "");
            }
            else {
                echo_stored_image_data($con, 'pe_header_church', "");
            }
            ?>
        </div>
        <div class="pe_header_text col-md-6 col-xs-12">
            <h1>
                <?php
                if($type == "hem"){
                    print_field("pe_header_home");
                }
                else {
                    print_field("pe_header_church");
                }
                ?>
            </h1>
        </div>
    </div>
</header>

<!-- Show all the products-->
<section class="container-fluid pe_prod" role="main">
    <div class="row-fluid pe_prod">
        <div class="col-xs-12 pe_prod_container">
            <div class="pe_prod_container2 col-xs-11">
                <?php
                $products = get_all_visible_products($con, $type);
                $len        = count($products);
                //$odds       = 'prud-big';
                $odd        = 'col-xs-11 col-xs-offset-1';
                $even       = 'col-md-5 col-xs-offset-1 col-xs-11';

                foreach($products as $i=>$product){
                    $name = $product['name'];
                    $short = translate($product,'short_description');
                    $price = translate($product,'price');
                    $image = $product['main_image'];
                    $id = $product['product_id'];
                    $type = $product['type'];

                    //check if the last pruduct is alone then it covers the entier page
                    if (($i == $len-1) && ($len%2 == 1)){
                        $size     = $odd;
                        //$size_big = $odds;
                    }
                    else{
                        $size     = $even;
                        //$size_big = Null;
                    }
                    ?>
                    <a href="product?id=<?php echo $id; ?>" class="pe_prod_prod <?php echo $size ?>">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($image) ?>" alt="Bild på orgel"/>
                        <h1 class = "pe_name"><?php echo $name;?></h1>
                        <p><?php echo $short;?> </p>
                        <p class = "pe_price"><?php echo $price;?></p>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php include "partials/footer.php" ?>
</body>
</html>
