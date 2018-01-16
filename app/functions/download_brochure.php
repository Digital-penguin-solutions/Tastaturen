<?php

include "functions.php";
$con = connect();

$product_id = secure_str($_GET['product_id']);

$brochure_data = get_product_brochure_by_id($con, $product_id);
$brochure_name = get_product_brochure_name_by_id($con, $product_id) . ".pdf";

if($brochure_name == ".pdf"){
    $brochure_name = "Brochure.pdf";
}


header('Content-Disposition: attachment; filename="'.$brochure_name.'"');
//header('Content-Disposition: attachment; filename="test"');
//header("Content-type: application/pdf");

echo $brochure_data; 

//exit();
?>
