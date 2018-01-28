<?php
    session_start();
    if(isset($_SESSION['admin'])){
        include "../functions/functions.php";
        $con    = connect();
        $id     = secure_str($_GET["id"]);

        // deletes the product
        $query  = "DELETE FROM link WHERE link_id = '$id'";

        $select = mysqli_query($con, $query) or die (mysqli_error($con));

        // deletes all the slider_images of this product
        //$query  = "DELETE FROM product_image WHERE product_id = '$id'";

        //$select = mysqli_query($con, $query) or die (mysqli_error($con));

        header("Location: ../admin?view=links&message=Link has been deleted");
    }
    else{
        header("Location: ../index");
    }
?>