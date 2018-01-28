<?php
//variables for email
$to         = '';
//$to         = 'anders.bjork@metsense.com';
$subject    = 'Tastaturen client';
$email      = $_POST['email'];
$fname      = $_POST['fname'];
$number     = $_POST['number'];
$validation = false;

//validation
if($_POST){
    if(!$captcha){
        $feedback = "Please finish the captcha to prove that you're not a robot";
        header("Location: finish_order.php?feedback=$feedback&email=$email&number=$number&fname=$fname");

    }
    else if($email == '' || $number == '' || $fname == ''){
        $feedback = 'Please fill out all the fields';
        header("Location: finish_order.php?feedback=$feedback&email=$email&number=$number&fname=$fname");
    }
    //email calidator
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedback = "Invalid email format";
        header("Location: finish_order.php?feedback=$feedback&email=$email&number=$number&fname=$fname");
    }
    else{
        $validation = true;
    }

    $secret = "6Lc8XRsUAAAAALlyI5fqFW5_rssCTvMtaefXfJBP";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'secret' => $secret,
        'response' => $captcha
    ]);

    $response = curl_exec($ch);
    $response = json_decode((string)$response);

    curl_close($ch);
    $val = $response->success;

    /*$response = file_get_contents($url, false, $context);*/
    //echo $response;
    if($val){
    }
    else{
        $validation = false;
        $feedback = "Failed to verify captcha, please try again later";
        header("Location: finish_order.php?feedback=$feedback&email=$email&number=$number&cname=$fname");
    }
}

if($validation){
    include "functions.php";
    $con = connect();
    session_start();

    $products = array();
    if (isset($_SESSION['cart_ids']) && isset($_SESSION['cart_num'])) {
        $cart_ids = $_SESSION['cart_ids'];
        $cart_num = $_SESSION['cart_num'];

        foreach($cart_ids as $id){
            $product    = get_product_by_id($con, $id);
            $products[] = $product;
        }
    }
    $total_price = 0;

    foreach ($products as $index=>$product){

        $num                = $_SESSION['cart_num'][$index];
        $total_price_single = $_SESSION['cart_num'][$index] * $product['price'];
        $total_price        += $total_price_single;
    }

    $cart_ids = $_SESSION['cart_ids'];
    $cart_num = $_SESSION['cart_num'];

    $order = "";
    foreach($cart_ids as $i=>$id){
        $product = get_product_by_id($con, $id);
        $products[] = $product;
        $name = $product['name'];
        $order .= $name . " x" . $cart_num[$i] . "\n";
    }

//email function
    $message = <<<EMAIL
Name:                   \n $fname \n
Email:                  \n $email \n
Phone number:           \n $number \n
Order:                  \n $order \n
Total price:            \n $total_price \kr \n

EMAIL;
//$header = "From: $email";

    mail($to, $subject, $message);
}
else {
    echo "<h1> Something has gone wrong, please try again later or contact ab@tastaturen.se</h1>";
}
?>