<?php

    include "functions.php";
    $con = connect();
    $id = secure_str($_GET['id']);
    $product = get_product_by_id($con, $id);
    $data = $product['main_image'];

    header("Content-Type: image/jpeg");
    echo $data;
?>
