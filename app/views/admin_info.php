<?php
    
if(!isset($no_admin_info)){
    session_start();

    if(isset($_SESSION['admin'])){
    ?>
        <div class = "admin_info_container">
            <p>You are currently logged in as admin. You can click on most textfields to edit them.</p>
            <p>To edit products, use the <a href = 'admin'>admin page</a></p>
        </div>
    <?php
    }
}

?>
