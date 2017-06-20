
<h1 class="col-xs-offset-1">Produkter</h1>
<?php
    include "functions.php";
    $con = connect();
    session_start();
    $cart = $_SESSION['cart'];

    foreach($cart as $item){
        $product = get_product_by_id($con, $item);
        $name = $product['name'];
        $price = $product['price'];
        $short = $product['short_description'];
        $image = $product['main_image'];
    ?>
        <div class="offert_product_sak col-xs-10 col-xs-offset-1">
            <img product_id = "<?php echo $item; ?>"class = "cart_remove" src="img/cross.svg" alt="">
            <div class="offert_product_text col-xs-6">
                <h1><?php echo $name;?></h1>
                <p><?php echo $short;?></p>
                <p><?php echo $price;?></p>
            </div>

            <div class="offert_product_img col-xs-5">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" alt="Huvudbild"/>
            </div>
        </div>

<?php
    }

?>
