<?php


    include "functions.php";
    session_start();
    $con = connect();

    if(isset($_SESSION['admin'])){
        $images_array = array();
        read_image($con, "stored_image");
        $name = read_image_id($con, "stored_image");
        $data = $images_array[0][0];

        update_stored_image($con, $name, $data);

        
    $randi = rand(1,10000); // randomies a number to put in the URL to get around caching. This is so that the admin can see their changes instantly
    ?> <script>var prev = document.referrer;
        var split = prev.split("?")[0];
        //prev = split[0];
        var rand = '<?php echo $randi; ?>';
        if(prev.indexOf("?") == -1){
            window.location.href = prev + "?r=" + rand;
        }
        else {
            window.location.href = prev + "&r=" + rand;
        }
        //window.location.href = prev + "?r=" + rand + "&" + split[1];
        //window.location.href = prev + "&r=</script> <?php

        
    }
    else {
        header("Location: ../admin.php");
    }


?>