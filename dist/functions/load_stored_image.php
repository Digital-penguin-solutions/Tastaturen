<?php

include "functions.php";
$con = connect();
$name = secure_str($_GET['name']);
$image = get_stored_image_by_name($con, $name);
$data = $image['data'];

header("Content-Type: image/jpeg");
echo $data;


?>