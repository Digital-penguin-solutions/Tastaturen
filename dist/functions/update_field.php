<?php
session_start();
if(isset($_SESSION['admin'])){

    include "functions.php";
    $con = connect();

    if(isset($_GET['name']) && isset($_GET['new_value'])){
        $name = $_GET['name'];
        $value = $_GET['new_value'];

        update_field($name, $value);
        //echo"done";
    }
    
    //echo "<script> history.go(-1); </script>";
    $randi = rand(1,10000); // randomies a number to put in the URL to get around caching. This is so that the admin can see their changes instantly
    //header("Location: ../index?rand=$randi");
?> <script>var prev = document.referrer;
        prev = prev.split("?")[0];
        var rand = '<?php echo $randi; ?>';
        window.location.href = prev + "?r=" + rand;</script> <?php


    

}
else {
    header("Location: ../index");
}
?>