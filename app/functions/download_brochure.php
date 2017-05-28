<?php

include "functions.php";
$con = connect();

$product_id = secure_str($_GET['product_id']);

$brochure_data = get_product_brochure_by_id($con, $product_id);
$product_name = get_product_name_by_id($con, $product_id) . ".pdf";

header('Content-Disposition: attachment; filename="'.$product_name.'"');
//header('Content-Disposition: attachment; filename="test"');
header("Content-type: application/pdf");

echo $brochure_data; 

exit();

?>
