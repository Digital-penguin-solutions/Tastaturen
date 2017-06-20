<?php

    include "functions.php";
    $con = connect();
    $id = secure_str($_GET['id']);
    $image = get_product_by_id($con, $id);
    $data = $image['main_image'];

    header("Content-Type: image/jpeg");
    echo $data;
?>
