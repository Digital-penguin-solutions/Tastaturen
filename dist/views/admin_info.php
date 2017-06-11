<?php



if(!isset($no_admin_info)){
    include "functions/functions.php";
    session_start_custom();

    if(isset($_SESSION['admin'])){
        ?> <div class="admin_info_container hidden-sm hidden-xs" id="admin_info"><img id="clickme" src="img/cross.svg" alt=""><p class="admin_info_p">You are currently logged in as admin. You can click on most textfields to edit them.</p><p>To edit products, use the <a href="admin">admin page</a></p></div> <?php
    }
}
?> <script>$( "#clickme" ).click(function() {
        $( "#admin_info" ).hide( "slow", function() {
            alert( "Animation complete." );
        });
    });</script>