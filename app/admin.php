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

<section class = "admin_page col-xs-12">
    <div class = "container-fluid full_height">
        <div class = "row full_height">
            <div class = "col-xs-10 col-xs-offset-1">
                <h1 class = "admin_header"> Admin page </h1>

                <?php
                if(isset($_GET['wrong'])){
                    echo "<h2 class = 'admin_header'> Wrong password, please try again </h2>";
                }

                if(isset($_SESSION['admin'])){


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
                    ?>
                    <div class = "manage_buttons_container col-xs-12">
                        <?php
                        if(isset($_GET['view']) && $_GET['view'] == "products"){
                            ?>
                            <a href = "add_product.php" class = "manage_button col-xs-5 col-xs-offset-1">
                                <p> Add new product </p>
                            </a>
                        <?php

                        }
                        else if(isset($_GET['view'])){
                        ?>
                            <a href = "add_media.php" class = "manage_button col-xs-5 col-xs-offset-1">
                                <p> New media post</p>
                            </a>
                        <?php
                        }
                        if(isset($_GET['view']) && $_GET['view'] == "media"){
                            ?>
                            <a href = "admin?view=products" class = "manage_button col-xs-5 col-xs-offset-1">
                                <p> Manage products</p>
                            </a>
                        <?php

                        }
                        else if(isset($_GET['view'])){
                        ?>
                            <a href = "admin?view=media" class = "manage_button col-xs-5 col-xs-offset-1">
                                <p> Manage media posts</p>
                            </a>
                        <?php

                        }
                        if(!isset($_GET['view'])){
                        ?>
                            <a href = "admin?view=media" class = "manage_button col-xs-5 col-xs-offset-1">
                                <p> Manage media posts</p>
                            </a>
                            <a href = "admin?view=products" class = "manage_button col-xs-5 col-xs-offset-1">
                                <p> Manage products</p>
                            </a>
                    <?php
                        }

                        ?>
                    </div>

                    <?php
                    // if products are to be viewed
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
                    // if meda posts are to be viewed
                    else if(isset($_GET['view']) && $_GET['view'] == "media"){
?>
                        <h1 class = "products_type"> Media posts </h1>
                        <div class = "row admin_all_products_container">
<?php
                            $posts = get_all_media_posts_small($con);
                            echo_admin_media($posts);

                    }
                    else {
                        ?>
                        <?php
                    }
                }

                if(isset($_SESSION['admin'])){
                    ?>
                    <div class="a_btn_container col-xs-12">
                        <a href = "add_media.php" class = "add_product_button col-xs-5 col-xs-offset-1">
                            Add new media post
                        </a>
                        <a href = "add_product.php" class = "add_product_button col-xs-5 col-xs-offset-1">
                            Add a new product
                        </a>
                        <a href = "admin?change_password=" class = "add_product_button col-xs-5 col-xs-offset-1">
                            Change password
                        </a>
                        <a href = "functions/logout" class = "add_product_button col-xs-5 col-xs-offset-1">
                            Logout
                        </a>
                    </div>
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
