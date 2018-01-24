<?php
if(!isset($no_admin_info)){
    include "functions/functions.php";
    session_start_custom();

    if(isset($_SESSION['admin'])){
        ?>
        <!--<div class = "admin_info_container hidden-sm hidden-xs">
            <img id="admin_info_cross" src="img/cross.svg" alt="close">
            <p class="admin_info_p">You are currently logged in as admin. You can click on most textfields and images to edit them.</p>
            <p>To edit products and media posts, please use the <a href = 'admin'>admin page</a></p>
        </div>-->
        <?php
    }
}
?>
