<?php
    session_start();
    if(isset($_SESSION['admin'])){
        include "../functions/functions.php";
        $con    = connect();
        $id     = secure_str($_GET["id"]);

        // deletes the event
        $query  = "DELETE FROM event WHERE event_id = '$id'";

        $select = mysqli_query($con, $query) or die (mysqli_error($con));

        // deletes all the slider_images of this product
        //$query  = "DELETE FROM product_image WHERE product_id = '$id'";

        //$select = mysqli_query($con, $query) or die (mysqli_error($con));

        header("Location: ../admin?view=events&message=Event has been deleted");
    }
    else{
        header("Location: ../index");
    }
?>
