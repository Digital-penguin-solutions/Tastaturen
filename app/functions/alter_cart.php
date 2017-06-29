<?php

session_start();
include "functions.php";

if(isset($_SESSION['cart'])){

    if(isset($_GET['add'])){
        $product_id = secure_str($_GET['product_id']);
        if(!in_array($product_id, $_SESSION['cart'])){
            $_SESSION['cart'][] = $product_id;
        }
    }
    else if(isset($_GET['remove'])) {
        $index = array_search($_GET['product_id'], $_SESSION['cart']);
        unset($_SESSION['cart'][$index]);
    }
}

else {
    $_SESSION['cart'] = array();
}

?>