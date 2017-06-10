<?php
//include "include_pages/loading.php";
$no_admin_info = "1";
include "partials/head.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="">
    <title>Admin page</title>
</head>

<?php
include "functions/functions.php";
session_start_custom();
$con = connect();
//$products = get_all_products($con, "");
$products_home = get_all_products($con, "hem");
$products_church = get_all_products($con, "kyrka");
?>
<body class="col-xs-10">
<?php include "partials/nav.php" ?>

<section class = "admin_page">
    <div class = "container-fluid full_height">
        <div class = "row full_height">
            <div class = "col-md-8 col-md-offset-2">
                <h1 class = "admin_header"> Admin page </h1>

                <?php
                if(isset($_GET['wrong'])){
                    echo "<h2 class = 'admin_header'> Wrong password, please try again </h2>";
                }

                if(isset($_SESSION['admin'])){
                    

//<<<<<<< HEAD
                //if(isset($_GET['logout'])){
                        //session_destroy();
                        //header("Location: admin.php");
                    //}
                    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1)) {
                        //session_unset();
                        //session_destroy();
                    }
                    $_SESSION['LAST_ACTIVITY'] = time();

                    if(isset($_GET['logout'])){
                        session_destroy();
                        header("Location: admin.php");
                    }
//>>>>>>> 4caa7c012b230d3c5abc555981cff94162220d81
                    if(isset($_GET['message'])){
                        $message = $_GET['message'];
                        echo "<h1 class = 'admin_message'>" . $message . "</h1>";

                    }

                    if(isset($_GET['change_password'])){

                        ?>
                        <form class="login change_password_form" action = "functions/login.php" method = "post">
                            <p>New password:</p>
                            <input placeholder = "New password" type = "password" name = "password"><br>
                            <input placeholder = "Repeat new password" type = "password" name = "password_repeat">
                            <input type = "submit" name = "set_password" value="Change">
                        </form>
                        <?php
                    }

                    if(isset($_GET['view']) && $_GET['view'] == "products"){
                    ?>
                    <div class = "row admin_all_products_container">
                        <h1 class = "products_type"> Home products </h1>

                        <?php
                            echo_admin_products($products_home);
                        ?>
                    </div>
                    <div class = "row admin_all_products_container">
                        <h1 class = "products_type"> Church products </h1>

                        <?php
                            echo_admin_products($products_church);
                        ?>
                    </div>
                    <?php
                    }
                    else if(isset($_GET['view']) && $_GET['view'] == "media"){
?>
                        <div class = "row admin_all_products_container">
<?php
                        $posts = get_all_media_posts_small($con);
                        echo_admin_media($posts);
?>
                        </div>
<?php
                        
                    }
                    else {


                    }

                }

                if(isset($_SESSION['admin'])){
                    ?>
                    <a href = "add_media.php" class = "add_product_button center_horizontally_css">
                        Add new media post
                    </a>
                    <a href = "add_product.php" class = "add_product_button center_horizontally_css">
                        Add a new product
                    </a>
                    <a href = "admin?change_password=" class = "add_product_button center_horizontally_css">
                        Change password
                    </a>
                    <a href = "functions/logout" class = "add_product_button center_horizontally_css">
                        Logout
                    </a>
                    <?php
                }
                else {
                    ?>
                    <form class="login hidden-sm hidden-xs" action = "functions/login.php" method = "post">
                        <p>PASSWORD:</p>
                        <input type = "password" name = "password">
                        <input type = "submit" name = "login" value="Login">
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

</body>
</html>
