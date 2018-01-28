<?php
//include "include_pages/loading.php";
$no_admin_info = "1";

ini_set('memory_limit', '-1');
include "functions/functions.php";
session_start();

$con = connect();

?>
<!DOCTYPE html>
<?php include "partials/head.php";?>
<html lang="swe">
<head>
    <title>Add link</title>
    <meta name="description" content="Tastaturen - Add link">
</head>
<?php 
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}

// if a link is to be added or changed
if (isset($_POST["add"]) && isset($_SESSION['admin'])){


    // if a link_id is already set, then a product is to be edited
    if (isset($_POST['link_id'])){
        $editing        = true;
        $link_id        = secure_str($_POST['link_id']);
    }
    else {
        $editing        = false;
    }

    $name               = secure_str($_POST["name"]);
    $name_dk            = secure_str($_POST["name_dk"]);
    $href               = secure_str($_POST["href"]);
    //$order_number       = secure_str($_POST["order_number"]);

    $url_start_one = "http://";
    $url_start_two = "https://";
    if(!(substr($href, 0, strlen($url_start_one)) === $url_start_one) && !(substr($href, 0, strlen($url_start_two)) === $url_start_two)){
        $href = "http://" . $href;
    }

    if (!$editing) {
        // adds the product along with the constant values
        $query = "INSERT INTO link (name, name_dk, href) VALUES ('$name', '$name_dk', '$href')";

        mysqli_query($con, $query) or die (mysqli_error($con));

        // gets the ID of the inserted product
        $link_id = secure_str(mysqli_insert_id($con));
    }
    else { // query for updating constant values
        $query = "UPDATE link SET name = '$name', name_dk='$name_dk', href='$href' WHERE link_id = '$link_id'";

        mysqli_query($con, $query) or die (mysqli_error($con));
    }

}

if (isset($_SESSION['admin'])) {

// When a product is going to be viewed for editing
    if (isset($_GET["link_id"])){
        $link_id            = $_GET["link_id"];
        $link               = get_link_by_id($con, $link_id);
        $name               = $link['name'];
        $name_dk            = $link['name_dk'];
        $href               = $link['href'];
    }
    else {
        // if a new product is to be created, all the values should be empty
        $name               = "";
        $name_dk            = "";
        $href               = "";
    }
    ?>
    <body>
    <?php
    //include "include_pages/nav.php";
    ?>

    <section class = "admin_page">
        <div class = "container-fluid full_height">
            <div class = "row full_height">
                <div class = "col-md-8 col-md-offset-2">
                    <h1 class = "admin_header">Add link</h1>
                    <form id = "form" class = "add_product_form" method = "post" action = "add_link.php" enctype="multipart/form-data">
                        <input type = "hidden" name = "add">
                        <?php
                        if (isset($_GET["link_id"])){
                            ?>
                            <input type = "hidden" value = "<?php echo $_GET['link_id'] ?>" name = "link_id">
                            <?php
                        }
                        ?>

                        <h1>Text (Svenska)</h1>
                        <input value = "<?php echo $name ?>" type = "text" name = "name">

                        <h1>Text (Danska)</h1>
                        <input value = "<?php echo $name_dk ?>" type = "text" name = "name_dk">

                        <h1>Länk</h1>
                        <input value = "<?php echo $href ?>" type = "text" name = "href">


                        <section class="col-md-12 admin_btn">
                            <button class="col-md-5" id="js-trigger-overlay" onclick="send_form(this, 'add_link.php', 'form')" type="button">Save link</button>
                            <a class="col-md-5 col-md-offset-2" href="admin.php">Cancel edit</a>
                        </section>

                    </form>
                </div>
            </div>
        </div>
    </section>

    </body>
    <?php
}

else {header("Location: index.php");} ?>
</html>
