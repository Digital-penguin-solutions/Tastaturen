<?php

    $to         = '';
    //$to         = 'anders.bjork@tastaturen.se';
    $subject    = 'Tastaturen Client';

    //$validation = false;
    include "functions.php";
    $con = connect();
    session_start();

    $email      = secure_str($_GET['email']);
    $name       = secure_str($_GET['name']);
    $number     = secure_str($_GET['phone']);
    $sec     = secure_str($_GET['sec']);
    $message     = secure_str($_GET['message']);

    if($sec == "sueweuey"){
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];

            $order = "En kund har gjort en intresseanmälan på följande produkter: \n";
            foreach($cart as $item){
                $product = get_product_by_id($con, $item);
                $name = $product['name'];

                $order .= $name . " \n";

            }

        }
        //$total_price = 0;


    //email function
    $message = <<<EMAIL
Name:                   \n $name \n
Email:                  \n $email \n
Phone number:           \n $number \n
Message:                \n $message \n
Order:                  \n $order \n

EMAIL;
    //$header = "From: $email";

        mail($to, $subject, $message);

    }
?>