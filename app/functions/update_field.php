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
    //header("Location: ../index?rand=$randi");
?>

<?php
}
else {
    header("Location: ../index");
}
?>
