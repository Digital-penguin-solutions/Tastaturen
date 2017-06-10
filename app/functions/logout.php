<?php
include "functions.php";
session_start_custom();
if(isset($_SESSION['admin'])){

    session_destroy();
    header("Location: ../admin.php");
}
?>
