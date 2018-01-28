<?php
if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];


    if(isset($_POST['thanks'])){

        include "function/email.php";
        // clears the cart
        $_SESSION['cart_ids'] = array();
        $_SESSION['cart_num'] = array();
        ?> <?php
    }
}
include "partials/loading.php";
include "partials/head.php";
?> <!DOCTYPE html><html lang="en"><head><title>Tastaturen Home</title><meta name="description" content="Tastaturen"><meta name="keywords" content="orgel, instrument, musik"></head><body> <?php include "function/functions.php"; ?> <section id="finish_order" class=""><h1 class="checkout_header">Thank you!</h1><h3 class="admin_header">Your order has been sent to us and we will be in contact with further instructions very soon.<br><br>Please contact <strong>info2@metsense.com</strong> if you have any more questions in the meantime.</h3><a href="index" class="blue finish_button col-xs-3 col-xs-offset-5">Home</a></section></body></html>