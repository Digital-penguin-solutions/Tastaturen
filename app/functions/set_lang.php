<?php

    session_start();
    if($_GET['lang'] == "sv" || $_GET['lang'] == "dk"){
        $_SESSION['lang'] = $_GET['lang'];
    }
    else {
        $_SESSION['lang'] = "sv";
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
<!--
<script>
//window.history.back();

</script>
-->
