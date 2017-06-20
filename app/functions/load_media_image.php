<?php

    include "functions.php";
    $con = connect();
    $id = secure_str($_GET['id']);
    $media = get_media_by_id($con, $id);
    $data = $media['header_image'];

    header("Content-Type: image/jpeg");
    echo $data;
?>
